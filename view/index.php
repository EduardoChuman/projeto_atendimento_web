<?php 

require_once('templates/esteira_cabecalho.php');
// require_once("data\carrega_realize_2018.php");
$lg1="CONSULTA";
$lg2="REALIZE 2018";
// include("data\cadastrar_acesso.php");

?>
		<!-- FOLHAS DE ESTILO DA PÁGINA -->
		<!-- /FOLHAS DE ESTILO DA PÁGINA -->
		<style>
			@media (max-height:500px) {
			.content-wrapper {
			min-height: 750px !important;
			}
			}
			.well, .box-title{
				text-align: center;
			}


			#testeTamanho{
				height: 1000px;
			}

			</style>
    </head>
	
    <body class="hold-transition skin-blue sidebar-mini">
<!-- /CABEÇALHO -->

		<div class="wrapper">
			<!-- HEADER -->
			<?php
			// require_once("templates/esteira_header.php");
			?>
			<!-- /HEADER -->	
			
			<!-- MENU LATERAL -->
			<?php
			require_once("templates/esteira_menu_lateral.php");
			?>
			<!-- /MENU LATERAL -->

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h4 class="animated bounceInLeft">
						Indicadores Antecipado | <small>Acompanhamento dos resultados dos contratos antecipados</small>
					</h4>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Gerencial</a></li>
						<li class="active">Indicadores</li>
					</ol>
					<section class="content">
						  
						<!--
						###########################################################################################
						############################          INICIO DA PÁGINA         ############################
						###########################################################################################
						<--></-->



						<h1>Ambiente de homologação </h1>


			
				

						<!--
						###########################################################################################
						############################           FIM DA PÁGINA           ############################
						###########################################################################################
						-->
					</section>
					<!-- /.content -->
				</section>
			</div>
		<?php
		require_once("templates/esteira_rodape.php");
		?>
		</div>
		<!-- /.content-wrapper -->
		<!-- RODAPÉ -->
		<!-- /RODAPÉ -->
		<!-- SCRIPTS DA PÁGINA-->
		<script src="chart/Chart.js"></script>
		<script src="chart/Chart.bundle.js"></script>
		      
        <!-- /SCRIPTS DA PÁGINA-->
	</body>
</html>