<?php

    // VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
    ini_set('display_errors',1);

    // CHAMA OS ARQUIVOS DE VERIFICAÇÃO DE EXISTÊNCIA DAS CLASSES
    require_once("../../config_classes_globais.php");
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
    <link rel="stylesheet" href="css/responde_pesquisa.css">

    <title>Avaliação Atendimento CEOPC</title>
</head>
<body style='Margin:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:100%;background-color:#f3f2f0;'>
    <br>
    <center class='wrapper' style='width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#f3f2f0;'>
        <table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#f3f2f0;' bgcolor='#f3f2f0;'>
            <tr>
                <td width='100%'>
                    <div class='webkit' style='max-width:800px;Margin:0 auto;'>           
                    <!-- ======= start main body ======= -->
                        <table class='outer' align='center' cellpadding='0' cellspacing='0' border='0' style='border-spacing:0;Margin:0 auto;width:100%;max-width:875px;'>
                            <tr>
                                <td style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;'>
                                <!-- ======= start header ======= -->                
                                    <table border='0' width='100%' cellpadding='0' cellspacing='0'  >
                                        <tr>
                                            <td>
                                                <table style='width:100%;' cellpadding='0' cellspacing='0' border='0'>
                                                    <tbody>
                                                        <tr>
                                                            <td align='center'>
                                                                <center>
                                                                    <table border='0' align='center' width='100%' cellpadding='0' cellspacing='0' style='Margin: 0 auto;'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class='one-column' style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;' bgcolor='#FFFFFF'>
                                                                                <!-- ======= start header ======= -->            
                                                                                    <table cellpadding='0' cellspacing='0' border='0' width='100%'  bgcolor='#f3f2f0'>
                                                                                        <tr>
                                                                                            <td class='two-column' style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;'>
                                                                                                <div class='column' style='width:100%;max-width:220px;display:inline-block;vertical-align:top;'>
                                                                                                    <table class='contents' style='border-spacing:0; width:100%'>
                                                                                                        <tr>
                                                                                                            <td style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0px;' align='left'>
                                                                                                                <a href='http://intranet.caixa/Paginas/HomeIntranet.aspx' target='_blank'>
                                                                                                                    <img src='http://www.geopc.mz.caixa/esteiracomex/data/images/caixa.gif' alt='' width='10%' height='10%' style='border-width:0; max-width:200px;height:aut; display:block' align='left'/>
                                                                                                                </a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </div>                                              
                                                                                                <div class='column' style='width:100%;max-width:515px;display:inline-block;vertical-align:top;'>
                                                                                                    <table width='100%' style='border-spacing:0'>
                                                                                                        <tr>
                                                                                                            <td class='inner' style='padding-top:20px;padding-bottom:10px; padding-right:0px;padding-left:10px;'>
                                                                                                                
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>&nbsp;</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- ======= end header ======= --> 
                                    <!-- ======= start hero article ======= -->
                                    <table class='one-column' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-spacing:0; border-left:1px solid #e8e7e5; border-right:1px solid #e8e7e5; border-bottom:5px solid #e8e7e5' bgcolor='#FFFFFF'>
                                        <tr>
                                            <td id="imagemFundoForm">
                                                <div>
                                                    <p style='color:#262626; font-size:26px; text-align:center; font-family: Verdana, Geneva, sans-serif'>Pesquisa CEOPC</p>
                                                    <h3 style='color:#000000; font-size:16px; text-align:center; font-family: Verdana, Geneva, sans-serif; line-height:22px'>INFORMAMOS QUE SEU FEEDBACK É TOTALMENTE ANÔNIMO</h3> 
                                                    <p style='color:#000000; font-size:16px; text-align:center; font-family: Verdana, Geneva, sans-serif; line-height:22px'>Como você avalia o atendimento recebido em <?php echo date("d/m/Y", strtotime($atendimento->getRecuperarDataAtendimento()));?>, via <?php echo $atendimento->getCanalAtendimento(); ?>, pelo(a) empregado(a) do Middle Office COMEX – CEOPC07: <?php echo $empregadoCeopc->getNome() . "(" . $atendimento->getMatriculaCeopc() . ")"; ?> em relação aos seguintes aspectos: </p>
                                                    <form action="capturaNotas.php" method="post" name="formAvaliaMiddle">
                                                        
                                                        <input type="radio" name="notaCordialidade" id="cordialidade-null" value disabled required hidden/>
                                                        <input type="radio" name="notaCordialidade" id="cordialidade-1" value="1" required hidden/>
                                                        <input type="radio" name="notaCordialidade" id="cordialidade-2" value="2" required hidden/>
                                                        <input type="radio" name="notaCordialidade" id="cordialidade-3" value="3" required hidden/>
                                                        <input type="radio" name="notaCordialidade" id="cordialidade-4" value="4" required hidden/>
                                                        <input type="radio" name="notaCordialidade" id="cordialidade-5" value="5" required hidden/>

                                                        <fieldset><legend>Cordialidade</legend>
                                                            <label for="cordialidade-1">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="cordialidade-2">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="cordialidade-3">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="cordialidade-4">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="cordialidade-5">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <!-- <label for="cordialidade-null">
                                                                Clear
                                                            </label> -->
                                                        </fieldset>
                                                        <input type="radio" name="notaDominio" id="dominio-null" value disabled required hidden/>
                                                        <input type="radio" name="notaDominio" id="dominio-1" value="1" hidden/>
                                                        <input type="radio" name="notaDominio" id="dominio-2" value="2" hidden/>
                                                        <input type="radio" name="notaDominio" id="dominio-3" value="3" hidden/>
                                                        <input type="radio" name="notaDominio" id="dominio-4" value="4" hidden/>
                                                        <input type="radio" name="notaDominio" id="dominio-5" value="5" hidden/>

                                                        <fieldset><legend>Domínio</legend>
                                                            <label for="dominio-1">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="dominio-2">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="dominio-3">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="dominio-4">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="dominio-5">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <!-- <label for="dominio-null">
                                                                Clear
                                                            </label> -->
                                                        </fieldset>
                                                        <input type="radio" name="notaTempestividade" id="tespestividade-null" value disabled required hidden/>
                                                        <input type="radio" name="notaTempestividade" id="tespestividade-1" value="1" hidden/>
                                                        <input type="radio" name="notaTempestividade" id="tespestividade-2" value="2" hidden/>
                                                        <input type="radio" name="notaTempestividade" id="tespestividade-3" value="3" hidden/>
                                                        <input type="radio" name="notaTempestividade" id="tespestividade-4" value="4" hidden/>
                                                        <input type="radio" name="notaTempestividade" id="tespestividade-5" value="5" hidden/>

                                                        <fieldset><legend>Tespestividade</legend>
                                                            <label for="tespestividade-1">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="tespestividade-2">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="tespestividade-3">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="tespestividade-4">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <label for="tespestividade-5">
                                                                <svg width="255" height="240" viewBox="0 0 51 48">
                                                                    <path d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                                                                </svg>
                                                            </label>
                                                            <!-- <label for="tespestividade-null">
                                                                Clear
                                                            </label> -->
                                                        </fieldset>

                                                        <span>Quer inserir alguma observação sobre o atendimento prestado?<br>
                                                            <textarea name='feedbackAtendido' placeholder='Insira suas observações aqui...'></textarea>
                                                        </span><br>
                                                        <input type="hidden" name="idAtendimento" value="<?php echo $atendimento->getIdAtendimento() ?>">
                                                        <span>Sua dúvida foi atendida?
                                                            <input type="radio" name="consultoriaAtendida" value="1" required>SIM
                                                            <input type="radio" name="consultoriaAtendida" value="0">NÃO
                                                        </span><br>
                                                        <input type="submit" value="AVALIAR"><br><br>
                                                        <span style='color:#262626; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif'>Críticas/Elogios/Sugestões gerais, <a href="https://atender.caixa/siouv/" target="_blank">Atender.Caixa</a>.</span>
                                                        
                                                    </form>
                                                    <!-- END BUTTON -->
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- ======= end hero article ======= -->
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>