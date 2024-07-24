<?php

function NumbersOnly($string) {
    return preg_replace('/[^0-9]/', '', $string);
}

function sanitizeString($string){
    if($string == null)
        return '';
    $withAccents = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
    $withoutAccents = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');

    return str_replace($withAccents, $withoutAccents, $string);
}

function mes_por_extenso($numero){
    $numero = $numero * 1;
      $meses = [
          '1' => 'Janeiro',
          '2' => 'Fevereiro',
          '3' => 'Março',
          '4' => 'Abril',
          '5' => 'Maio',
          '6' => 'Junho',
          '7' => 'Julho',
          '8' => 'Agosto',
          '9' => 'Setembro',
          '10' => 'Outubro',
          '11' => 'Novembro',
          '12' => 'Dezembro'
      ];

      return $meses[$numero];
  }

  function mes_por_extenso_abr($numero){
    $numero = $numero * 1;
      $meses = [
          '1' => 'Jan',
          '2' => 'Fev',
          '3' => 'Mar',
          '4' => 'Abr',
          '5' => 'Mai',
          '6' => 'Jun',
          '7' => 'Jul',
          '8' => 'Ago',
          '9' => 'Set',
          '10' => 'Out',
          '11' => 'Nov',
          '12' => 'Dez'
      ];

      return $meses[$numero];
  }

  function dia_da_semana($dia){
    $dia = $dia * 1;
      $dias = [
          '0' => 'Domingo',
          '1' => 'Segunda-feira',
          '2' => 'Terça-feira',
          '3' => 'Quarta-feira',
          '4' => 'Quinta-feira',
          '5' => 'Sexta-feira',
          '6' => 'Sábado',
      ];

      return $dias[$dia];
  }


  function valor_formatado($valor = 0) {
    return parametro('moeda', 'R$') . " " . number_format($valor, 2, ',', '.') ;
  }

  function valor_por_extenso($valor = 0, $moeda_singular = 'real', $moeda_plural = 'reais') {
      $singular = array("centavo", $moeda_singular, "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
      $plural = array("centavos", $moeda_plural, "mil", "milhões", "bilhões", "trilhões","quatrilhões");
      $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
      $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
      $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
      $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

      $z = 0;
      $valor = number_format($valor, 2, ".", ".");
      $inteiro = explode(".", $valor);
      $count = count($inteiro);
      $rt = "";

      for ($i = 0; $i < $count; $i++) {
        for ($ii = strlen($inteiro[$i]); $ii < 3; $ii++) {
          $inteiro[$i] = "0" . $inteiro[$i];
        }
      }

      $fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);

      for ($i = 0; $i < count($inteiro); $i++) {
        $valor = $inteiro[$i];

        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];

        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];

        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

        $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;

        $t = count($inteiro) - 1 - $i;

        $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";

        if ($valor == "000") {
          $z++;
        } elseif ($z > 0) {
          $z--;
        }

        if (($t == 1) && ($z > 0) && ($inteiro[0] > 0)) {
          $r .= (($z > 1) ? " de " : " ") . $plural[$t];
        }

        if ($r) {
          $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : "") . $r;
        }
      }

      return($rt ? $rt : "zero");
    }


    function somente_numeros($string){
      $somente_numeros = "";
      preg_match_all('!\d+!', $string, $somente_numeros);
      $somente_numeros = implode('',$somente_numeros[0]);
      return $somente_numeros;
    }

    function tagPlan($texto) {
        // Converter o texto para minúsculas para facilitar a comparação
        $texto = strtolower($texto);

        // Procurar por cada palavra-chave e retornar o resultado apropriado
        if (strpos($texto, 'indaiatuba') !== false) {
            return 'indaiatuba';
        } elseif (strpos($texto, 'são carlos') !== false) {
            return 'saocarlos';
        } elseif (strpos($texto, 'araraquara') !== false) {
            return 'araraquara';
        } elseif (strpos($texto, 'híbrido') !== false) {
            return 'hibrido';
        } else {
            // Se nenhuma das palavras-chave for encontrada, retorna null
            return null;
        }
    }
