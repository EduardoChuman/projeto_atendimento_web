<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Atendimento Middle</title>
    <link rel="stylesheet" href="css/formulario1.css">
    <!-- jQuery 2.2.3 -->
    <script src="../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
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
    require_once("../controller/configAtendimentoWeb.php");

    // INSTANCIA O OBJETO EMPREGADO CEOPC
    $empregadoCeopc = new EmpregadoCeopc();
    
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
                echo "<form action='../controller/registrarAtendimento.php' method='post'>
                        <input type='text' name='matriculaCeopc' value='" . $empregadoCeopc->getMatricula() . "' hidden>
                        <input type='text' name='tipoAtendimento' value='" . $registroAtendimento->getTipoAtendimento() . "' hidden>
                        <h3 class='titulo-header-cinza'> Formulário Atendimento <br> Middle Office</h3>
                        <fieldset>
                            <legend>CADASTRAR UMA NOVA ATIVIDADE DE ROTINA</legend><br>                          
                            UNIDADE DEMANDANTE: <input type='text' name='unidadeDemandante' maxlength='4' required><br><br>
                            QUAL FOI O CANAL DO ATENDIMENTO:<br>
                            <label><input type='radio' name='canalAtendimento' value='EMAIL' required>E-MAIL</label><br>
                            <label><input type='radio' name='canalAtendimento' value='LYNC'>LYNC</label><br>
                            <label><input type='radio' name='canalAtendimento' value='TELEFONE'>TELEFONE</label><br>
                            <br>";
                            echo "<select id='atividadesRotinaMiddle' name='itemListaAtividades' required>"; 
                            echo "<option disabled selected value>Carregando...</option>";
                            // foreach ($listaAtividade as $linha) 
                            // {
                            //     foreach ($linha as $chave => $valor) 
                            //     {
                            //         switch ($chave) 
                            //         {
                            //             case 'ID':
                            //                 $id = '';
                            //                 $id = $valor;
                            //                 break;
                            //         }
                            //         switch ($chave) 
                            //         {
                            //             case 'NOME_ATIVIDADE':
                            //                 $nomeAtividade = '';
                            //                 $nomeAtividade = $valor;
                            //                 break;
                            //         }      
                            //     }
                            //     echo "<option value='$id'>$nomeAtividade</option>";
                            // }
                            echo "</select><br><br>
                            <label>OBSERVAÇÕES SOBRE A REALIZAÇÃO DA ROTINA:<br>
                                <textarea name='observacaoCeopc' cols='60' rows='5' placeholder='Insira suas observações aqui...'></textarea>
                            </label><br>
                            <input class='botao' type='submit' value='REGISTRAR ATENDIMENTO'>
                        </fieldset>
                    </form><br>
                    <a href='registro_atendimento.html'>
                        <button class='botao'>VOLTAR</button>
                    </a>
                    <div id='rodape'>
                        <img src='images/rodape2.png'/>
                        <div>
                            <label><span class='logo'>caixa</span> <span class='logo2'>corporativo</span></label>
                        </div>
                    </div> 
                    <br>
                    ";
            break;

        case 'CONSULTORIA':
            $registroAtendimento->setmatriculaCeopc($empregadoCeopc->getMatricula());
            $listaAtividade = json_decode($classeListaAtividade->listaAtividadesConsultoria($empregadoCeopc->getIdCelula()), TRUE);
            echo "<form action='../controller/registrarAtendimento.php' method='post'>
                    <input type='text' name='matriculaCeopc' value='" . $empregadoCeopc->getMatricula() . "' hidden>
                    <input type='text' name='tipoAtendimento' value='" . $registroAtendimento->getTipoAtendimento() . "' hidden>
                    <h3 class='titulo-header-cinza'> Formulário Atendimento <br> Middle Office</h3>
                    <fieldset>
                        <legend>CADASTRAR UMA NOVA CONSULTORIA</legend><br>
                        <label>MATRICULA DO ATENDIDO: <input name='matriculaAtendido' tabindex='1' id='matriculaAtendido' maxlength='7'  pattern='(^[C,c])?(\d{6})' required></label><br><br>
                        QUAL FOI O CANAL DO ATENDIMENTO:<br>
                        <label><input type='radio' name='canalAtendimento' value='EMAIL' required>E-MAIL</label><br>
                        <label><input type='radio' name='canalAtendimento' value='LYNC'>LYNC</label><br>
                        <label><input type='radio' name='canalAtendimento' value='TELEFONE'>TELEFONE</label><br>
                        <br>";
                        echo "<select id='atividadesConsultoriaMiddle'name='itemListaAtividades' required>"; 
                        echo "<option disabled selected value>SELECIONE A CONSULTORIA</option>";
                        // foreach ($listaAtividade as $linha) 
                        // {
                        //     foreach ($linha as $chave => $valor) 
                        //     {
                        //         switch ($chave) 
                        //         {
                        //             case 'ID':
                        //                 $id = '';
                        //                 $id = $valor;
                        //                 break;
                        //         }
                        //         switch ($chave) 
                        //         {
                        //             case 'NOME_ATIVIDADE':
                        //                 $nomeAtividade = '';
                        //                 $nomeAtividade = $valor;
                        //                 break;
                        //         }      
                        //     }
                        //     echo "<option value=\"$id\">$nomeAtividade</option>";
                        // }
                        echo "</select><br><br>";
                        echo "<label>OBSERVAÇÕES SOBRE A CONSULTORIA:<br>
                            <textarea name='observacaoCeopc' cols='60' rows='5' placeholder='Insira suas observações aqui...'></textarea>
                        </label><br>
                        <input class='botao' type='submit' value='REGISTRAR CONSULTORIA'>   
                    </fieldset>
                </form><br>
                <a href='registro_atendimento.html'>
                    <button class='botao'>VOLTAR</button>
                </a>
                <div id='rodape'>
                    <img src='images/rodape2.png'/> 
        
                    <div>
                    <label><span class='logo'>caixa</span> <span class='logo2'>corporativo</span></label>
                    </div>

                </div>    
                ";
            break;
        default:
            header('location:registro_atendimento.html');
            break;
    }
?>
   <script src="js/listasAtividades.js"></script>
</body>
</html>
