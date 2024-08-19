<?php

namespace App\Http\Controllers;

use App\Exceptions\BusinessException;
use App\Models\Assinaturas\PassaporteUsuario;
use App\Models\Assinaturas\Unidades;
use App\Models\Cadeiras\Cadeiras;
use App\Models\Cadeiras\CadeirasReservas;
use App\Models\User;
use App\Services\Stripe\GerenciamentoAssinaturas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stripe\Exception\ApiErrorException;

class UsuariosController extends Controller
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

    public function listAll(){


//        /*1*/{"sTitle": "Nome"},
//        /*2*/{"sTitle": "E-mail"},
//        /*3*/{"sTitle": "Telefone"},
//        /*4*/{"sTitle": "Endereço"},
//        /*5*/{"sTitle": "RG"},
//        /*6*/{"sTitle": "CPF"},
//        /*7*/{"sTitle": "Email"},
//        /*8*/{"sTitle": ""},

        $user = User::with(["passaporte.assinaturas.unidade"])->get();

        $table_mount = [];

        foreach ($user as $u){

            $table_mount[] = [
                $u->id,
                $u?->passaporte?->assinaturas?->where("status", "active")?->count() > 0 ? '<span class="badge badge-pill bg-green">ativa</span>' : '<span class="badge badge-pill bg-red">Off</span>',
                $u->name,
                $u->email,
                $u?->passaporte?->whatsapp,
                "{$u?->passaporte?->bairro} - {$u?->passaporte?->cidade}",
                $u?->passaporte?->rg,
                $u?->passaporte?->cpf,
                "",
                ""
            ];

        }



        return response()->json($table_mount);
    }

    /**
     * @throws ApiErrorException
     */
    public function listAllSubscriptions(){
        $stripe = new GerenciamentoAssinaturas;

        $user = $stripe->getAllSubscriptions(["limit" => 100]);

        $statusHelp = [
          "active" => '<span class="badge badge-outline text-green">Ativo</span>',
          "canceled" => '<span class="badge badge-outline text-red">Cancelado</span>',
          "incomplete" => '<span class="badge badge-outline text-yellow">Incompleto</span>',
          "incomplete_expired" => '<span class="badge badge-outline text-yellow">Incompleto Expirado</span>',
          "past_due" => '<span class="badge badge-outline text-orange">Vencido</span>',
          "paused" => '<span class="badge badge-outline text-purple">Pausado</span>',
          "trialing" => '<span class="badge badge-outline text-cyan">Testando</span>',
          "unpaid" => '<span class="badge badge-outline text-red">Não pagou</span>',
        ];

        $table_mount = [];

        foreach ($user as $u){

            $customer = $stripe->getCustomerByID($u->customer);
            $planObj = $u->items->data[0]->plan;
            $amount = convertReal(($planObj->amount /100));
            $plan = $stripe->getPlans($planObj->product);

            $btn_cancelar = '<span
                                id="btn-cancelar-subscription"
                                data-subscription-id="'."{$u->id}".'"
                                class="btn-cancelar uk-button uk-button-danger uk-button-small text-white">
                                Cancelar assinatura
                            </span>';

            $table_mount[] = [
                $u->id,
                $customer->name,
                $customer->email,
                $statusHelp[$u->status],
                $plan->name,
                "R$ {$amount}/mês",
                "{$btn_cancelar}"
            ];
        }



        return response()->json($table_mount);
    }
}
