<?php

namespace App\Http\Controllers;

use App\Console\Commands\Assinaturas\VerificarSubAtivaByCustomer;
use App\Services\Stripe\GerenciamentoAssinaturas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Exception\ApiErrorException;

class PageController extends Controller
{

    protected string $customer_id;
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

                $this->customer_id =  isset(auth()->user()->passaporte) ? auth()->user()->passaporte->customer_id : "";
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cadastros()
    {
        return view('cadastros')->with([
            'breadcrumbs' => $this->formatterBreadcrumb(['name' => 'Admin', 'link' => '#'], ['name' => 'Todos cadastros', 'link' => '#']),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reservas_admin()
    {
        return view('admin-reservas')->with([
            'breadcrumbs' => $this->formatterBreadcrumb(['name' => 'Admin', 'link' => '#'], ['name' => 'Reservas admin', 'link' => '#']),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cadastros_stripe()
    {
        return view('cadastros_stripe')->with([
            'breadcrumbs' => $this->formatterBreadcrumb(['name' => 'Admin', 'link' => '#'], ['name' => 'Todos cadastros na stripe', 'link' => '#']),
        ]);
    }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   * @throws ApiErrorException
   */
    public function sucesso()
    {

        // Verificar se a assinatura ja ta ativa, se tiver ja cria
        (new VerificarSubAtivaByCustomer)->handle(auth()->user()->passaporte->customer_id);

        return view('sucesso')->with([
            'breadcrumbs' => $this->formatterBreadcrumb(['name' => 'Assinaturas', 'link' => route("minhas_assinaturas")]),
        ]);
    }

    protected function formatterBreadcrumb(array $page, array $children = null){
        $h = [
            [
                'name' => 'Home',
                'link' => route("home")
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
        if($this->customer_id) {
            $subscriptions = $stripe->getSubscriptionByCustomerID($this->customer_id);
//            \Log::info(json_encode($subscriptions));
        }

        return view("assinaturas")->with([
            "subscriptions" => $subscriptions,
            "user" => $user,
            'produtos' => $stripe->getPlans(),
            'idexterno' => $this->customer_id,
            'breadcrumbs' => $this->formatterBreadcrumb(['name' => 'Assinaturas', 'link' => '#'])
        ]);
    }

    public function reservar(){
        // Listar assinaturas
        $user = Auth::user();

        $user = $user->load("passaporte", "passaporte.assinaturas.unidade", 'reservas.cadeira.unidade');

//        \Log::info(json_encode($user));

        $inicioDaSemana = Carbon::now()->startOfDay()->format('Y-m-d');
        $fimDaSemana = Carbon::now()->endOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        $reservas = [];
        $exist_sub_hibrid = false;

        $user?->passaporte?->assinaturas?->each(function($assinatura) use(&$exist_sub_hibrid){
           if($assinatura->valor == '19900'){
               $exist_sub_hibrid = true;
           }
        });


        if($user?->reservas?->count() > 0){

            $user->reservas->each(function($reserva)use(&$reservas){

                $carbon = Carbon::parse($reserva->hora_reserva_inicial)->format("d-m-Y");
                $carbon_hr = Carbon::parse($reserva->hora_reserva_inicial)->format("H:i");
                $carbon_hr_fim = Carbon::parse($reserva->hora_reserva_fim)->format("H:i");

                $tipo = $carbon.$reserva->cadeira_id;

                if(!isset($reservas[$tipo])) {
                    $reservas[$tipo] = [
                        "title" => strtoupper("CR-{$reserva->id}-{$reserva->cadeira->unidade->sigla}/{$reserva->cadeira->nome}")." > CADEIRA {$reserva->cadeira->nome} ({$carbon})",
                        "horas" => $carbon_hr . " - " . $carbon_hr_fim
                    ];
                }else{
                    $reservas[$tipo] = [
                        "title" => $reservas[$tipo]["title"],
                        "horas" => $reservas[$tipo]["horas"].", ".$carbon_hr . " - " . $carbon_hr_fim
                    ];
                }
            });
        }

        return view("reservar")->with([
            "user" => $user,
            'idexterno' => $this->customer_id,
            'breadcrumbs' => $this->formatterBreadcrumb(['name' => 'Reservar', 'link' => '#'], ['name' => 'Unidade', 'link' => '#']),
            'inicioDaSemana' => $inicioDaSemana,
            'fimDaSemana' => $fimDaSemana,
            "reservas" => $reservas,
            "exist_sub_hibrid" => $exist_sub_hibrid
        ]);
    }
}
