<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../../config_classes_globais.php");
    require_once("configAtendimentoWeb.php");

    // INSTANCIA OBJETO DA CLASSE LISTA ATIVIDADE
    $listaAtividade = new ListaAtividade();

    $listaAtividade->alteraNomeAtividade($_GET['idAtividade'], $_GET['novoNomeAtividade']);

    echo "Atividade alterada com sucesso!<br>";

?>

<a href="../view/lista_atividades.php">VOLTAR</a>