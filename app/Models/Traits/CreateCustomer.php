<?php

namespace App\Models\Traits;

use App\Services\Stripe\GerenciamentoAssinaturas;
use Ramsey\Uuid\Uuid;
use Stripe\Exception\ApiErrorException;

trait CreateCustomer
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($obj) {
            $stripe = new GerenciamentoAssinaturas;
            $customer_stripe = $stripe->getCustomers(["email" => $obj->user->email]);

            if(isset($customer_stripe->id)){
                $obj->customer_id = $customer_stripe->id;
            }else{
                try{
                    $customer_stripe = $stripe->createCustomer([
                        'email' => $obj->user->email,
                        'name' => $obj->user->name,
                    ]);

                    $obj->customer_id = $customer_stripe->id;
                }catch (ApiErrorException $e){
                    \Log::error("NAO FOI POSSIVEL CRIAR CUSTOMER");
                    \Log::error(json_encode($obj));
                    \Log::error($e);
                }
            }
        });
    }

}
