<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../../config_classes_globais.php");
    require_once("config_atendimento_web.php");

    // INSTANCIA OBJETO DA CLASSE LISTA ATIVIDADE
    $listaAtividade = new ListaAtividades();

    // ATRIBUI OS DADOS RECEBIDOS VIA GET NAS VARIÁVEIS
    $grupoAtendimento = $_GET['tipoGrupoAtendimento'];
    $nomeAtividade = $_GET['nomeAtividade'];
    $idCelula = $_GET['idCelula'];

    // CHAMA O MÉTODO DE REGISTRO DE ATIVIDADE
    $listaAtividade->incluirAtividade($grupoAtendimento, $nomeAtividade, $idCelula);
    
    echo "Atividade cadastrada com sucesso! <br><hr>"

?>
<a href="index_lista_atividades.php">VOLTAR</a>