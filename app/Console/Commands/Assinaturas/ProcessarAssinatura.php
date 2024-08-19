<?php

namespace App\Console\Commands\Assinaturas;

use App\Http\Controllers\ReservaController;
use App\Models\Assinaturas\Assinaturas;
use App\Models\Assinaturas\PassaporteUsuario;
use App\Models\Assinaturas\Unidades;
use App\Services\Stripe\GerenciamentoAssinaturas;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

abstract class ProcessarAssinatura extends Command
{

    protected  function extrairCidade($string, $cidades) {
        foreach ($cidades as $cidade) {
            if (stripos(strtolower($string), strtolower($cidade->cidade)) !== false) {
                return $cidade->id;
            }
        }
        return null;
    }

    /**
     * @param $customer
     * @param $subscription
     * @return void
     */
    protected function verificarSemanaAssinatura($customer, $subscription): void
    {


        $data_reserva_inicial = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $data_reserva_final = Carbon::now()->endOfWeek(Carbon::SATURDAY);

        $assinaturas = $customer->assinaturas;


        $exist = false;

        if($customer->user->reservas){
//            echo "\n\t RESERVAS \t {$data_reserva_inicial} - {$data_reserva_final}\n";
            $reservas = $customer->user->reservas;
            $exist = ReservaController::verificarSeExisteReserva($data_reserva_inicial, $data_reserva_final, $reservas);
        }else{
//            echo "\n\t DEU SEM RESERVAS";
        }

        foreach ($assinaturas as $assinatura) {
            if($assinatura->subscription_id == $subscription->id && ($subscription->status === "active" ) && $subscription->plan->amount === 19900){
                if(!$exist) {
                    $customer->horas_disponiveis_semanal = 20;
                    $customer->save();
                }
            }
        }
    }

    public function processar(array $subscriptions, GerenciamentoAssinaturas $stripe){
        $all_units = Unidades::all();

        foreach ($subscriptions as $subscription){

            $customer_db = PassaporteUsuario::with(['assinaturas', 'user.reservas'])->where("customer_id", $subscription->customer)->first();

            if(!$customer_db) {
                Log::stack(['cron-kernel'])->error("[PROCESSANDO-ASSINATURA]: Assinatura não cadastrada no banco. Linha: 29 NO ABSTRACT CLASS, customer_id: [{$subscription->status}] {$subscription->customer}", ["command" => $this->signature]);
                continue;
            }

            $plan = $stripe->getPlans($subscription->plan->product);

            // Extrair a cidade da string
            $cidadeEncontrada = $this->extrairCidade($plan->description."Passaporte ONOVOLAB Híbrido São Carlos.", $all_units);

            $array_create = [
                "passaporte_id" => $customer_db->id,
                "subscription_id" => $subscription->id,
                "plan_id" => $subscription->plan->product,
                "unidade_id" => $cidadeEncontrada ?? null,
                "status" => $subscription->status,
                "valor" => $subscription->plan->amount
            ];

            Assinaturas::updateOrCreate(["subscription_id" => $subscription->id],$array_create);

            $this->verificarSemanaAssinatura($customer_db, $subscription);
        }
    }

}
