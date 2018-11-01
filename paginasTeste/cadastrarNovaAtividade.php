<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../../config_classes_globais.php');
    require_once("../config_atendimento_web.php");

    // TESTES DA CLASSE LISTA ATIVIDADE
    $listaAtividade = new ListaAtividades();

    $grupoAtendimento = $_GET['tipoGrupoAtendimento'];
    $nomeAtividade = $_GET['nomeAtividade'];
    $idCelula = $_GET['idCelula'];

    echo "Grupo Atendimento: $grupoAtendimento <br>";
    echo "Nome Atividade: $nomeAtividade <br>";
    echo "ID Celula: $idCelula <br><hr>";

    $listaAtividade->incluirAtividade($grupoAtendimento, $nomeAtividade, $idCelula);
    echo "Atividade cadastrada com sucesso! <br><hr>"

?>

<a href="../index_lista_atividades.php">VOLTAR</a>