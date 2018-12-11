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


// VERIFICA SE O NAVEGADOR É O INTERNET EXPLORER
	preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
	if(count($matches)<2){
	  preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
	}

	if (count($matches) > 1 && $matches[1] <= 11){
	    echo '
		    	<h1> 
		    		Por gentileza, utilizar o Mozilla Firefox ou o Google Chrome ou o Microsoft Edge para utilizar o site.
		    	</h1> 
	    	  	
	    	  	<p>Estamos trabalhando para compatibilizar a Esteira Comex com o navegador da MS. </p>
	    	  	
	    	  	<p>link: 
	    	  		<a href ="http://www.ceopc.sp.caixa/esteiracomex2/cadastro_email_cliente_comex.php"> 
	    	  			Copie o Link 
	    	  		</a>
	    	  	</p>

	    	  	<center> <img src="img/ie_naum.jpg"> <center>

	    	  ';

	    die();
	}


?>







<!DOCTYPE html>

<html>



	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

		<title>GEOPC - ESTEIRA COMEX</title>
		<link rel="icon" type="image/png" href="dist/img/esteira.png"/>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
		
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="plugins/font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="plugins/ionicons-master/css/ionicons.min.css"/>
		<link rel="stylesheet" href="plugins/datatables/jquery.dataTables.css"/>
		<link rel="stylesheet" href="dist/css/AdminLTE.min.css"/>
		<link rel="stylesheet" href="dist/css/skins/skin-blue-caixa.css"/>
		<link rel="stylesheet" href="plugins/iCheck/flat/blue.css"/>
		<link rel="stylesheet" href="plugins/morris/morris.css"/>
		<link rel="stylesheet" href="plugins/select2/select2.min.css"/>
		<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css"/>
		<link rel="stylesheet" href="plugins/datepicker/datepicker3.css"/>
		<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"/>
		<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>
		<link rel="stylesheet" type="text/css" href="../plugins/animate/animate.min.css"/>


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
		