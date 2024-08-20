<?php

namespace App\Console\Commands\Assinaturas;

use App\Models\Assinaturas\Assinaturas;
use App\Models\Assinaturas\PassaporteUsuario;
use App\Models\Assinaturas\Unidades;
use App\Services\Stripe\GerenciamentoAssinaturas;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\ApiErrorException;

class VerificarHorasAssinatura extends ProcessarAssinatura
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:verificar-horas-sub';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validação de horas disponiveis para assinatura hibrida';


    /**
     * Execute the console command.
     * @throws ApiErrorException
     */
    public function handle()
    {
        $stripe = new GerenciamentoAssinaturas();

        $subscriptions = $stripe->getAllSubscriptions(["status" => "active"]);

        foreach ($subscriptions as $subscription) {
          $customer_db = PassaporteUsuario::with(['assinaturas', 'user.reservas'])->where("customer_id", $subscription->customer)->first();

          if(!$customer_db) {
            Log::stack(['cron-kernel'])->error("[VERIFICANDO-HORAS-ASSINATURA]: Assinatura não cadastrada no banco. Linha: 44, customer_id: [{$subscription->status}] {$subscription->customer}", ["command" => $this->signature]);
            continue;
          }

          $this->verificarSemanaAssinatura($customer_db, $subscription);
        }
    }
}
