<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../../config_classes_globais.php');
    require_once("../config_atendimento_web.php");

    // CAPTURA OS DADOS DO EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc();

    // TESTES DA CLASSE REGISTRO ATENDIMENTO
    $classeListaAtividade = new ListaAtividades();
    $registroAtendimento = new RegistroAtendimento();

    $atendido = new Empregado();
    $atendido->settarEmpregado($_POST['matriculaAtendido']);

    if ($atendido->getNomeLotacaoFisica() == " ") 
    {
        $unidadeDemandante = $atendido->getLotacaoAdm();
    } 
    else 
    {
        $unidadeDemandante = $atendido->getNomeLotacaoFisica();
    }

    echo "$atendido<hr>";

    $registroAtendimento->setMatriculaCeopc($_POST['matriculaCeopc']);
    $registroAtendimento->setTipoAtendimento($_POST['tipoAtendimento']);
    $registroAtendimento->setCanalAtendimento($_POST['canalAtendimento']);
    $registroAtendimento->setItemListaAtividades($_POST['itemListaAtividades']);
    $registroAtendimento->setObservacaoCeopc($_POST['observacaoCeopc']);
    $registroAtendimento->setMatriculaAtendido($atendido->getMatricula());
    $registroAtendimento->setUnidadeDemandante($unidadeDemandante);


?>