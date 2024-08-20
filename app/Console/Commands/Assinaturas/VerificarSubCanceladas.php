<?php

namespace App\Console\Commands\Assinaturas;

use App\Models\Assinaturas\Assinaturas;
use App\Services\Stripe\GerenciamentoAssinaturas;
use Illuminate\Console\Command;

class VerificarSubCanceladas extends ProcessarAssinatura
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:verificar-sub-canceladas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Validação de assinaturas canceladas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ultimoRegistro = Assinaturas::where("status", "canceled")->latest()->first();

        $stripe = new GerenciamentoAssinaturas();

        $subscriptions = $stripe->getAllSubscriptions([
          "status" => "canceled",
          'starting_after' => $ultimoRegistro->subscription_id
        ]);

        echo "\n\t Subs canceladas => ".count($subscriptions)."\n\n";

        $this->processar($subscriptions, $stripe);
    }
}
