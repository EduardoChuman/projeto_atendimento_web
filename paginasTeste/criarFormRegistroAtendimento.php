<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);
    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require('../../config_classes_globais.php');
    require_once("../config_atendimento_web.php");

    // CAPTURA OS DADOS DO EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc();
    $empregadoCeopc->setIdCelula(5);

    // TESTES DA CLASSE REGISTRO ATENDIMENTO
    $classeListaAtividade = new ListaAtividades();
    $registroAtendimento = new RegistroAtendimento();

    $registroAtendimento->setTipoAtendimento($_GET['tipoGrupoAtendimento']);

    switch ($registroAtendimento->getTipoAtendimento()) 
    {
        case 'ATIVIDADE':
            $registroAtendimento->setmatriculaCeopc($empregadoCeopc->getMatricula());
            $listaAtividade = json_decode($classeListaAtividade->listaAtividadesRotina($empregadoCeopc->getIdCelula()), TRUE);
                echo "<form action='registrarAtendimento.php' method='post'>
                        <input type='text' name='matriculaCeopc' value='" . $empregadoCeopc->getMatricula() . "' hidden>
                        <input type='text' name='tipoAtendimento' value='" . $registroAtendimento->getTipoAtendimento() . "' hidden>
                        <fieldset>
                            <legend>CADASTRAR UM NOVO ATENDIMENTO</legend><br>
                            <!-- <label>QUAL FOI O CANAL DO ATENDIMENTO:
                                <select name='canalAtendimento' required>
                                    <option value='EMAIL'>E-MAIL</option>
                                    <option value='LYNC'>LYNC</option>
                                    <option value='TELEFONE'>TELEFONE</option>
                                </select><br>
                            </label> -->
                            QUAL FOI O CANAL DO ATENDIMENTO:<br>
                            <label><input type='radio' name='canalAtendimento' value='EMAIL' required>E-MAIL</label><br>
                            <label><input type='radio' name='canalAtendimento' value='LYNC'>LYNC</label><br>
                            <label><input type='radio' name='canalAtendimento' value='TELEFONE'>TELEFONE</label><br>
                            <br>";
                            echo "<select name='itemListaAtividades' required>"; 
                            echo "<option disabled selected value>SELECIONE A ATIVIDADE</option>";
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
                            echo "</select><br><br>";
                            echo "<label>OBSERVAÇÕES SOBRE O ATENDIMENTO:<br>
                                <textarea name='obsevacaoCeopc' cols='60' rows='10' placeholder='Insira suas observações aqui...'></textarea></label><br><br>
                            UNIDADE DEMANDANTE: <input type='text' name='unidadeDemandante' maxlength='4'><br><br>
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
                        MATRICULA DO ATENDIDO: <input type='text' name='matriculaAtendido' maxlength='7'><br><br>
                        <input type='submit' value='REGISTRAR CONSULTORIA'>   
                    </fieldset>
                </form>";
            break;

        default:
            header('location:../index_registro_atendimento.php');
            break;
    }

?>


<a href="../index_registro_atendimento.php">VOLTAR</a>
