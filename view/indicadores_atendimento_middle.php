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
                        <li><a href="#"><i class="fa fa-dashboard"></i> Indicadores</a></li>
                        <li class="active">Atendimento Middle Office</li>
                    </ol>
                    <!-- content -->
                    <section class="content">
                        <!--
                        ###########################################################################################
                        ############################          INICIO DA PÁGINA         ############################
                        ###########################################################################################
                        -->
                        <h3 class="text-center">
                            Números relativos a <span id="mes-atual"></span>
                        </h3>
                        <!-- GRAFICOS NO INICIO DA PÁGINA -->
                        <div class="row graficosInicioPagina">    
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsePizzaContagemAtendimentos" >                                       
                                <div class="divisoriaGrafico col-md-4">                                 
                                    <h4 class="tituloIndicador">Rotina/Consultoria</h4>
                                    <canvas id="ChartPizzaAtendimentoRotinaConsultoria"></canvas>
                                </div>                                   
                            </a>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseChartPorCanalAtendimento" >                                       
                                <div class="divisoriaGrafico col-md-4">                                 
                                    <h4 class="tituloIndicador">Canal de Atendimento</h4>
                                    <canvas id="ChartPorCanalAtendimento"></canvas>
                                </div>                                   
                            </a>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseChartMediaNotasPesquisa" >                                       
                                <div class="divisoriaGrafico col-md-4">                                 
                                    <h4 class="tituloIndicador">Média de Notas</h4>
                                    <canvas id="ChartMediaNotasPesquisa"></canvas>
                                </div>                                   
                            </a>
                        </div>
                        <!-- /GRAFICOS NO INICIO DA PÁGINA -->
                        <!-- <a href="sip:C095060@corp.caixa.gov.br" class="option">Entrar em contato via Lync</a>  -->
                        
                        <!-- DATA TABLES REFERENTES AOS GRAFICOS ACIMA -->
                        <div id="collapsePizzaContagemAtendimentos" class="panel-collapse collapse">
                            <div class="row">
                                <div class="divisoriaTabela col-md-12">
                                    <table id="tabelaPizzaContagemAtendimentos" class="table table-striped compact" ></table>
                                </div>
                            </div>
                        </div>
                        <div id="collapseChartPorCanalAtendimento" class="panel-collapse collapse">
                            <div class="row">
                                <div class="divisoriaTabela col-md-12">
                                    <table id="tabelaPorCanalAtendimento" class="table table-striped compact" ></table>
                                </div>
                            </div>
                        </div>
                        <div id="collapseChartMediaNotasPesquisa" class="panel-collapse collapse">
                            <div class="row">
                                <div class="divisoriaTabela col-md-12">
                                    <table id="tabelaMediaNotasPesquisa" class="table table-striped compact" ></table>
                                </div>
                            </div>
                        </div>
                        <!-- /DATA TABLES REFERENTES AOS GRAFICOS ACIMA -->

                        <!-- COLLAPSE BOX COM OS DATA TABLES DE CONTAGEM DE ATENDIMENTO POR ROTINA E CONSULTORIA -->
                        <div class="row">           
                            <div class="col-md-6">  
                                <div class="box box-warning collapsed-box" id ="volumeAtendimentoRotina">
                                    <div class="box-header with-border">
                                        <h2 class="box-title"><strong>Atendimento por tipo de Rotina</strong></h2>
                                        <div class="box-tools pull-right">
                                            <button type="button" id="exibirAtendimentoRotina" class="btn btn-box-tool" >
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>                                   
                                    <div class="box-body">                                                                                                                                           
                                        <div class="divisoriaTabela col-md-12">
                                            <table id="tabelaAtendimentoRotina" class="table table-striped compact"></table>
                                        </div>
                                    </div>                                                 
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="box box-warning collapsed-box" id ="volumeAtendimentoConsultoria">
                                    <div class="box-header with-border">
                                        <h2 class="box-title"><strong>Atendimento por tipo de Consultoria</strong></h2>
                                        <div class="box-tools pull-right">
                                            <button type="button" id="exibirAtendimentoConsultoria" class="btn btn-box-tool">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>                                 
                                    <div class="box-body">                                                                                                                                              
                                        <div class="divisoriaTabela col-md-12">
                                            <table id="tabelaAtendimentoConsultoria" class="table table-striped compact"></table>                                               
                                        </div>
                                    </div>                                                
                                </div>
                            </div>
                        </div>
                        <!-- /COLLAPSE BOX COM OS DATA TABLES DE CONTAGEM DE ATENDIMENTO POR ROTINA E CONSULTORIA -->
                        
                        <div class="">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs pull-left ui-sortable-handle" role="tablist">
                                <li role="presentation" class=" active"><a href="#atendimentosPorDire" aria-controls="atendimentosPorDire" role="tab" data-toggle="tab">Contagem atendimentos por DIRE</a></li>
                                <li role="presentation" class=""><a href="#contagemAtendimentoPorAssistente" aria-controls="contagemAtendimentoPorAssistente" role="tab" data-toggle="tab">Contagem de atendimentos por assistente</a></li>
                                <li role="presentation" class=""><a href="#pesquisasEnviadasRespondidasPorAssistente" aria-controls="pesquisasEnviadasRespondidasPorAssistente" role="tab" data-toggle="tab">Contagem de pesquisas enviadas/respondidas por assistente</a></li>
                                <li role="presentation" class=""><a href="#feedbackAtendimentos" aria-controls="feedbackAtendimentos" role="tab" data-toggle="tab">Feedback atendimento Middle</a></li>
                                <li role="presentation" class=""><a href="#gestaoAtividades" aria-controls="messages" role="tab" data-toggle="tab">Gestão Atividades</a></li>
                            </ul> 
                        <!-- Tab panes -->
                            <div class="tab-content no-padding">
                                <div role="tabpanel" class="tab-pane fade in active" id="atendimentosPorDire">
                                    <div class="divisoriaTabela box-body col-md-12">
                                        <table id="tabelaAtendimentosPorDire" class="table table-striped compact"></table>                                               
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="contagemAtendimentoPorAssistente">
                                    <div class="divisoriaTabela col-md-12">
                                        <table id="tabelaAtendimentoPorAssistente" class="table table-striped compact"></table>                                               
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="pesquisasEnviadasRespondidasPorAssistente">
                                    <div class="divisoriaTabela col-md-12">
                                        <table id="tabelaPesquisasEnviadasRespondidasPorAssistente" class="table table-striped compact"></table>                                               
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="feedbackAtendimentos">
                                    <div class="divisoriaTabela col-md-12">
                                        <table id="tabelafeedbackAtendimentos" class="table table-striped compact"></table>                                               
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="gestaoAtividades">
                                    <div class="divisoriaTabela col-md-12">
                                        <table id="tabelafeedbackAtendimentos" class="table table-striped compact"></table>                                               
                                    </div>
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
        <script src="js/indicadoresAtendimento.js"></script>		      
        <script src="js/componentes-iterativos.js"></script>             
        <!-- /SCRIPTS DA PÁGINA-->
	</body>
</html>