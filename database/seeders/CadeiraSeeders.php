<?php

namespace Database\Seeders;

use App\Models\Assinaturas\Unidades;
use App\Models\Cadeiras\Cadeiras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Common\Menu;
use Carbon\Carbon;

class CadeiraSeeders extends Seeder
{
    public function run(){
        $posicoes = array (
            "sc"  => array("PH01", "PH02", "PH03", "PH04", "PH05", "PH06", "PH07", "PH08", "PH09", "PH10", "PH11", "PH12", "PH13", "PH14", "PH15", "PH16", "PH17", "PH18", "PH19", "PH20", "PH21", "PH22", "PH23", "PH24", "PH25", "PH26", "PH27", "PH28", "PH29", "PH30", "PH31", "PH32", "PH33", "PH34", "PH35", "PH36", "PH37", "PH38", "PH39", "PH40"),
            "ar" => array("PH01", "PH02", "PH03", "PH04", "PH05", "PH06", "PH07", "PH08", "PH09", "PH10", "PH11", "PH12", "PH13", "PH14", "PH15", "PH16", "PH17", "PH18", "PH19", "PH20", "PH21", "PH22", "PH23", "PH24", "PH25", "PH26", "PH27", "PH28", "PH29", "PH30", "PH31", "PH32", "PH33", "PH34", "PH35", "PH36", "PH37", "PH38", "PH39", "PH40"),
            "in" => array("PH01", "PH02", "PH03", "PH04", "PH05", "PH06", "PH07", "PH08", "PH09", "PH10", "PH11", "PH12", "PH13", "PH14", "PH15", "PH16")
        );

        // Definir horário inicial às 07:00
        $horario_inicial = Carbon::now()->startOfDay()->addHours(7);

        // Definir horário final às 19:00
        $horario_final = Carbon::now()->startOfDay()->addHours(19);

        $array_unidade = array(
            "sc" => Unidades::select("id")->where("cidade", "são carlos")->value("id"), // São carlos
            "ar" => Unidades::select("id")->where("cidade", "araraquara")->value("id"), // Arraquara
            "in" => Unidades::select("id")->where("cidade", "indaiatuba")->value("id"), // Indaiatuba
        );

        foreach ($posicoes as $key => $posicao) {
            foreach ($posicao as $unidade) {
                $create = [
                    "nome" => $unidade,
                    "horario_disponivel_inicial" => $horario_inicial,
                    "horario_disponivel_fim" => $horario_final,
                    "unidade_id" => $array_unidade[$key],
                ];

                Cadeiras::create($create);
            }
        }



    }
}
