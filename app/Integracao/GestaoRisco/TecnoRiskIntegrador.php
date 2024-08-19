<?php

namespace App\Integracao\GestaoRisco;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Log;

class TecnoRiskIntegrador implements GestaoRiscoInterface {

    // Documentar os campos utilizados como: 
    // prod_url         = URL base http://ws.tecnorisk.com.br/
    // prod_user        = usuario
    // prod_pass        = senha
    // prod_token       = unidade_transporte_id
    // prod_other       = transportadora_id

    private $integrator = null;
    private $attemps_registration = 0;
    private $attemps_form = 0;

    public function __construct( $integrator ){
        $this->integrator = $integrator;
    }

    public function enviar_ficha($env, \stdClass $motorista): \stdClass
    {
        if($this->attemps_registration > 3)
            throw new \BusinessException("Excedido três tentativas de cadastrar o parceiro! Verifique os dados cadastrais");

        $bodyRequest = $this->get_body_registration($env, $motorista);
        
        $response = $this->http_request($env, 'post', '/motorista', $bodyRequest);
        $this->attemps_registration++;

        $body = $response->json();
        Log::stack(['risk-integrator'])->info("Body Request / Response REGISTRO", ['request' => $bodyRequest, 'response' => $body]);
        
        if(isset($body['SUCESSO'])){
            $riskForm = new \stdClass();
            $riskForm->broker_lead_id = $motorista->id;
            $riskForm->integrator_id = $this->integrator->id;
            $riskForm->env = $env;
            $riskForm->partner_id = $body['SUCESSO']['MOTORISTA_CODE'];
            return $riskForm;
        }
        if(isset($body['ERROR']['CODE']) && ($body['ERROR']['CODE'] == 12003 || $body['ERROR']['CODE'] == 1016)){ //CPF/DNI já existente na base TECNORISK
            return $riskForm = new \stdClass();
        }
        elseif(isset($body['ERROR']['CODE'])){
            throw new \BusinessException($body['ERROR']['MSG']);
        }
        
    }

    private function submit_form($env, \stdClass $motorista){
        if($this->attemps_form > 3)
            throw new \BusinessException("Excedido três tentativas de cadastrar a ficha! Verifique os dados cadastrais");

        $bodyRequest = $this->get_body_form($env, $motorista);
        
        $response = $this->http_request($env, 'post', '/ficha', $bodyRequest);
        $this->attemps_form++;

        $body = $response->json();
        \Log::stack(['risk-integrator'])->info("Body Request / Response da FICHA: ", ['request' => $bodyRequest, 'response' => $body]);
        
        if(isset($body['SUCESSO'])){
            return  $body['SUCESSO']['FICHA'];
        }
        if(isset($body['ERROR']['CODE']) && ($body['ERROR']['CODE'] == 12003 || $body['ERROR']['CODE'] == 1016)){ //CPF/DNI já existente na base TECNORISK
            return new \stdClass();
        }
        elseif(isset($body['ERROR']['CODE'])){
            throw new \BusinessException($body['ERROR']['MSG']);
        }
    }


