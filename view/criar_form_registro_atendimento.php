<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atendimento Middle</title>
    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
    <script>
    $(document).ready(function($){
        $("#matriculaAtendido").focus();
        $('#matriculaAtendido').mask('c999999'); 
    });
    </script>
</head>
<body>
<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../../config_classes_globais.php");
    require_once("../controller/config_atendimento_web.php");

    // INSTANCIA O OBJETO EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc();
    //$empregadoCeopc->setIdCelula(5);  
    
    // FORÇA A CÉLULA MIDDLE OFFICE PARA QUE TENHAMOS DADOS DE ATIVIDADES
    $empregadoCeopc->setIdCelula(5);
    // INSTACIA OS OBJETOS LISTA ATIVIDADE E REGISTRO ATENDIMENTO
    $classeListaAtividade = new ListaAtividade();
    $registroAtendimento = new RegistroAtendimento();

    // RECEBE DADOS VIA GET E ATRIBUI NO OBJETO REGISTRO ATENDIMENTO
    $registroAtendimento->setTipoAtendimento($_GET['tipoGrupoAtendimento']);

    // CRIA O FORMULÁRIO DE ATENDIMENTO CONFORME O DADO TIPO ATENDIMENTO DO OBJETO REGISTRO ATENDIMENTO
    switch ($registroAtendimento->getTipoAtendimento()) 
    {
        case 'ROTINA':
            $registroAtendimento->setmatriculaCeopc($empregadoCeopc->getMatricula());
            $listaAtividade = json_decode($classeListaAtividade->listaAtividadesRotina($empregadoCeopc->getIdCelula()), TRUE);
                echo "<form action='registrarAtendimento.php' method='post'>
                        <input type='text' name='matriculaCeopc' value='" . $empregadoCeopc->getMatricula() . "' hidden>
                        <input type='text' name='tipoAtendimento' value='" . $registroAtendimento->getTipoAtendimento() . "' hidden>
                        <fieldset>
                            <legend>CADASTRAR UMA NOVA ATIVIDADE DE ROTINA</legend><br>
                            <!-- <label>QUAL FOI O CANAL DO ATENDIMENTO:
                                <select name='canalAtendimento' required>
                                    <option value='EMAIL'>E-MAIL</option>
                                    <option value='LYNC'>LYNC</option>
                                    <option value='TELEFONE'>TELEFONE</option>
                                </select><br>
                            </label> -->                            
                            UNIDADE DEMANDANTE: <input type='text' name='unidadeDemandante' maxlength='4' required><br><br>
                            QUAL FOI O CANAL DO ATENDIMENTO:<br>
                            <label><input type='radio' name='canalAtendimento' value='EMAIL' required>E-MAIL</label><br>
                            <label><input type='radio' name='canalAtendimento' value='LYNC'>LYNC</label><br>
                            <label><input type='radio' name='canalAtendimento' value='TELEFONE'>TELEFONE</label><br>
                            <br>";
                            echo "<select name='itemListaAtividades' required>"; 
                            echo "<option disabled selected value>SELECIONE A ROTINA</option>";
                            foreach ($listaAtividade as $linha) 
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
                                echo "<option value='$id'>$nomeAtividade</option>";
                            }
                            echo "</select><br><br>
                            <label>OBSERVAÇÕES SOBRE A REALIZAÇÃO DA ROTINA:<br>
                                <textarea name='observacaoCeopc' cols='60' rows='10' placeholder='Insira suas observações aqui...'></textarea>
                            </label><br><br>
                            <input type='submit' value='REGISTRAR ATENDIMENTO'>
                        </fieldset>
                    </form>";
            break;

        case 'CONSULTORIA':
            $registroAtendimento->setmatriculaCeopc($empregadoCeopc->getMatricula());
            $listaAtividade = json_decode($classeListaAtividade->listaAtividadesConsultoria($empregadoCeopc->getIdCelula()), TRUE);
            echo "<form action='registrarAtendimento.php' method='post'>
                    <input type='text' name='matriculaCeopc' value='" . $empregadoCeopc->getMatricula() . "' hidden>
                    <input type='text' name='tipoAtendimento' value='" . $registroAtendimento->getTipoAtendimento() . "' hidden>
                    <fieldset>
                        <legend>CADASTRAR UMA NOVA CONSULTORIA</legend><br>
                        <!-- <label>QUAL FOI O CANAL DO ATENDIMENTO:
                            <select name='canalAtendimento' required>
                                <option value='EMAIL'>E-MAIL</option>
                                <option value='LYNC'>LYNC</option>
                                <option value='TELEFONE'>TELEFONE</option>
                            </select><br>
                        </label> -->
                        <label>MATRICULA DO ATENDIDO: <input name='matriculaAtendido' tabindex='1' id='matriculaAtendido' maxlength='7'  pattern='(^[C,c])?(\d{6})' required></label><br><br>
                        QUAL FOI O CANAL DO ATENDIMENTO:<br>
                        <label><input type='radio' name='canalAtendimento' value='EMAIL' required>E-MAIL</label><br>
                        <label><input type='radio' name='canalAtendimento' value='LYNC'>LYNC</label><br>
                        <label><input type='radio' name='canalAtendimento' value='TELEFONE'>TELEFONE</label><br>
                        <br>";
                        echo "<select name='itemListaAtividades' required>"; 
                        echo "<option disabled selected value>SELECIONE A CONSULTORIA</option>";
                        foreach ($listaAtividade as $linha) 
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
                            echo "<option value=\"$id\">$nomeAtividade</option>";
                        }
                        echo "</select><br><br>";
                        echo "<label>OBSERVAÇÕES SOBRE A CONSULTORIA:<br>
                            <textarea name='observacaoCeopc' cols='60' rows='10' placeholder='Insira suas observações aqui...'></textarea>
                        </label><br><br>
                        <input type='submit' value='REGISTRAR CONSULTORIA'>   
                    </fieldset>
                </form>";
            break;

        default:
            header('location:../registro_atendimento.php');
            break;
    }
?>

    <a href="registro_atendimento.php">VOLTAR</a>

</body>
</html>
