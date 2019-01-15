<!-- CABEÇALHO -->
<?php
    require_once('templates/esteira_cabecalho.php');
?>
<link rel="stylesheet" type="text/css" href="css/indicadores_atendimento.css"/>
<!-- /CABEÇALHO -->
    <body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<!-- HEADER -->
			<?php
			    require_once("templates/esteira_header.php");
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
						Indicadores Atendimento Middle | <small>Acompanhamento dos indicadores do Atendimento Middle Office</small>
					</h4>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Gerencial</a></li>
						<li class="active">Indicadores</li>
                    </ol>
                    <!-- content -->
					<section class="content">
						<!--
						###########################################################################################
						############################          INICIO DA PÁGINA         ############################
						###########################################################################################
						-->
                        <div class="row">    
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePizzaContagemAtendimentos" >                                       
                                <div class="divisoriaGrafico col-md-3">                                 
                                    <h4 class="tituloIndicador">Contagem Atendimentos</h4>
                                    <canvas id="myChart"></canvas>
                                </div>                                   
                            </a>
                            <!-- <div class="divisoriaGrafico col-md-3">                                 
                                <h4 class="tituloIndicador">Contagem Atendimentos</h4>    
                            </div>
                            <div class="divisoriaGrafico col-md-3">                                 
                                <h4 class="tituloIndicador">Contagem Atendimentos</h4>    
                            </div>
                            <div class="divisoriaGrafico col-md-3">                                 
                                <h4 class="tituloIndicador">Contagem Atendimentos</h4>    
                            </div> -->
                        </div>
                        <div id="collapsePizzaContagemAtendimentos" class="panel-collapse collapse">
                            <div class="row">
                                <div class="divisoriaTabela col-md-3">
                                    <table id="tabelaPizzaContagemAtendimentos" class="table table-striped compact" ></table>
                                </div>
                            </div>
                        </div>                           
						<!--
						###########################################################################################
						############################           FIM DA PÁGINA           ############################
						###########################################################################################
						-->
					</section>
					<!-- /content -->
				</section>
			</div>
        <!-- RODAPÉ -->
        <?php
		    require_once("templates/esteira_rodape.php");
		?>
        <!-- /RODAPÉ -->    
        </div>
		<!-- /.content-wrapper -->	
		<!-- SCRIPTS DA PÁGINA-->
		<script src="../../esteiracomex2/chart/Chart.js"></script>
        <script src="../../esteiracomex2/chart/Chart.bundle.js"></script>
        <script src="js/indicadoresAtendimento.js">></script>		      
        <!-- /SCRIPTS DA PÁGINA-->
	</body>
</html>