<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../../config_classes_globais.php");
    require_once("config_atendimento_web.php");

    // INSTANCIA OBJETO DA CLASSE LISTA ATIVIDADE
    $listaAtividade = new ListaAtividades();

    // RECEBE DADOS VIA GET E ATRIBUI AO OBJETO
    $listaAtividade->setIdAtividade($_GET['idAtividade']);

    echo "ID da Atividade: " . $listaAtividade->getIdAtividade()  . "<br><hr>";

    // CHAMA O MÉTODO DE REATIVAR A ATIVIDADE
    $listaAtividade->reativarAtividade($listaAtividade->getIdAtividade());

    echo "Atividade reativada com sucesso!<br><hr>";
    
?>

<a href="lista_atividades.php">VOLTAR</a>