    public function consultar_ficha($env, \stdClass $motorista): \stdClass
    {
        $riskForm = null;
        if($motorista->risk_forms->count() > 0){
            $riskForm = $motorista->risk_forms[$motorista->risk_forms->count() - 1];
        }else{
            $riskForm = new \stdClass();
            $riskForm->broker_lead_id = $motorista->id;
            $riskForm->integrator_id = $this->integrator->id;
            $riskForm->env = $env;
            $riskForm->status = 'PENDENTE';
        }

        if($riskForm->status == 'PENDENTE'){
            $this->submit_registration( $riskForm->env, $motorista);
            $ficha = $this->submit_form( $riskForm->env, $motorista);
            $riskForm->partner_id = $ficha;
            $riskForm->status = 'AGUARDANDO ANALISE';
        }

        $transp_id = $this->integrator->get_credentials( $riskForm->env)->other;
        $url = "liberacao/$transp_id/$riskForm->partner_id";
        $response = $this->http_request( $riskForm->env, 'get', $url);
        $body = $response->json();
        \Log::stack(['risk-integrator'])->info('Resposta GET REGISTRATION', [$body]);

        if(isset($body['ERROR']['CODE']) &&  in_array($body['ERROR']['CODE'], [11503, 11502]) ) {               // CPF do motorista invalido ou não cadastrado na tecnorisk
            $this->submit_registration( $riskForm->env, $motorista);
            $ficha = $this->submit_form( $riskForm->env, $motorista);
            $riskForm->partner_id = $ficha;
            $riskForm->status = 'AGUARDANDO ANALISE';

        }else {
            
            $riskForm->data = json_encode($body);
            switch($body['Liberacao']['situacao_cadastro']){
                case 'D' :
                case 'A':
                    $riskForm->status = 'AGUARDANDO ANALISE';
                    break;
                case 'L':
                    $riskForm->status = 'RECOMENDADO';
                    break;
                case 'N': 
                    $riskForm->status = 'NAO RECOMENDADO';
                    break;

            }
            $riskForm->expiration_date = $riskForm->status != 'AGUARDANDO ANALISE' ? Carbon::createFromFormat('d/m/Y H:i:s', $body['Liberacao']['Vencimento']['data_vencimento']) : null;
            $riskForm->observations = '';

            if(isset($body['observacao'])){
                $aux = $body['observacao'];
                $riskForm->observations .= "<strong>Observação: </strong> $aux \n";
            }
            if(isset($body['Liberacao']['Recomendacao'])){
                if(isset($body['Liberacao']['Recomendacao']['geral'])){
                    $aux = $body['Liberacao']['Recomendacao']['geral'];
                    $riskForm->observations .= "<strong>Geral: </strong> $aux \n";
                }
                if(isset($body['Liberacao']['Recomendacao']['recomendacao_0']))
                    $aux = $body['Liberacao']['Recomendacao']['recomendacao_0'];
                    $riskForm->observations .= "<strong>Recomendação: </strong> $aux \n";
            }
                        
        }
    
        return $riskForm;
    }



    private function http_request($env, $type, $url, $body = null){
        $request = Http::withBasicAuth(
            $this->integrator->get_credentials($env)->user, 
            $this->integrator->get_credentials($env)->pass
        )->withHeaders([
            'Content-Type' => 'application/json',
        ]);

        $urlCall = $this->integrator->get_credentials($env)->url . $url;
        \Log::stack(['risk-integrator'])->info($urlCall);
        $response = null;
        if($type == 'get')
            $response = $request->get($urlCall);
        else if($type == 'post')
            $response = $request->post($urlCall, $body);

        return $response;

    }

    private function get_body_registration($env, \stdClass $motorista){
        if($motorista->state_id == null)
            throw new \BusinessException("O Estado do corretor não está preenchido!");
        if($motorista->issuing_rg_state_id == null)
            throw new \BusinessException("O Estado emissor do RG do corretor não está preenchido!");
        if($motorista->nationality_id == null)
            throw new \BusinessException("A Nacionalidade do corretor não está preenchida!");
        if($motorista->city_id == null)
            throw new \BusinessException("A Cidade do corretor não está preenchida!");
            
        $tipo_nacionalidade_id = $this->get_tipo_nacionalidade($env, $motorista->nationality); 
        $tipo_motorista_id = $this->get_tipo_motorista($env); 
        $pais_id = $this->get_pais($env, $motorista->nationality);
        $estado_id = $this->get_estado($env, $motorista->state);
        $cidade_id = $this->get_cidade($env, $motorista->city);
        $estado_emissor_rg_id = $this->get_estado($env, $motorista->issuing_rg_state);
        $pais_residencia = 3; // $this->get_pais($env, $motorista->pais);

        $dados = [
            'Motorista' => [
                'nome_completo' => Helper::sanitizeString($motorista->full_name),
                'tipo_nacionalidade' => $tipo_nacionalidade_id,
                'tipo_motorista' => $tipo_motorista_id,
                'cpf_dni' => Helper::NumbersOnly($motorista->document),
                'rg' => Helper::NumbersOnly($motorista->national_id),
                'estado_emissor_rg' => $estado_emissor_rg_id,
                'pais_motorista' => $pais_id,
                'estado' => $estado_id,
                'cidade' => $cidade_id,
                'data_nascimento' => $motorista->birth_date->format('Y-m-d')
            ],
            'Filiacao' => [
                'nome_pai' => Helper::sanitizeString($motorista->father_name ?? 'NAO CONSTA'),
                'nome_mae' => Helper::sanitizeString($motorista->mother_name ?? 'NAO CONSTA'),
            ],
            'Endereco' => [
                'rua_av_trav' => Helper::sanitizeString($motorista->address),
                'numero' => Helper::sanitizeString($motorista->number),
                'complemento' => Helper::sanitizeString($motorista->address_complement),
                'cep' => Helper::sanitizeString($motorista->father_name),
                'bairro' => Helper::sanitizeString($motorista->neighborhood),
                'estado' => $estado_id,
                'cidade' => $cidade_id,
                'pais_residencia' => $pais_residencia
            ],
            'Contato' => [
                'fone_ddd' => substr($motorista->phone_number ? $motorista->phone_number : $motorista->phone_cell, 0, 2),
                'fone_numero' => substr($motorista->phone_number ? $motorista->phone_number : $motorista->phone_cell, 2),
                'cel_ddd' => substr($motorista->phone_cell, 0, 2),
                'cel_numero' => substr($motorista->phone_cell, 2),
                'email' => $motorista->email,
            ],

        ];
        return $dados;
    }

