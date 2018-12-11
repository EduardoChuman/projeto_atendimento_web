<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../../config_classes_globais.php");
    require_once("../controller/configAtendimentoWeb.php");

    // INSTANCIA O OBJETO EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc();
    //$empregadoCeopc->setIdCelula(5);  
    
    // FORÇA A CÉLULA MIDDLE OFFICE PARA QUE TENHAMOS DADOS DE ATIVIDADES
    $empregadoCeopc->setIdCelula(5);
    // INSTACIA OS OBJETOS LISTA ATIVIDADE E REGISTRO ATENDIMENTO
    $classeListaAtividade = new ListaAtividade();
    $registroAtendimento = new RegistroAtendimento();

    $listaAtividadeRotina = json_decode($classeListaAtividade->listaAtividadesRotina($empregadoCeopc->getIdCelula()), TRUE);
    $listaAtividadeConsultoria = json_decode($classeListaAtividade->listaAtividadesConsultoria($empregadoCeopc->getIdCelula()), TRUE);
    $listaAtividadeDesabilitadas = json_decode($classeListaAtividade->listaAtividadesDesabilitadas($empregadoCeopc->getIdCelula()), TRUE);
    
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
    <form  method="get" action="../controller/cadastrarNovaAtividade.php">
        <fieldset>
            <legend>CADASTRO DE NOVA ROTINA/CONSULTORIA</legend>

            <label>SELECIONE O TIPO DE ATENDIMENTO:
                <select name="tipoGrupoAtendimento" required>
                    <option value="ROTINA">ROTINA</option>
                    <option value="CONSULTORIA">CONSULTORIA</option>
                </select>
            </label><br>
            <label>NOME:
                <input type="text" name="nomeAtividade" required>
            </label><br>
            <label>CÉLULA:
                <input type="text" name="idCelula" value="<?php echo $empregadoCeopc->getIdCelula(); ?>" hidden readonly> <?php echo $empregadoCeopc->getNomeCelula(); ?>
            </label><br>
            <input type="submit" value="ENVIAR">
        </fieldset>
    </form>
    
    <hr>

    <form  method="get" action="../controller/desabilitarAtividade.php">
        <fieldset>
            <legend>REMOVER ATIVIDADE DE ROTINA</legend>

            <label>QUAL ROTINA VOCÊ DESEJA REMOVER:
                <select name='itemListaAtividades' required>; 
                    <option disabled selected value>SELECIONE A ROTINA</option>;
                            <?php 
                            foreach ($listaAtividadeRotina as $linha) 
                            {
                                foreach ($linha as $chave => $valor) 
                                {
                                    switch ($chave) 
                                    {
                                        case 'ID':
                                            $id = '';
                                            $id = $valor;
                                            break;
                                    }
                                    switch ($chave) 
                                    {
                                        case 'NOME_ATIVIDADE':
                                            $nomeAtividade = '';
                                            $nomeAtividade = $valor;
                                            break;
                                    }      
                                }
                            ?>
                    <option value=<?php echo $id; ?>><?php echo $nomeAtividade; ?></option>;
                            <?php
                            }
                            ?>
                </select>
            </label><br>
            <label>CÉLULA:
                <input type="text" name="idCelula" value="<?php echo $empregadoCeopc->getIdCelula(); ?>" hidden readonly> <?php echo $empregadoCeopc->getNomeCelula(); ?>
            </label><br>
            <input type="submit" value="REMOVER">
        </fieldset>
    </form>

    <hr>

    <form  method="get" action="../controller/desabilitarAtividade.php">
        <fieldset>
            <legend>REMOVER ATIVIDADE DE CONSULTORIA</legend>

            <label>QUAL CONSULTORIA VOCÊ DESEJA REMOVER:
                <select name='itemListaAtividades' required>; 
                    <option disabled selected value>SELECIONE A CONSULTORIA</option>;
                            <?php 
                            foreach ($listaAtividadeConsultoria as $linha) 
                            {
                                foreach ($linha as $chave => $valor) 
                                {
                                    switch ($chave) 
                                    {
                                        case 'ID':
                                            $id = '';
                                            $id = $valor;
                                            break;
                                    }
                                    switch ($chave) 
                                    {
                                        case 'NOME_ATIVIDADE':
                                            $nomeAtividade = '';
                                            $nomeAtividade = $valor;
                                            break;
                                    }      
                                }
                            ?>
                    <option value=<?php echo $id; ?>><?php echo $nomeAtividade; ?></option>;
                            <?php
                            }
                            ?>
                </select>
            </label><br>
            <label>CÉLULA:
                <input type="text" name="idCelula" value="<?php echo $empregadoCeopc->getIdCelula(); ?>" hidden readonly> <?php echo $empregadoCeopc->getNomeCelula(); ?>
            </label><br>
            <input type="submit" value="REMOVER">
        </fieldset>
    </form>

    <hr>

    <form  method="get" action="../controller/reativarAtividade.php">
        <fieldset>
            <legend>REATIVAR ROTINA/CONSULTORIA</legend>

            <label>QUAL ATENDIMENTO VOCÊ DESEJA REATIVAR:
                <select name="idAtividade" required>
                    <option disabled selected value>SELECIONE A ATIVIDADE</option>;
                            <?php 
                            foreach ($listaAtividadeDesabilitadas as $linha) 
                            {
                                foreach ($linha as $chave => $valor) 
                                {
                                    switch ($chave) 
                                    {
                                        case 'ID':
                                            $id = '';
                                            $id = $valor;
                                            break;
                                    }
                                    switch ($chave) 
                                    {
                                        case 'NOME_ATIVIDADE':
                                            $nomeAtividade = '';
                                            $nomeAtividade = $valor;
                                            break;
                                    }
                                    switch ($chave) 
                                    {
                                        case 'TIPO_GRUPO_ATENDIMENTO':
                                            $tipoAtendimento = '';
                                            $tipoAtendimento = $valor;
                                            break;
                                    }      
                                }
                            ?>
                    <option value=<?php echo $id; ?>><?php echo $tipoAtendimento  . '/' .  $nomeAtividade; ?></option>;
                            <?php
                            }
                            ?>
                </select>
            </label><br>
            <input type="submit" value="REATIVAR">
        </fieldset>
    </form>

    <hr>

    <form  method="get" action="../controller/editarAtividade.php">
        <fieldset>
            <legend>EDITAR NOME DE ATIVIDADE DE ROTINA</legend>

            <label>QUAL ATIVIDADE VOCÊ DESEJA ALTERAR:
                <select name="idAtividade" required>
                    <option disabled selected value>SELECIONE A ATIVIDADE</option>;
                            <?php 
                            foreach ($listaAtividadeRotina as $linha) 
                            {
                                foreach ($linha as $chave => $valor) 
                                {
                                    switch ($chave) 
                                    {
                                        case 'ID':
                                            $id = '';
                                            $id = $valor;
                                            break;
                                    }
                                    switch ($chave) 
                                    {
                                        case 'NOME_ATIVIDADE':
                                            $nomeAtividade = '';
                                            $nomeAtividade = $valor;
                                            break;
                                    }      
                                }
                            ?>
                    <option value=<?php echo $id; ?>><?php echo $nomeAtividade; ?></option>;
                            <?php
                            }
                            ?>
                </select><br>
                DIGITE O NOVO NOME PARA ATIVIDADE: <input type="text" name="novoNomeAtividade">
            </label><br>
            <input type="submit" value="EDITAR">
        </fieldset>
    </form>

    <hr>

    <form  method="get" action="../controller/editarAtividade.php">
        <fieldset>
            <legend>EDITAR NOME DE ATIVIDADE DE CONSULTORIA</legend>

            <label>QUAL CONSULTORIA VOCÊ DESEJA ALTERAR:
                <select name="idAtividade" required>
                    <option disabled selected value>SELECIONE A CONSULTORIA</option>;
                            <?php 
                            foreach ($listaAtividadeConsultoria as $linha) 
                            {
                                foreach ($linha as $chave => $valor) 
                                {
                                    switch ($chave) 
                                    {
                                        case 'ID':
                                            $id = '';
                                            $id = $valor;
                                            break;
                                    }
                                    switch ($chave) 
                                    {
                                        case 'NOME_ATIVIDADE':
                                            $nomeAtividade = '';
                                            $nomeAtividade = $valor;
                                            break;
                                    }      
                                }
                            ?>
                    <option value=<?php echo $id; ?>><?php echo $nomeAtividade; ?></option>;
                            <?php
                            }
                            ?>
                </select><br>
                DIGITE O NOVO NOME PARA A CONSULTORIA: <input type="text" name="novoNomeAtividade">
            </label><br>
            <input type="submit" value="EDITAR">
        </fieldset>
    </form>
    
</body>
</html>