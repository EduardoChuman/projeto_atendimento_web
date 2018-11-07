<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once('../../config_classes_globais.php');
    require_once("../config_atendimento_web.php");

    // TESTES DA CLASSE REGISTRO ATENDIMENTO
    $registroAtendimento = new RegistroAtendimento();

    // SET DA VARIÁVEL DE UNIDADE DEMANDANTE CONFORME O TIPO DO ATENDIMENTO
    if ($_POST['tipoAtendimento'] == 'CONSULTORIA') 
    {
        $atendido = new Empregado();
        $atendido->settarEmpregado($_POST['matriculaAtendido']);
        echo "$atendido<hr>";
        $registroAtendimento->setMatriculaAtendido($atendido->getMatricula());

        if ($atendido->getLotacaoFisica() == " " || $atendido->getLotacaoFisica() == 0) 
        {
            $unidadeDemandante = $atendido->getLotacaoAdm();
        } 
        else 
        {
            $unidadeDemandante = $atendido->getLotacaoFisica();
        }
    }
    else 
    {
        $unidadeDemandante = $_POST['unidadeDemandante'];
    } 

    $registroAtendimento->setMatriculaCeopc($_POST['matriculaCeopc']);
    $registroAtendimento->setTipoAtendimento($_POST['tipoAtendimento']);
    $registroAtendimento->setCanalAtendimento($_POST['canalAtendimento']);
    $registroAtendimento->setItemListaAtividades($_POST['itemListaAtividades']);
    $registroAtendimento->setObservacaoCeopc($_POST['observacaoCeopc']);
    $registroAtendimento->setUnidadeDemandante($unidadeDemandante);

    // VALIDANDO A ATRIBUIÇÃO DAS VARIÁVEIS
    // echo "Matricula CEOPC: " . $registroAtendimento->getMatriculaCeopc() . "<br>";
    // echo "Tipo Atendimento: " . $registroAtendimento->getTipoAtendimento() . " <br>";
    // echo "Canal Atendimento: " . $registroAtendimento->getCanalAtendimento() . " <br>";
    // echo "Atividade: " . $registroAtendimento->getItemListaAtividades() . " <br>";
    // echo "Observação CEOPC: " . $registroAtendimento->getObservacaoCeopc() . " <br>";
    // echo "Matricula Atendido: " . $registroAtendimento->getMatriculaAtendido() . " <br>";
    // echo "Unidade Demandante: " . $registroAtendimento->getUnidadeDemandante() . " <br>";

    $registroAtendimento->registrarAtendimento();

?>