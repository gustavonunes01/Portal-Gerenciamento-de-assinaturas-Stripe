<?php

namespace App\Http\Controllers;

use App\Exceptions\BusinessException;
use App\Models\Assinaturas\PassaporteUsuario;
use App\Models\Assinaturas\Unidades;
use App\Models\Cadeiras\Cadeiras;
use App\Models\Cadeiras\CadeirasReservas;
use App\Services\Stripe\GerenciamentoAssinaturas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stripe\Exception\ApiErrorException;

class ReservaController extends Controller
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

    public function reservar(Request $request){

        \Log::info($request->all());

        $data = $request->all();
        $reserva_solicitada = collect($data["hr_selected"]);
        $cadeira = $data["cadeira"];
        $date_select = $data["data_select"];

        $reservas = CadeirasReservas::where("cadeira_id", $cadeira["id"])->where("hora_reserva_inicial", ">=", $data["data_select"])->get();

        $existe_reserva = $reservas->contains(function ($reserva) use ($reserva_solicitada) {
            $data_reserva_inicial = Carbon::parse($reserva->hora_reserva_inicial)->format('H:i');
            $data_reserva_final = Carbon::parse($reserva->hora_reserva_fim)->format('H:i');
            $str_hr = "{$data_reserva_inicial}_{$data_reserva_final}";

            return $reserva_solicitada->contains($str_hr);
        });

        if($existe_reserva)
            throw new BusinessException('401', "Horario ja reservado");

        $reserva_solicitada->map(function($reserva) use($cadeira, $date_select){

            $ex = explode("_", $reserva);

            $horaInicio = Carbon::parse($date_select." ".$ex[0]);
            $horaFim = Carbon::parse($date_select." ".$ex[1]);

            CadeirasReservas::updateOrCreate(
                [
                    "cadeira_id" => $cadeira["id"],
                    "user_id" => auth()->user()->id,
                    "hora_reserva_inicial" => $horaInicio,
                    "hora_reserva_fim" => $horaFim,
                ]
            );

            $passaPorte = PassaporteUsuario::where("user_id", auth()->user()->id)->first();
            $passaPorte->horas_disponiveis_semanal = ((float)$passaPorte->horas_disponiveis_semanal)-1;
            $passaPorte->save();
        });

        return response()->json($request->all());
    }

    public function cadeiras(): \Illuminate\Http\JsonResponse
    {
        $request = request()->all();

        $unidade = Unidades::with('cadeiras')
            ->where("sigla", $request["unit"])
            ->whereHas("cadeiras", function($q){
                $q->where("ativa", 1);
            })
            ->first();

        if(!$unidade || $unidade->cadeiras->count() == 0)
            throw new BusinessException("400", "Unidade não encontrada. Contate o suporte.");

        $cadeiras = $unidade->cadeiras;

        return response()->json(["success" => true, "disponibilidade" => $cadeiras]);
    }

    public function cadeiraMostrarHorarios($cadeira_id): \Illuminate\Http\JsonResponse
    {
        // Buscar a cadeira pelo ID
        $cadeira = Cadeiras::where("id", $cadeira_id)->first();

        // Verificar se a cadeira existe
        if (!$cadeira) {
            throw new BusinessException('400', 'Cadeira não encontrada. Contate o suporte.');
        }

        // Capturar os horários de início e fim
        $inicio = Carbon::parse($cadeira->hora_inicio);
        $fim = Carbon::parse($cadeira->hora_fim);

        // Array para armazenar os horários disponíveis
        $horariosDisponiveis = [];

        // Iterar por cada hora entre o horário de início e fim
        while ($inicio->lt($fim)) {
            $horariosDisponiveis[] = [
                "inicio" => $inicio->format('H:i'),
                "fim" => $inicio->copy()->addHour()->format('H:i'),
            ];
            $inicio->addHours(parametro("config_horas_reservas", 1));
        }

        // Retornar os horários disponíveis como JSON
        return response()->json(["success" => true, "cadeira" => $cadeira, "horarios" => $horariosDisponiveis]);
    }


    public static function verificarSeExisteReserva($data_reserva_inicial, $data_reserva_final, $reservas = null, $cadeira_id = null){

        if(empty($reservas)){
            if(empty($cadeira_id))
                throw new BusinessException("500", "Necessario selecionar a cadeira para reservar.");

            $reservas = CadeirasReservas::where("cadeira_id", $cadeira_id)
                ->where("hora_reserva_inicial", ">=", $data_reserva_inicial)
                ->where("hora_reserva_fim", "<=", $data_reserva_final)
                ->get();
        }

        return $reservas?->contains(function ($reserva) use ($data_reserva_inicial, $data_reserva_final) {

            $reserva->hora_reserva_inicial = Carbon::parse($reserva->hora_reserva_inicial);
            $reserva->hora_reserva_fim = Carbon::parse($reserva->hora_reserva_fim);

            return $data_reserva_inicial->between($reserva->hora_reserva_inicial, $reserva->hora_reserva_fim) ||
                $data_reserva_final->between($reserva->hora_reserva_inicial, $reserva->hora_reserva_fim) ||
                ($reserva->hora_reserva_inicial->between($data_reserva_inicial, $data_reserva_final) &&
                    $reserva->hora_reserva_fim->between($data_reserva_inicial, $data_reserva_final));
        });
    }

    public function cadeiraMostrarHorariosSemenal($cadeira_id): \Illuminate\Http\JsonResponse
    {
        $cadeira = Cadeiras::where("id", $cadeira_id)->first();

        if (!$cadeira) {
            throw new BusinessException('400', 'Cadeira não encontrada. Contate o suporte.');
        }

        $horaInicio = Carbon::parse($cadeira->horario_disponivel_inicial);
        $horaFim = Carbon::parse($cadeira->horario_disponivel_fim);

        // Definir o início e fim da semana
        $inicioDaSemana = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $fimDaSemana = Carbon::now()->endOfWeek(Carbon::SATURDAY);

        $horariosPorSemana = [];

        $diasDaSemana = dias_da_semana_en();

        foreach ($diasDaSemana as $dia) {
            $inicio = $inicioDaSemana->copy()->next($dia)->setTimeFrom($horaInicio);
            $fim = $inicioDaSemana->copy()->next($dia)->setTimeFrom($horaFim);

            \Log::info("inicio: ". $inicio. " ".$fim);

            $reservas = CadeirasReservas::where("cadeira_id", $cadeira_id)
                ->where("hora_reserva_inicial", ">=", $inicio)
                ->where("hora_reserva_fim", "<=", $fim)
                ->get();

            $horariosDisponiveis = [];

            while ($inicio->lt($fim)) {

                $data_reserva_inicial = $inicio;
                $data_reserva_final = $inicio->copy()->addHour();

                // Verifica se há alguma reserva que conflita com o horário atual
                $existe_reserva = $this->verificarSeExisteReserva($data_reserva_inicial, $data_reserva_final, $reservas);

                if(!$existe_reserva){
                    $horariosDisponiveis[] = [
                        "inicio" => $data_reserva_inicial->format('H:i'),
                        "fim" => $data_reserva_final->format('H:i'),
                    ];
                }

                $inicio->addHour();
            }

            $horariosPorSemana[$dia] = $horariosDisponiveis;
        }

        return response()->json(["success" => true, "cadeira" => $cadeira, "horariosPorSemana" => $horariosPorSemana]);
    }

    public function adminReservasList(){

        $reservas = CadeirasReservas::with(["cadeira.unidade", "user"])->get();


        $list = [];

        foreach ($reservas as $reserva) {
            $carbon = Carbon::parse($reserva->hora_reserva_inicial)->format("d-m-Y");

            $list[] = [
                $reserva->id,
                strtoupper("CR-{$reserva->id}-{$reserva->cadeira->unidade->sigla}/{$reserva->cadeira->nome}"),
                $reserva->cadeira->nome,
                $reserva->cadeira->unidade->nome,
                $reserva->user->name,
                $reserva->user->email,
                Carbon::parse($reserva->hora_reserva_inicial)->format("d/m/y H:i"),
                Carbon::parse($reserva->hora_reserva_fim)->format("d/m/y H:i"),
                ""
            ];

        }

        return response()->json($list);

    }

}
