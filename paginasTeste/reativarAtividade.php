<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../../config_classes_globais.php');
    require_once("../config_atendimento_web.php");

    // TESTES DA CLASSE LISTA ATIVIDADE
    $listaAtividade = new ListaAtividades();

    $listaAtividade->setIdAtividade($_GET['idAtividade']);

    echo "ID da Atividade: " . $listaAtividade->getIdAtividade()  . "<br><hr>";

    $listaAtividade->reativarAtividade($listaAtividade->getIdAtividade());

    echo "Atividade reativada com sucesso!<br><hr>";

?>

<a href="../index_lista_atividades.php">VOLTAR</a>