<?php

namespace App\Integracao;

use App\Models\Common\Integrador;
use App\Integracao\Storage\AwsS3Integracao;
use App\Integracao\RiskManagement\TecnoRiskIntegracao;

class IntegracaoFactory {

    // Aqui definimos as constantes que representam o codigo interno de cada integrador que vamos usar no sistema
    // Forma de usar:
    // $integrador = IntegrationFactory::getIntegracao($gateway);
    // $integrador->metodoDaInterface($parametro)

    public const AWS = 'AWS';
    public const TECNORISK = 'TCNK';

    public static function get_integrador(Integrador $gateway){

        switch($gateway->code){
            case IntegracaoFactory::AWS: return new AwsS3Integrator($gateway); break;
            case IntegracaoFactory::TECNORISK: return new TecnoRiskIntegrator($gateway); break;
        }
        return null;
    }

    public static function get_integrador_por_id(Int $id){

        $gateway = Integrador::findOrFail($id);
        return IntegracaoFactory::get_integrador($gateway);
    }

    public static function get_storage_padrao($type='PRIVADO') {

        $storage_id = 0;
        switch($type){
            case 'PRIVADO':
                $storage_id = parametro('integrador_storage_privado_padrao_id', 0);
                if($storage_id == 0)
                    throw new \BusinessException("O Parametro 'integrador_storage_privado_padrao_id' não está configurado! Entre em contato com o administrador do sistema.");
                break;
            case 'PUBLICO':
                $storage_id = parametro('integrador_storage_publico_padrao_id', 0);
                if($storage_id == 0)
                    throw new \BusinessException("O Parametro 'integrador_storage_publico_padrao_id' não está configurado! Entre em contato com o administrador do sistema.");
                break;
            default:
                throw new \BusinessException("Storage deve ser PRIVADO ou PUBLICO");
        }

        $storageDefault = Integrador::find($storage_id);
        if($storageDefault == null)
            throw new \BusinessException("Não foi possível encontrar o integrador $type $storage_id");

        return IntegracaoFactory::get_integrador($storageDefault);
    }

    public static function get_gestao_risco_padrao(){
        $gestao_risco_id = parametro('integrador_gestao_risco_padrao_id', 0);
        if($gestao_risco_id == 0)
            throw new \BusinessException("O Parametro 'integrador_gestao_risco_padrao_id' não está configurado! Entre em contato com o administrador do sistema.");
        $gestao_risco = Integrador::findOrFail($gestao_risco_id);
        return IntegracaoFactory::get_integrador($gestao_risco);
    }

}