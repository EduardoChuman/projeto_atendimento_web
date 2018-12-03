<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../../config_classes_globais.php");
    require_once("config_atendimento_web.php");

    // INSTANCIA O OBJETO DE REGOSTRO DE PESQUISA
    $pesquisa = new RegistroPesquisa();

    // ATRIBUI O VALOR DAS VÁRIAVEIS POST AOS ATRIBUTOS DO OBJETO
    $pesquisa->setIdRegistroAtendimento($_POST['idAtendimento']);
    $pesquisa->setDataResposta();
    $pesquisa->setNotaCordialidade($_POST['notaCordialidade']);
    $pesquisa->setNotaDominio($_POST['notaDominio']);
    $pesquisa->setNotaTempestividade($_POST['notaTempestividade']);
    $pesquisa->setFeedbackAtendido(mb_strtoupper($_POST['feedbackAtendido'], 'UTF-8'));
    $pesquisa->setConsultoriaAtendida($_POST['consultoriaAtendida']);

    // CHAMA O MÉTODO DE FAZ O UPDATE DAS NOTAS NA TABELA REGISTRO PESQUISAS
    $pesquisa->registrarRespostaPesquisa();

    header("location:voto/"); 

?>
