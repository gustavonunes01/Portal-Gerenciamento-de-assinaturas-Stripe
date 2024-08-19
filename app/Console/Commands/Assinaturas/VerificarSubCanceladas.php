<?php

namespace App\Console\Commands\Assinaturas;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $stripe = new GerenciamentoAssinaturas();

        $subscriptions = $stripe->getAllSubscriptions(["status" => "canceled"]);

        $this->processar($subscriptions, $stripe);
    }
}
