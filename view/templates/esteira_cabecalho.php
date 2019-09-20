<!-- CABEÇALHO DA ESTEIRA -->
<?php
//session_start();


	// VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
	ini_set('display_errors',1);
	// CAPTURAR A RAIZ DO SERVIDOR
	$caminho = $_SERVER["DOCUMENT_ROOT"];
	// CHAMA O ARQUIVO DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
	require_once($caminho . DIRECTORY_SEPARATOR . "esteiracomex2" . DIRECTORY_SEPARATOR . "email_cliente_esteira" . DIRECTORY_SEPARATOR . "config_email_cliente_esteira.php");

	$user = new Empregado();
	
	$apelido = strstr($user->getNome(), " ", true); 

	$perfil_user = $user->getNivelAcesso();
	// $perfil_user = '500';
	$funcao_user = $user->getFuncao();
	// $funcao_user = 'Developer';
	$data_caixa_user = date_format(date_create($user->getDataAdmissao()), "d/m/Y");
	// $data_caixa_user = '01/04/2018';
	$usuario = $user->getMatricula();
	// $usuario ='c079436';
	$nome_abreviado = $apelido;
	// $nome_abreviado = 'Vlad';
	$nome_user = $user->getNome();
	// $nome_user = 'Vlad';
	$unidade_user = $user->getLotacaoAdm();

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<title>GEOPC - ESTEIRA COMEX</title>
		<link rel="shortcut icon" href="images/favicon.ico">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
		
		<link rel="stylesheet" href="../../esteiracomex2/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/ionicons-master/css/ionicons.min.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/datatables/jquery.dataTables.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/dist/css/AdminLTE.min.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/dist/css/skins/skin-blue-caixa.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/iCheck/flat/blue.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/morris/morris.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/select2/select2.min.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/jvectormap/jquery-jvectormap-1.2.2.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/datepicker/datepicker3.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/daterangepicker/daterangepicker.css"/>
		<link rel="stylesheet" href="../../esteiracomex2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../esteiracomex2/plugins/animate/animate.min.css"/>


		<style>
			.modal {
			text-align: center;
			padding: 0!important;
			}

			.modal:before {
			content: '';
			display: inline-block;
			height: 100%;
			vertical-align: middle;
			margin-right: -4px;
			}

			.modal-dialog {
			display: inline-block;
			text-align: left;
			vertical-align: middle;
			}
			.bounceInDown {
			-webkit-animation-name: bounceInDown;
			animation-name: bounceInDown;
			-webkit-animation-duration: 6s;
			animation-duration: 6s;
			}
			.example-modal .modal {
			  position: relative;
			  top: auto;
			  bottom: auto;
			  right: auto;
			  left: auto;
			  display: block;
			  z-index: 1;
			}

			.example-modal .modal {
			  background: transparent !important;
			}
		</style>
		