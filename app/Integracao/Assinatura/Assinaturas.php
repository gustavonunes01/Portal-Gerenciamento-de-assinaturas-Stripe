<?php

namespace App\Integracao\Assinatura;

interface Assinaturas {

    public function getAssinaturaPorId($assinatura_id);

    public function criarAssinatura(array $data);

    public function cancelarAssinatura($assinatura_id);

    public function buscarPorClienteID($customer_id);
}
