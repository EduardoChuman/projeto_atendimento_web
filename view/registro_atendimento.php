<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../../config_classes_globais.php');
    require_once("../controller/configAtendimentoWeb.php");

    // TESTES DA CLASSE EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc(); 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atendimento Web - Pesquisa Middle</title>

    <link rel="stylesheet" href="css/formulario1.css">
    <!-- <link rel="stylesheet" href="bootstrap_4/css/bootstrap.min"> -->
</head>

<header >
                     
            
            <!-- <img class="logoPersonalizado" src="images/caixa_corp_.jpg"> -->
</header>

<body>
    <h3 class="titulo-header-cinza">Formulário atendimento <br/>Middle Office</h3>
    <!-- <h3 class="titulo-header-cinza">OLÁ <?php echo $empregadoCeopc->getNome();  ?>!</h3> -->
    
    <form action="criarFormRegistroAtendimento.php" method="get">
        <fieldset>
            <legend>CADASTRAR UM NOVO ATENDIMENTO</legend>
            <br>
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

    <div id="rodape">
    <img src="images/rodape2.png"/> 
    
        <div>
        <label><span class="logo">caixa</span> <span class="logo2">corporativo</span></label>
        </div>

    </div>


    <script src="js/listasAtividades.js"></script>

</body>
</html>
