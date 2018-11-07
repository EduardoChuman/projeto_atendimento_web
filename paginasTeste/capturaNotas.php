<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../../config_classes_globais.php');
    require_once("../config_atendimento_web.php");

    

    $pesquisa = new RegistroPesquisa();

    $pesquisa->setIdRegistroAtendimento($_POST['idAtendimento']);
    $pesquisa->setDataResposta();
    $pesquisa->setNotaCordialidade($_POST['notaCordialidade']);
    $pesquisa->setNotaDominio($_POST['notaDominio']);
    $pesquisa->setNotaTempestividade($_POST['notaTempestividade']);
    $pesquisa->setFeedbackAtendido($_POST['feedbackAtendido']);

    $pesquisa->registrarRespostaPesquisa();





    // $dataEnvio = '01/01/1900';
    // $idRegistroAtendimento = 10;
    // $matriculaAtendido = 'c111710';
    // $matriculaCeopc = 'c079436';
    // $canalAtendimento = 'SINAL DE FUMAÇA';
    // $nomeAtividade = 'GDP ATRASADO';



    //     echo "
    //     <head>
    //         <meta charset=\"UTF-8\">
    //         <style>
    //             body{
    //                 font-family: arial,verdana,sans serif;
    //             }

    //             .head_msg{
    //                 font-weight: bold;
    //                 text-align: center;
    //             }

    //             .gray{
    //                 color: #808080;
    //             }


    //         </style>
    //     </head>
    //     <body style=\"font-family: arial;\">


    //         <h3 class=\"head_msg gray\">TESTE DE ENVIO.</h3>
    //         <p>Data do Atendimento: " . $dataEnvio . ".</p>
    //         <p>Protocolo Atendimento: " . $idRegistroAtendimento . ".</p>
    //         <p>Matricula Atendido: " . $matriculaAtendido . ".</p>
    //         <p>Matricula CEOPC: " . $matriculaCeopc . ".</p>
    //         <p>Tipo Atendimento: CONSULTORIA.</p>
    //         <p>Canal de Atendimento: " . $canalAtendimento . ".</p>
    //         <p>Nome Atividade: " . $nomeAtividade . ".</p><br><br>
    //         <p>Para responder a pesquisa, <a href='http://www.ceopc.hom.sp.caixa/atendimento_web/index_responde_pesquisa.php?idAtendimento=" . $idRegistroAtendimento . "&matriculaAtendido=" . $matriculaAtendido . "'>clique aqui</a>.</p>
    //     </body>";

?>
