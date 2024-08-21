<?php

namespace App\Console\Commands\Assinaturas;

use App\Models\Assinaturas\Assinaturas;
use App\Models\Assinaturas\PassaporteUsuario;
use App\Models\Assinaturas\Unidades;
use App\Services\Stripe\GerenciamentoAssinaturas;
use Illuminate\Console\Command;
use Stripe\Exception\ApiErrorException;

class VerificarSubAtiva extends ProcessarAssinatura
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:verificar-sub-ativa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verficação de assinaturas ativas';


    /**
     * Execute the console command.
     * @throws ApiErrorException
     */
    public function handle()
    {
        $stripe = new GerenciamentoAssinaturas();

        $ultimoRegistro = Assinaturas::where("status", "active")->latest()->first();

        date_default_timezone_set('America/Sao_Paulo');
        $startOfToday = strtotime("today midnight");

        $subscriptions = $stripe->getAllSubscriptions([
          "status" => "active",
          'created' => [
            'gte' => $startOfToday,
          ],
          'starting_after' => $ultimoRegistro->subscription_id
        ]);

//        \Log::info("Assinatura ativa");
//        \Log::info($subscriptions[0]);

        $this->processar($subscriptions, $stripe);
    }
}
