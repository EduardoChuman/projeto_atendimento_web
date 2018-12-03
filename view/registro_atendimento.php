<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../../config_classes_globais.php');
    require_once("../controller/config_atendimento_web.php");

    // TESTES DA CLASSE EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc(); 
    $empregadoCeopc->setIdCelula(5);  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atendimento Web - Pesquisa Middle</title>
</head>
<body>
    <h3>OLÁ <?php echo $empregadoCeopc->getNome();  ?>!</h3>
    <form action="criarFormRegistroAtendimento.php" method="get">
        <fieldset>
            <legend>CADASTRAR UM NOVO ATENDIMENTO</legend>

            <label>SELECIONE O TIPO DE ATENDIMENTO:
                <select id="selectbox" name="tipoGrupoAtendimento" onchange="javascript:location.href = this.value;">
                    <option disabled selected value>SELECIONE</option>
                    <option value="criar_form_registro_atendimento.php?tipoGrupoAtendimento=ROTINA">ROTINA</option>
                    <option value="criar_form_registro_atendimento.php?tipoGrupoAtendimento=CONSULTORIA">CONSULTORIA</option>
                </select>
            </label>
            <!-- <input type="submit" value="Proximo..."> -->
        </fieldset>
    </form>
</body>
</html>