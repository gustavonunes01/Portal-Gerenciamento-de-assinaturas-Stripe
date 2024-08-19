<?php

namespace App\Services\Stripe;

use App\Exceptions\BusinessException;
use Stripe\StripeClient;

abstract class ConfigStripe
{
    protected StripeClient $stripeClient;
    public function __construct(){
        $stripeSecretKey = config("app.token_stripe");
        if(!$stripeSecretKey)
            throw new BusinessException("Erro de configuração chave de pagamento.");

        $this->stripeClient = new \Stripe\StripeClient($stripeSecretKey);
    }
}
