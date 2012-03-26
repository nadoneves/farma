<?php

function cnpj( $cnpj ) {
	
	$cnpj = preg_replace ("@[./-]@", "", $cnpj);
	
	if ($cnpj == "00000000000000") return 0;
	if (strlen($cnpj) <> 14) return 0;
	$soma1 = ($cnpj[0] * 5) +
		($cnpj[1] * 4) +
		($cnpj[2] * 3) +
		($cnpj[3] * 2) +
		($cnpj[4] * 9) +
		($cnpj[5] * 8) +
		($cnpj[6] * 7) +
		($cnpj[7] * 6) +
		($cnpj[8] * 5) +
		($cnpj[9] * 4) +
		($cnpj[10] * 3) +
		($cnpj[11] * 2);

	$resto = $soma1 % 11;
	$digito1 = $resto < 2 ? 0 : 11 - $resto;

	$soma2 = ($cnpj[0] * 6) +
		($cnpj[1] * 5) +
		($cnpj[2] * 4) +
		($cnpj[3] * 3) +
		($cnpj[4] * 2) +
		($cnpj[5] * 9) +
		($cnpj[6] * 8) +
		($cnpj[7] * 7) +
		($cnpj[8] * 6) +
		($cnpj[9] * 5) +
		($cnpj[10] * 4) +
		($cnpj[11] * 3) +
		($cnpj[12] * 2);

	$resto = $soma2 % 11;
	$digito2 = $resto < 2 ? 0 : 11 - $resto;

	return (($cnpj[12] == $digito1) && ($cnpj[13] == $digito2));
}

function cpf( $cpf ){

  $cpf = preg_replace ("@[.-]@", "", $cpf);
  
  if (strlen($cpf) <> 11) return false;

  //VERIFICA
    if( ($cpf == '11111111111') || ($cpf == '22222222222') ||
      ($cpf == '33333333333') || ($cpf == '44444444444') ||
      ($cpf == '55555555555') || ($cpf == '66666666666') ||
      ($cpf == '77777777777') || ($cpf == '88888888888') ||
      ($cpf == '99999999999') || ($cpf == '00000000000') ) {
        return false;

    }else {
          //PEGA O DIGITO VERIFIACADOR
          $dv_informado = substr($cpf, 9,2);

          for($i=0; $i<=8; $i++) {
            $digito[$i] = substr($cpf, $i,1);
          }

          //CALCULA O VALOR DO 10º DIGITO DE VERIFICAÇÂO
          $posicao = 10;
          $soma = 0;

          for($i=0; $i<=8; $i++) {
            $soma = $soma + $digito[$i] * $posicao;
            $posicao = $posicao - 1;
          }

          $digito[9] = $soma % 11;

          if($digito[9] < 2) {
            $digito[9] = 0;
          } else {
            $digito[9] = 11 - $digito[9];
          }

          //CALCULA O VALOR DO 11º DIGITO DE VERIFICAÇÃO
          $posicao = 11;
          $soma = 0;

          for ($i=0; $i<=9; $i++) {
            $soma = $soma + $digito[$i] * $posicao;
            $posicao = $posicao - 1;
          }

          $digito[10] = $soma % 11;

          if ($digito[10] < 2) {
            $digito[10] = 0; 
          } else {
            $digito[10] = 11 - $digito[10];
          }

          //VERIFICA SE O DV CALCULADO É IGUAL AO INFORMADO
          $dv = $digito[9] * 10 + $digito[10];
          if ($dv != $dv_informado) {
            return false;
          } else {
            return true;
          }
    }
}
