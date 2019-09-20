<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once('../../config_classes_globais.php');
    require_once("configAtendimentoWeb.php");

    // INSTANCIA OBJETO DA CLASSE REGISTRO ATENDIMENTO
    $registroAtendimento = new RegistroAtendimento();

    // SET DA VARIÁVEL DE UNIDADE DEMANDANTE CONFORME O TIPO DO ATENDIMENTO
    if ($_POST['tipoAtendimento'] == 'CONSULTORIA') {
        $atendido = new Empregado();
        $atendido->settarEmpregado($_POST['matriculaAtendido']);
        $registroAtendimento->setMatriculaAtendido($atendido->getMatricula());

        if ($atendido->getLotacaoFisica() == " " || $atendido->getLotacaoFisica() == 0) {
            $unidadeDemandante = $atendido->getLotacaoAdm();
        } else {
            $unidadeDemandante = $atendido->getLotacaoFisica();
        }
    } else {
        $unidadeDemandante = $_POST['unidadeDemandante'];
    } 

    // RECEBE OS VALORES VIA POST E ATRIBUI AO OBJETO
    $registroAtendimento->setMatriculaCeopc($_POST['matriculaCeopc']);
    $registroAtendimento->setTipoAtendimento($_POST['tipoAtendimento']);
    $registroAtendimento->setCanalAtendimento($_POST['canalAtendimento']);
    $registroAtendimento->setItemListaAtividades($_POST['itemListaAtividades']);
    $registroAtendimento->setObservacaoCeopc(mb_strtoupper($_POST['observacaoCeopc'], 'UTF-8'));
    $registroAtendimento->setUnidadeDemandante($unidadeDemandante);

    // // REGISTRO ATENDIMENTO
    // if ($_POST['tipoAtendimento'] == 'CONSULTORIA') 
    // {
    //     $registroAtendimento->registrarAtendimentoConsultoria();
    // }
    // else
    // {
    //     $registroAtendimento->registrarAtendimentoRotina();
    // } 
    

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/formulario1.css">
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script language="JavaScript" type="text/javascript">
        window.onload = setTimeout("location.href = '../view/registro_atendimento.html'",2500);
    </script>
    <title>SUCESSSO</title>
</head>
    <body>
        <h3 class="titulo-header-cinza">Formulário atendimento <br/>Middle Office</h3>
        <br>
        <h2>
            <?php     
                if ($_POST['tipoAtendimento'] == 'CONSULTORIA') {
                    $registroAtendimento->registrarAtendimentoConsultoria();
                } else {
                    $registroAtendimento->registrarAtendimentoRotina();
                }  
            ?>
        </h2>
        <div id="rodape">
            <img src="../view/images/rodape2.png"/> 
            <div>
                <label><span class="logo">caixa</span> <span class="logo2">corporativo</span></label>
            </div>
        </div>
    </body>
</html>