<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../config_classes_globais.php');
    require_once("config_atendimento_web.php");

    // TESTES DA CLASSE EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc();
    echo $empregadoCeopc;
    echo "<hr>";    

    // TESTES DA CLASSE REGISTRO ATENDIMENTO

?>