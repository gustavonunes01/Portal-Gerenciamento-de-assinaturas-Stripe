<?php

namespace App\Services\Stripe;

use App\Exceptions\BusinessException;
use Stripe\Collection;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Subscription;

class GerenciamentoAssinaturas extends ConfigStripe
{

    /**
     * @param string $subscription_id
     * @return Subscription
     * @throws ApiErrorException
     */
    public function getSubscriptionByID(string $subscription_id): \Stripe\Subscription
    {
        return $this->stripeClient->subscriptions->retrieve($subscription_id, []);
    }

    /**
     * @throws ApiErrorException
     */
    function getSubscriptionByCustomerID($idUsuario) {
        $assinaturas = $this->stripeClient->subscriptions->all(['customer' => $idUsuario]);

        return $assinaturas->data;
    }

    /**
     * @throws ApiErrorException
     */
    public function createCustomer(array $customer_data): \Stripe\Customer
    {

        return $this->stripeClient->customers->create($customer_data);
    }

    /**
     * @return object
     */
    public function getPlans($productId = null): object
    {
        try {
            if($productId){
                return $this->stripeClient->products->retrieve($productId);
            }else {
                $products = $this->stripeClient->products->all();
            }

            $productArray = array();

            foreach ($products->data as $product) {
                $defaultPrice = null;

                // Verificar se existem preços associados ao produto
                if (!empty($product->prices->data)) {
                    $defaultPrice = $product->prices->data[0]->unit_amount;
                }

                $productInfo = array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'active' => $product->active,
                    'created' => $product->created,
                    'description' => $product->description,
                    'default_price' => $defaultPrice,
                    'price' => $product->price,
                    'all_prices' => $this->getPriceByProductID($product->id),
                    // Adicione mais campos conforme necessário
                );

                $productArray[] = $productInfo;
            }

            return (object)$productArray;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            \Log::error($e);
            return (object)array('error' => $e->getMessage());
        }
    }

    /**
     * @param $productId
     * @return array
     */
    public function getPriceByProductID($productId): array
    {
        try {
            $prices = $this->stripeClient->prices->all(['product' => $productId]);

            $priceArray = array();

            foreach ($prices->data as $price) {
                $priceArray[] = array(
                    'id' => $price->id,
                    'unit_amount' => $price->unit_amount,
                    'currency' => $price->currency,
                    'active' => $price->active,
                    'created' => $price->created,
                    'recurring' => isset($price->recurring) && $price->recurring->interval !== null, // Verifica se o preço é recorrente
                    // Adicione mais campos conforme necessário
                );
            }

            return $priceArray;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            \Log::error($e);
            return array('error' => $e->getMessage());
        }
    }

    /**
     * @param $productId
     * @return \Stripe\Price | array
     */
    public function getPriceByID($priceId)
    {
        try {
            return $this->stripeClient->prices->retrieve($priceId);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            \Log::error($e);
            return array('error' => $e->getMessage());
        }
    }

    /**
     * O filtro somente pode ser realizado por ['email' => ....]
     * https://docs.stripe.com/api/customers/list?lang=php
     * @param $filter
     * @return string[]|Collection
     */
    public function getCustomers($filter = null): array|Collection
    {
        try {
            if($filter && is_array($filter)) {
                return $this->stripeClient->customers->all($filter);
            } else {
                return $this->stripeClient->customers->all();
            }

        } catch (\Stripe\Exception\ApiErrorException $e) {
            \Log::error($e);
            return ["error" => "Erro ao listar clientes: " . $e->getMessage()];
        }
    }

    /**
     * @param string $customer_id
     * @return Customer
     * @throws ApiErrorException
     */
    public function getCustomerByID(string $customer_id): \Stripe\Customer
    {
        return $this->stripeClient->customers->retrieve($customer_id, []);
    }

    /**
     * @throws ApiErrorException
     */
    public function getCreditCardByCustomerID($customerId): Collection
    {

       return $this->stripeClient->paymentMethods->all([
           'customer' => $customerId,
           'type' => 'card'
       ]);
    }

    /**
     * @param $customer_id
     * @param $numeroCartao
     * @param $mesExpiracao
     * @param $anoExpiracao
     * @param $cvc
     * @return array
     */
    public function addCreditCard($customer_id, $numeroCartao, $mesExpiracao, $anoExpiracao, $cvc): array
    {
        try {
            $cartao = $this->stripeClient->paymentMethods->create([
                'type' => 'card',
                'card' => [
                    'number' => $numeroCartao,
                    'exp_month' => $mesExpiracao,
                    'exp_year' => $anoExpiracao,
                    'cvc' => $cvc,
                ],
            ]);

            // Associar o cartão ao cliente
            $this->stripeClient->customers->update(
                $customer_id,
                ['invoice_settings' => ['default_payment_method' => $cartao->id]]
            );

            return ['status' => 1, 'mensagem' => 'Cartão cadastrado com sucesso', 'id' => $cartao->id];
        } catch (\Stripe\Exception\CardException $e) {
            // Tratar exceções específicas de cartão
            return ['status' => 0, 'mensagem' => $e->getMessage()];
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Tratar exceções de requisição inválida
            return ['status' => 0, 'mensagem' => $e->getMessage()];
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Tratar exceções de autenticação
            return ['status' => 0, 'mensagem' => $e->getMessage()];
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Tratar exceções de conexão com a API
            return ['status' => 0, 'mensagem' => $e->getMessage()];
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Tratar outras exceções da API
            return ['status' => 0, 'mensagem' => $e->getMessage()];
        }
    }

    /**
     * @throws ApiErrorException
     */
    public function createSubscriptionSession(array $data): \Stripe\Checkout\Session
    {
        return $this->stripeClient->checkout->sessions->create($data);
    }

    /**
     * @throws ApiErrorException
     */
    public function cancelSubscription($subscription_id): Subscription
    {
        return $this->stripeClient->subscriptions->cancel($subscription_id);
    }

}
