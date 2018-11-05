<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../config_classes_globais.php');
    require_once("config_atendimento_web.php");

    // TESTES DA CLASSE EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc();   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atendimento Web - Testes do Projeto</title>
</head>
<body>
    <h3>OLÁ <?php echo $empregadoCeopc->getNome();  ?>!</h3>
    <form action="paginasTeste/criarFormRegistroAtendimento.php" method="get">
        <fieldset>
            <legend>CADASTRAR UM NOVO ATENDIMENTO</legend>

            <label>SELECIONE O TIPO DE ATENDIMENTO:
                <select name="tipoGrupoAtendimento" required>
                    <option value="ATIVIDADE">ATIVIDADE</option>
                    <option value="CONSULTORIA">CONSULTORIA</option>
                </select><br><br>
            </bel>
            <input type="submit" value="Proximo...">
        </fieldset>
    </form>
</body>
</html>