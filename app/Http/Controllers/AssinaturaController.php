<?php

namespace App\Http\Controllers;

use App\Services\Stripe\GerenciamentoAssinaturas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stripe\Exception\ApiErrorException;

class AssinaturaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//         Middleware para autenticação
        $this->middleware(function ($request, $next) {
            // Verifica se a requisição é AJAX
            if ($request->ajax() || $request->wantsJson()) {
                // Retorna uma resposta JSON de não autorizado
                if (!Auth::check()) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }
            } else {
                // Redireciona para a página de login
                if (!Auth::check()) {
                    return redirect()->route('login');
                }
            }

            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @throws ApiErrorException
     */
    public function assinar()
    {
        $request = request();
        $productID = $request["productId"];
        $tag = $request["tag"];
        $price = $request["price"];
        $user = Auth::user();
        $customer_id = $user->passaporte?->customer_id;

        $stripe = new GerenciamentoAssinaturas;
        $plano = $stripe->getPlans($productID);

        if(isset($plano->id)){
//            $prices = $stripe->getPriceByProductID($plano->default_price);

//            \Log::info($prices);
            $mount_session = [
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price' => $plano->default_price,
                    'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => 'https://assinaturas.onovolab.com/assinatura/sucesso?id='.$customer_id.'&uni='.$tag.'&vl='.$price,
                'cancel_url' => 'https://assinaturas.onovolab.com/assinatura/falha?id='.$customer_id,
                'customer' => $customer_id,
            ];

            $session_payment = $stripe->createSubscriptionSession($mount_session);

            return response()->json(["payment" => $session_payment->toArray()]);
        }


        return response()->json(["chegou" => true, "request" => request()->all(), "plano" => $plano]);
    }

    public function success(){

        // Criar assinaturas

    }

    public function failed(){

        // Criar assinaturas

    }

    /**
     * @throws ContainerExceptionInterface
     * @throws ApiErrorException
     * @throws NotFoundExceptionInterface
     */
    public function cancelar(): \Illuminate\Http\JsonResponse
    {

        // Cancelar assinatura
        $stripe = new GerenciamentoAssinaturas;
        $cancel = $stripe->cancelSubscription(request()->get("subscriptionId"));

        return response()->json(["success" => true, "subscription" => $cancel]);
    }
}
