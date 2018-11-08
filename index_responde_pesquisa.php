<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../config_classes_globais.php");
    require_once("config_atendimento_web.php");

    // INSTANCIA OS OBJETOS DAS CLASSES EMPREGADO E REGISTRO ATENDIMENTO
    $entrevistado = new Empregado();
    $atendimento = new RegistroAtendimento();
    $empregadoCeopc = new Empregado();

    // RECEBE DADOS VIA GET E ATRIBUI AO OBJETO 
    $atendimento->setIdAtendimento($_GET['idAtendimento']);
    
    // CHAMA O MÉTODO QUE RESGATA OS DADOS DO ATENDIMENTO
    $atendimento->consultarAtendimento($atendimento->getIdAtendimento());
    
    // CHAMA O MÉTODO QUE RESGATA OS DADOS DO EMPREGADO CEOPC QUE REALIZOU O ATENDIMENTO 
    $empregadoCeopc->settarEmpregado($atendimento->getMatriculaCeopc());

    // VALIDA SE O ENTREVISTADO É A PESSOA ATENDIDA NA CONSULTORIA
    if ($entrevistado->getMatricula() != $_GET['matriculaAtendido']) 
    {
        header("location:http://www.geopc.mz.caixa/esteiracomex/sem_acesso.php");
		exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avaliação Atendimento CEOPC</title>
</head>
<body>
    <h3>Olá <?php echo $entrevistado->getNome(); ?>!</h3>
    <h4>Você retirou dúvidas sobre <?php echo $atendimento->getNomeAtividade(); ?>, via <?php echo $atendimento->getCanalAtendimento(); ?>, no dia <?php echo date("d/m/Y", strtotime($atendimento->getRecuperarDataAtendimento())); ?> com <?php echo $empregadoCeopc->getNome() . "(" . $atendimento->getMatriculaCeopc() . ")."; ?></h4>
    <hr>
    <form action="paginasTeste/capturaNotas.php" method="post">
        <fieldset>
        <legend>AVALIE SEU ATENDIMENTO</legend><br>
        <label>QUESITO: CORDIALIDADE 
            <select name="notaCordialidade">
                <option disabled selected value>NOTA...</option>
                <option value="1">PÉSSIMO</option>
                <option value="2">RUIM</option>
                <option value="3">REGULAR</option>
                <option value="4">BOM</option>
                <option value="5">ÓTIMO</option>
            </select>
        </label><br><br>
        <label>QUESITO: DOMÍNIO 
            <select name="notaDominio">
                <option disabled selected value>NOTA...</option>
                <option value="1">PÉSSIMO</option>
                <option value="2">RUIM</option>
                <option value="3">REGULAR</option>
                <option value="4">BOM</option>
                <option value="5">ÓTIMO</option>
            </select>
        </label><br><br>
        <label>QUESITO: TEMPESTIVIDADE 
            <select name="notaTempestividade">
                <option disabled selected value>NOTA...</option>
                <option value="1">PÉSSIMO</option>
                <option value="2">RUIM</option>
                <option value="3">REGULAR</option>
                <option value="4">BOM</option>
                <option value="5">ÓTIMO</option>
            </select>
        </label><br><br>
        <label>QUER INSERIR ALGUMA OBSERVAÇÃO SOBRE O ATENDIMENTO PRESTADO?<br>
            <textarea name='feedbackAtendido' cols='60' rows='10' placeholder='Insira suas observações aqui...'></textarea>
        </label><br><br>
        <input type="hidden" name="idAtendimento" value="<?php echo $atendimento->getIdAtendimento() ?>">
        <input type="submit" value="AVALIAR"> 
        </fieldset>
    </form>
</body>
</html>