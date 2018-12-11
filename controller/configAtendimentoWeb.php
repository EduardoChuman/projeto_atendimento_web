<?php
// VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
ini_set('display_errors',1); 

// FUNÇÃO QUE VERIFICA SE DETERMINADA CLASSE EXISTE E, EM CASO AFIRMATIVO, FAZ O REQUIRE DO ARQUIVO
spl_autoload_register(function($className)
{
	// CAMINHO FIXO
	$caminho = $_SERVER["DOCUMENT_ROOT"];
	// SERVIDOR CEOPC (TESTES - esteiracomex)
	// $fileName = $caminho . DIRECTORY_SEPARATOR . "esteiracomex" . DIRECTORY_SEPARATOR . "atendimento_web" . DIRECTORY_SEPARATOR . "class". DIRECTORY_SEPARATOR . $className . ".php";
	// SERVIDOR CEOPC (PRODUÇÃO - esteiracomex2)
	// $fileName = $caminho . DIRECTORY_SEPARATOR . "esteiracomex2" . DIRECTORY_SEPARATOR . "atendimento_web" . DIRECTORY_SEPARATOR . "class". DIRECTORY_SEPARATOR . $className . ".php";
	// SERVIDOR HOMOLOGAÇÃO
	$fileName = $caminho . DIRECTORY_SEPARATOR . "atendimento_web". DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . $className . ".php";

	if(file_exists($fileName)) 
	{
		require_once($fileName);
	}
});