    private function get_body_form($env, \stdClass $motorista){
        $tipo_motorista_id = $this->get_tipo_motorista($env); 
        $tipo_tempo_empregado = $this->get_tipo_tempo_empregado($env);
        $dados = [
            'Ficha' =>[
                'transportadora_id' => $this->integrator->get_credentials($env)->other,
                'unidade_transporte_id' => $this->integrator->get_credentials($env)->token //'5726' //$this->integrator->get_credentials($env)->other
            ],
            'Motorista' => [
                'cpf_motorista' => Helper::NumbersOnly($motorista->document),
                'vencimento_cnh_motorista' => Carbon::now()->add('2', 'years')->format('Y-m-d'),
                'ddd_fixo_motorista' => substr($motorista->phone_number ? $motorista->phone_number : $motorista->phone_cell, 0, 2),
                'fone_fixo_motorista' => substr($motorista->phone_number ? $motorista->phone_number : $motorista->phone_cell, 2),
                'ddd_celular_motorista' => substr($motorista->phone_cell, 0, 2),
                'fone_celular_motorista' => substr($motorista->phone_cell, 2),
                'tipo_motorista' => $tipo_motorista_id,
                'tempo_empregado_motorista' => 1,
                'tipo_tempo_empregado_motorista' => $tipo_tempo_empregado

            ],
           

        ];
        return $dados;
    }

