<?php

namespace App\Http\Controllers;

use App\Services\Stripe\GerenciamentoAssinaturas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware para autenticação
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    protected function formatterBreadcrumb(array $page, array $children = null){
        $h = [
            [
                'name' => 'Home',
                'link' => '/home'
            ],
            $page
        ];

        if($children)
            $h[] = $children;

        return $h;

    }

    public function subscriptions(){
        // Listar assinaturas
        $user = Auth::user();
        $stripe = new GerenciamentoAssinaturas;
        $subscriptions = array();
        if($user->passaporte)
            $subscriptions = $stripe->getSubscriptionByCustomerID($user->passaporte->customer_id);

        return view("assinaturas")->with([
            "teste" => "são carlos",
            "subscriptions" => $subscriptions,
            "user" => $user,
            'produtos' => $stripe->getPlans(),
            'idexterno' => $user->passaporte->customer_id,
            'breadcrumbs' => $this->formatterBreadcrumb(['name' => 'Assinaturas', 'link' => '/me/subscriptions'])
        ]);
    }
}
