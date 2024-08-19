<?php

namespace App\Integracao\GestaoRisco;


interface GestaoRiscoInterface {

    // Utilizar classes específicas pra isso
    public function enviar_ficha($env, \stdClass $broker): \stdClass;
    public function consultar_ficha($env, \stdClass $broker): \stdClass;

}