    private function get_tipo_nacionalidade($env, $nationality){
        // {"nacionalidade":"1","nacionalidade_nome":"Motorista Brasileiro"},
        // {"nacionalidade":"2","nacionalidade_nome":"Motorista Estrangeiro"}
        // temporariamente apenas brasileiro
        // $response = $this->http_request('P', 'get', '/tipo_nacionalidade');
        // $body = $response->json();
        // \Log::stack(['risk-integrator'])->info('Resposta GET NACIONALIDADES', [$body]);

        return 1; //nacionalidade_nome":"Motorista Brasileiro
    }
    private function get_tipo_motorista($env){

         // Neste caso apenas proprio
        // $response = $this->http_request('P', 'get', '/tipo_motorista');
        // $body = $response->json();
        // \Log::stack(['risk-integrator'])->info('Resposta GET tipo motorista', [$body]);

        // {"tipo_motorista":"14","nome_tipo_motorista":"Terceiro Trimestral"},
        // {"tipo_motorista":"15","nome_tipo_motorista":"Ajudante Terceiro Trimestral"},
        // {"tipo_motorista":"11","nome_tipo_motorista":"Agente de Escolta"},
        // {"tipo_motorista":"1","nome_tipo_motorista":"Agregado"},
        // {"tipo_motorista":"2","nome_tipo_motorista":"Terceiro"},
        // {"tipo_motorista":"5","nome_tipo_motorista":"Ajudante Terceiro"},
        // {"tipo_motorista":"4","nome_tipo_motorista":"Funcionário / Motorista"},
        // {"tipo_motorista":"3","nome_tipo_motorista":"Funcionário (Outras Funções)"},
        // {"tipo_motorista":"12","nome_tipo_motorista":"Ajudante de Agregado"},
        // {"tipo_motorista":"7","nome_tipo_motorista":"Ajudante / Funcionário"},
        // {"tipo_motorista":"13","nome_tipo_motorista":"Veiculo Agregado"},
        // {"tipo_motorista":"9","nome_tipo_motorista":"Veiculo Proprio"}]
        // Nó 'CarteiraHabilitacao' :: obrigatório para Terceiros, Agregados e Motorista/Funcionário.
       
        return 5; 
    }
    private function get_pais($env, $nationality){
        // temporariamente apenas brasileiro
        // $response = $this->http_request('P', 'get', '/paises');
        // $body = $response->json();
        // \Log::stack(['risk-integrator'])->info('Resposta GET Pais', [$body]);

        // {"pais":"1","pais_nome":"ARGENTINA"},
        // {"pais":"2","pais_nome":"BOLIVIA"},
        // {"pais":"3","pais_nome":"BRASIL"},
        // {"pais":"6","pais_nome":"CHILE"},
        // {"pais":"11","pais_nome":"EL SALVADOR"},
        // {"pais":"14","pais_nome":"HAITI"},
        // {"pais":"13","pais_nome":"ITALIA"},
        // {"pais":"9","pais_nome":"MONTEVIDEO"},
        // {"pais":"4","pais_nome":"PARAGUAI"},
        // {"pais":"10","pais_nome":"PERU"},
        // {"pais":"12","pais_nome":"PORTUGAL"},
        // {"pais":"5","pais_nome":"URUGUAI"},
        // {"pais":"15","pais_nome":"VENEZUELA"}

        return 3; //BRASIL
    }
    private function get_estado($env, $state){

        // $response = $this->http_request('P', 'get', '/estados');   // /estados_estrangeiros
        // $body = $response->json();
        // \Log::stack(['risk-integrator'])->info('Resposta GET Estado', [$body]);
            
        $estadosTecnorisk = [
            "AC" => "1",
            "AL" => "2",
            "AP" => "3",
            "AM" => "4",
            "BA" => "5",
            "CE" => "6",
            "DF" => "7",
            "ES" => "8",
            "GO" => "9",
            "MA" => "10",
            "MT" => "11",
            "MS" => "12",
            "MG" => "13",
            "PA" => "14",
            "PB" => "15",
            "PR" => "16",
            "PE" => "17",
            "PI" => "18",
            "RJ" => "19",
            "RN" => "20",
            "RS" => "21",
            "RO" => "22",
            "RR" => "23",
            "SC" => "24",
            "SP" => "25",
            "SE" => "26",
            "TO" => "27"
        ];

        return $estadosTecnorisk[$state->code];
    }
    private function get_cidade($env, $city){
        
            // todas as cidades brasileiras mapeadas no arquivo
        return TecnoRiskCities::get_brazilian_city_id($city);

        // $response = $this->http_request('P', 'get', '/cidades?estado=25');   // /cidades_estrangeiras
        // $body = $response->json();
        // \Log::stack(['risk-integrator'])->info('Resposta GET Cidade', [$body]);

        // return 1148; // acrelandia apenas para teste
    }

    private function get_tipo_tempo_empregado($env){
        // {
        //     "tipo_tempo_empregado_motorista": "A",
        //     "nome_tipo_tempo_empregado_motorista": "Ano(s)"
        // },
        // {
        //     "tipo_tempo_empregado_motorista": "D",
        //     "nome_tipo_tempo_empregado_motorista": "Embarque(s)"
        // },
        // {
        //     "tipo_tempo_empregado_motorista": "M",
        //     "nome_tipo_tempo_empregado_motorista": "Mes(es)"
        // },
        // {
        //     "tipo_tempo_empregado_motorista": "N",
        //     "nome_tipo_tempo_empregado_motorista": "Nao Informado"
        // }

        return 'M';
    }
}