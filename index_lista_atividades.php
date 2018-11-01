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

    // TESTES DA CLASSE LISTA ATIVIDADE
    $listaAtividade = new ListaAtividades();
    // MÉTODO DE LISTAR ATIVIDADES DE CONSULTORIA
    // echo $listaAtividade->listaAtividadesConsultoria(5);
    // echo "<hr>";
    // MÉTODO DE LISTAR ATIVIDADES DE ROTINA
    // echo $listaAtividade->listaAtividadesRotina(5);
    // echo "<hr>";
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atendimento Web - Testes do Projeto</title>
</head>
<body>
    <form  method="get" action="paginasTeste/cadastrarNovaAtividade.php">
        <fieldset>
            <legend>CADASTRO DE NOVA ATIVIDADE/CONSULTORIA</legend>

            <label>SELECIONE O TIPO DE ATENDIMENTO:
                <select name="tipoGrupoAtendimento" required>
                    <option value="ATIVIDADE">ATIVIDADE</option>
                    <option value="CONSULTORIA">CONSULTORIA</option>
                </select>
            </label><br>
            <label>NOME:
                <input type="text" name="nomeAtividade" required>
            </label><br>
            <label>CÉLULA:
                <input type="text" name="idCelula" value="<?php echo $empregadoCeopc->getIdCelula(); ?>" readonly> <?php echo $empregadoCeopc->getNomeCelula(); ?>
            </label><br>
            <input type="submit" value="ENVIAR">
        </fieldset>
    </form>

    <form  method="get" action="paginasTeste/desabilitarAtividade.php">
        <fieldset>
            <legend>REMOVER ATIVIDADE/CONSULTORIA</legend>

            <label>QUAL ATENDIMENTO VOCÊ DESEJA REMOVER:
                <select name="idAtividade" required>
                    <option value="36">TERCA EH O LIMITE PARA ENTREGAR ESSAS CLASSES</option>
                </select>
            </label><br>
            <label>CÉLULA:
                <input type="text" name="idCelula" value="<?php echo $empregadoCeopc->getIdCelula(); ?>" readonly> <?php echo $empregadoCeopc->getNomeCelula(); ?>
            </label><br>
            <input type="submit" value="REMOVER">
        </fieldset>
    </form>

    <form  method="get" action="paginasTeste/reativarAtividade.php">
        <fieldset>
            <legend>REATIVAR ATIVIDADE/CONSULTORIA</legend>

            <label>QUAL ATENDIMENTO VOCÊ DESEJA REATIVAR:
                <select name="idAtividade" required>
                    <option value="36">TERCA EH O LIMITE PARA ENTREGAR ESSAS CLASSES</option>
                </select>
            </label><br>
            <label>CÉLULA:
                <input type="text" name="idCelula" value="<?php echo $empregadoCeopc->getIdCelula(); ?>" readonly> <?php echo $empregadoCeopc->getNomeCelula(); ?>
            </label><br>
            <input type="submit" value="REATIVAR">
        </fieldset>
    </form>
    
</body>
</html>