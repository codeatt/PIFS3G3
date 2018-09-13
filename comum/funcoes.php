<?php
//Verificar caracteres minusculos
function possuiLetrasMinusculas($valor) {
    return preg_match('/[a-z]/', $valor);
}
//Verificar caracteres maiusculos
function possuiLetrasMaiusculas($valor) {
    return preg_match('/[A-Z]/', $valor);
}
//Verificar numeros
function possuiNumeros($valor) {
    return preg_match('/[0-9]/', $valor);
}
//Verificar caracteres especiais aceitos para composição de senha
function possuiCaracterEspecialValido($valor) {
    return preg_match('/[!@#$%&*-+.?]/', $valor);
}
//Verifica se possui apenas caracteres alfanumericos
function possuiSomenteCaracterAlfanumerico($valor) {
    return ctype_alnum(str_replace(array('-', '_'), '', $valor));
}

//Validar data no formato dd/MM/yyyy
function validarData($valor) {
  // if(preg_match('/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/', $valor))
  // {
  if(strpos($valor,'/')) {
    $temp = explode('/', $valor);
    var_dump($temp);
    return checkdate($temp[1], $temp[0], $temp[2]);
  } else {
    $temp = explode('-', $valor);
    var_dump($temp);
    return checkdate($temp[1], $temp[2], $temp[0]);
  }

  // }
  // else
  // {
  //     return false;
  // }
}
//Validar email
function validarEmail($valor) {
  return filter_var($valor, FILTER_VALIDATE_EMAIL);
}
//Validar telefone 8 e 9 digitos
function validarTelefone($valor) {
	return preg_match('/^\([0-9]{2}\)?\s?[0-9]{4,5}-[0-9]{4}$/', $valor);
}
//Validar CEP
function validarCEP($valor) {
	return preg_match('/[0-9]{5,5}([-]?[0-9]{3})?$/', $valor);
}
//Verifica se CPF é válido
function validarCPF($cpf) {

	// Verifica se um número foi informado
	if(empty($cpf)) {
		return false;
	}

	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

	// Verifica se o numero de digitos informados é igual a 11
	if (strlen($cpf) != 11) {
		return false;
	}
	// Verifica se nenhuma das sequências invalidas abaixo
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' ||
		$cpf == '11111111111' ||
		$cpf == '22222222222' ||
		$cpf == '33333333333' ||
		$cpf == '44444444444' ||
		$cpf == '55555555555' ||
		$cpf == '66666666666' ||
		$cpf == '77777777777' ||
		$cpf == '88888888888' ||
		$cpf == '99999999999') {
		return false;
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {

		for ($t = 9; $t < 11; $t++) {

			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
}

//Validar extensão de arquivo
function validarArquivo($nomeArquivo,$ext) {
  $tmpnome = explode('.', $nomeArquivo);
  $extensao = strtolower(end($tmpnome));
  var_dump($extensao);
  echo "<br>";
  var_dump($ext);
  return (array_search($extensao, $ext) !== false);
}

?>
