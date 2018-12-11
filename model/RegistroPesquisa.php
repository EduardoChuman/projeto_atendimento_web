<?php	
// VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
ini_set('display_errors',1);

// CARREGA AS BIBLIOTECAS DO PHP MAILER
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

// CRIAÇÃO DA CLASSE
class RegistroPesquisa
{
  // DEFINIÇÃO DOS ATRIBUTOS
  private $idPesquisa;
  private $dataEnvio;
  private $idRegistroAtendimento;
  private $dataResposta;
  private $notaCordialidade;
  private $notaDominio;
  private $notaTempestividade;
  private $feedbackAtendido;
  private $consultoriaAtendida;

  // MÉTODOS

  // GETTERS E SETTERS DOS ATRIBUTOS

  // $idPesquisa
  public function getIdPesquisa()
  {
    return $this->idPesquisa;
  }
  public function setIdPesquisa($value)
  {
    $this->idPesquisa = $value;
  }

  // $dataEnvio
  public function getDataEnvio()
  {
    return $this->dataEnvio;
  }
  public function setDataEnvio($value)
  {
    $this->dataEnvio = $value;
  }

  // $idRegistroAtendimento
  public function getIdRegistroAtendimento()
  {
    return $this->idRegistroAtendimento;
  }
  public function setIdRegistroAtendimento($value)
  {
    $this->idRegistroAtendimento = $value;
  }

  // $dataResposta
  public function getDataResposta()
  {
    return $this->dataResposta;
  }
  public function setDataResposta()
  {
    $this->dataResposta = date("Y-m-d H:i:s", time());
  }

  // $notaCordialidade
  public function getNotaCordialidade()
  {
    return $this->notaCordialidade;
  }
  public function setNotaCordialidade($value)
  {
    $this->notaCordialidade = $value;
  }

  // $notaDominio
  public function getNotaDominio()
  {
    return $this->notaDominio;
  }
  public function setNotaDominio($value)
  {
    $this->notaDominio = $value;
  }

  // $notaTempestividade
  public function getNotaTempestividade()
  {
    return $this->notaTempestividade;
  }
  public function setNotaTempestividade($value)
  {
    $this->notaTempestividade = $value;
  }

  // $feedbackAtendido
  public function getFeedbackAtendido()
  {
    return $this->feedbackAtendido;
  }
  public function setFeedbackAtendido($value)
  {
    if ($value != "") 
    {
      $this->feedbackAtendido = $value;
    }
    else
    {
      $this->feedbackAtendido = null;
    }
  }
  // $consultoriaAtendida;
  public function getConsultoriaAtendida()
  {
    return $this->consultoriaAtendida;
  }
  public function setConsultoriaAtendida($value)
  {
    $this->consultoriaAtendida = $value;
  }

  // MÉTODO DE INSERT NA TABELA REGISTRO PESQUISA E ENVIO DA PESQUISA VIA PHP MAILER
  public function cadastrarEnvioPesquisa
  (
    $dataEnvio
    ,$idRegistroAtendimento
    ,$matriculaAtendido
    ,$matriculaCeopc
    ,$canalAtendimento
    ,$nomeAtividade
  )
  {
    $this->setDataEnvio($dataEnvio);
    $this->setIdRegistroAtendimento($idRegistroAtendimento);

    $sql3 = new Sql();

    $sql3->select
    (
        "INSERT INTO [dbo].[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS]
            (
                [DATA_ENVIO]
                ,[ID_REGISTRO_ATENDIMENTO]
            )
        VALUES
            (
                :DATA_ENVIO
                ,:ID_REGISTRO_ATENDIMENTO
            )"
        , array
        (
            ':DATA_ENVIO'=>$this->getDataEnvio()
            ,':ID_REGISTRO_ATENDIMENTO'=>$this->getIdRegistroAtendimento()
        )
    );

    // INICIA A CRIAÇÃO DO E-MAIL PARA ENVIO
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    $mail->CharSet = 'UTF-8';
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'sistemas.correiolivre.caixa';            // Specify main and backup SMTP servers
    $mail->SMTPAuth = false;                               // Enable SMTP authentication
                    
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('ceopc08@caixa.gov.br', 'CAIXA - ROTINAS AUTOMATICAS');

    // DEFINE O DESTINATÁRIO
    // E-MAIL VAI PARA O ASSISTENTE QUE CADASTROU A DEMANDA
    // $mail->addAddress($matriculaCeopc . '@mail.caixa');
    // E-MAIL VAI PARA O DESTINATÁRIO DA AGÊNCIA
    $mail->addAddress($matriculaAtendido . '@mail.caixa');

    // DEFINE AS CÓPIAS OCULTAS
    $mail->addBCC('c079436@mail.caixa');
    $mail->addBCC('c111710@mail.caixa');
    // $mail->addBCC('CEOPC08@mail.caixa');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '#CONFIDENCIAL10 - Pesquisa de Satisfação - Atendimento COMEX';

    $mail->Body = 
        "
        <!DOCTYPE html>
        <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <meta http-equiv='X-UA-Compatible' content='ie=edge'>
          <style type='text/css'>
            * {
              -webkit-font-smoothing: antialiased;
            }
            body {
              Margin: 0;
              padding: 0;
              width: 80%;
              font-family: Arial, sans-serif;
              -webkit-font-smoothing: antialiased;
              mso-line-height-rule: exactly;
            }
            table {
              border-spacing: 0;
              color: #333333;
              font-family: Arial, sans-serif;
            }
            img {
              border: 0;
            }
            .wrapper {
              width: 100%;
              table-layout: fixed;
              -webkit-text-size-adjust: 100%;
              -ms-text-size-adjust: 100%;
            }
            .webkit {
              max-width: 800px;
            }
            .outer {
              Margin: 0 auto;
              width: 100%;
              max-width: 800px;
            }
            .full-width-image img {
              width: 100%;
              max-width: 800px;
              height: auto;
            }
            .inner {
              padding: 10px;
            }
            p {
              Margin: 0;
              padding-bottom: 10px;
            }
            .h1 {
              font-size: 21px;
              font-weight: bold;
              Margin-top: 15px;
              Margin-bottom: 5px;
              font-family: Arial, sans-serif;
              -webkit-font-smoothing: antialiased;
            }
            .h2 {
              font-size: 18px;
              font-weight: bold;
              Margin-top: 10px;
              Margin-bottom: 5px;
              font-family: Arial, sans-serif;
              -webkit-font-smoothing: antialiased;
            }
            .one-column .contents {
              text-align: left;
              font-family: Arial, sans-serif;
              -webkit-font-smoothing: antialiased;
            }
            .one-column p {
              font-size: 14px;
              Margin-bottom: 10px;
              font-family: Arial, sans-serif;
              -webkit-font-smoothing: antialiased;
            }
            .two-column {
              text-align: center;
              font-size: 0;
            }
            .two-column .column {
              width: 100%;
              max-width: 400px;
              display: inline-block;
              vertical-align: top;
            }
            .contents {
              width: 100%;
            }
            .two-column .contents {
              font-size: 14px;
              text-align: left;
            }
            .two-column img {
              width: 100%;
              max-width: 280px;
              height: auto;
            }
            .two-column .text {
              padding-top: 10px;
            }
            .three-column {
              text-align: center;
              font-size: 0;
              padding-top: 10px;
              padding-bottom: 10px;
            }
            .three-column .column {
              width: 100%;
              max-width: 200px;
              display: inline-block;
              vertical-align: top;
            }
            .three-column .contents {
              font-size: 14px;
              text-align: center;
            }
            .three-column img {
              width: 100%;
              max-width: 180px;
              height: auto;
            }
            .three-column .text {
              padding-top: 10px;
            }
            .img-align-vertical img {
              display: inline-block;
              vertical-align: middle;
            }
            @media only screen and (max-device-width: 480px) {
            table[class=hide], img[class=hide], td[class=hide] {
              display: none !important;
            }
            .contents1 {
              width: 100%;
            }
            .contents1 {
              width: 100%;
            }
            .contents1 {
              width: 100%;
            }

          </style>
        </head>

        <body style='Margin:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:100%;background-color:#f3f2f0;'>
          <center class='wrapper' style='width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#f3f2f0;'>
            <table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#f3f2f0;' bgcolor='#f3f2f0;'>
              <tr>
                <td width='100%'><div class='webkit' style='max-width:800px;Margin:0 auto;'>             
                    <!-- ======= start main body ======= -->
                    <table class='outer' align='center' cellpadding='0' cellspacing='0' border='0' style='border-spacing:0;Margin:0 auto;width:100%;max-width:800px;'>
                      <tr>
                        <td style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;'><!-- ======= start header ======= -->
                          <table border='0' width='100%' cellpadding='0' cellspacing='0'  >
                            <tr>
                              <td>
                                <table style='width:100%;' cellpadding='0' cellspacing='0' border='0'>
                                  <tbody>
                                    <tr>
                                      <td align='center'><center>
                                        <table border='0' align='center' width='100%' cellpadding='0' cellspacing='0' style='Margin: 0 auto;'>
                                          <tbody>
                                            <tr>
                                              <td class='one-column' style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;' bgcolor='#FFFFFF'><!-- ======= start header ======= -->
                                                <table cellpadding='0' cellspacing='0' border='0' width='100%'  bgcolor='#f3f2f0'>
                                                  <tr>
                                                    <td class='three-column' style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;' >                                 
                                                      <div class='column' style='width:50%;max-width:220px;display:inline-block;vertical-align:top;'>
                                                        <table class='contents' style='border-spacing:0; width:100%'>
                                                          <tr>
                                                            <td style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0px;' align='left'>
                                                              <a href='#' target='_blank'>
                                                                <img src='http://www.geopc.mz.caixa/esteiracomex/data/images/caixa.gif' alt='' width='180' height='29' style='border-width:0; max-width:60px;height:aut; display:block' align='left'/>
                                                              </a>
                                                            </td>
                                                            <td class='inner' style='padding-top:20px;padding-bottom:10px; padding-right:0px;padding-left:10px;'>
                                                                <table class='contents' style='border-spacing:0; width:100%'>
                                                                  <tr>
                                                                    <td width='10%' align='right' valign='top'>
                                                                      <img src='http://www.geopc.mz.caixa/esteiracomex/data/images/eye.jpg' width='25' height='9' style='border-width:0; max-width:25px; height:auto; max-height:9px; padding-top:4px; padding-left:10px' alt='' align='right'/>
                                                                    </td>
                                                                    <td width='40%' align='left' valign='top'>
                                                                      <font style='font-size:11px; text-decoration:none; color:#474b53; font-family: Verdana, Geneva, sans-serif; text-align:left; line-height:16px; padding-bottom:30px'>
                                                                        <a href='http://www.ceopc.sp.caixa/middleoffice/' target='_blank' style='color:#474b53; text-decoration:none'>Saiba mais sobre n&oacute;s...</a>
                                                                      </font>
                                                                    </td>
                                                                  </tr>
                                                              </table>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </div>                                                
                                                      <div class='column' style='width:100%;max-width:515px;display:inline-block;vertical-align:top;'>
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
                          
                        <table class='one-column' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-spacing:0; border-left:1px solid #e8e7e5; border-right:1px solid #e8e7e5; border-bottom:1px solid #e8e7e5' bgcolor='#FFFFFF'>
                          <tr>
                           <td background='http://www.geopc.mz.caixa/esteiracomex/data/images/img04.jpg' bgcolor='#ffffff' width='800' height='200' valign='top' align='left' style='padding:40px 40px 40px 40px'>
                              <div>
                                <p style='color:#262626; font-size:32px; text-align:center; font-family: Verdana, Geneva, sans-serif'>Pesquisa CEOPC</p>
                                <p style='color:#000000; font-size:16px; text-align:center; font-family: Verdana, Geneva, sans-serif; line-height:22px'>Com objetivo de aprimorarmos <br /> o atendimento prestado pela CEOPC  solicitamos sua participa&ccedil;&atilde;o na pesquisa abaixo: </p>
                                <!-- START BUTTON -->
                                <center>
                                  <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                                    <tr>
                                      <td>
                                        <table border='0' cellpadding='0' cellspacing='0'>
                                          <tr>
                                            <td height='20' width='100%' style='font-size: 20px; line-height: 20px;'>&nbsp;</td>
                                          </tr>
                                        </table>
                                        <table border='0' align='center' cellpadding='0' cellspacing='0' style='Margin:0 auto;'>
                                          <tbody>
                                            <tr>
                                              <td align='center'>
                                                <table border='0' cellpadding='0' cellspacing='0' style='Margin:0 auto;'>
                                                  <tr>
                                                    <td width='250' height='60' align='center' bgcolor='#1f3ca6' style='-moz-border-radius: 30px; -webkit-border-radius: 30px; border-radius: 30px;'>
                                                      <a href='http://www.ceopc.hom.sp.caixa/atendimento_web/view/responde_pesquisa.php?idAtendimento=" . $idRegistroAtendimento . "&matriculaAtendido=" . $matriculaAtendido . "' style='width:250; display:block; text-decoration:none; border:0; text-align:center; font-weight:bold;font-size:18px; font-family: Arial, sans-serif; color: #ffffff' class='button_link'>Responda aqui</a>
                                                    </td>
                                                  </tr>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </table>
                                </center>
                              </div>
                            </td>
                          </tr>
                        </table>

                        <!-- ======= end hero article ======= --> 
                        
                
                        <!-- ======= start two column ======= -->
                        
                        <table cellpadding='0' cellspacing='0' border='0' width='100%' bgcolor='#FFFFFF'  style=' border-left:1px solid #e8e7e5; border-right:1px solid #e8e7e5'>
                          <tr>
                            <td class='two-column' style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;'>                        
                              <div class='column' style='width:100%;max-width:399px;display:inline-block;vertical-align:top;'>
                                <table class='contents' style='border-spacing:0; width:100%' bgcolor='#FFFFFF'>
                                  <tr>
                                    <td class='inner' style='padding-top:0px;padding-bottom:10px; padding-right:20px;padding-left:30px;'>
                                      <table class='contents1' style='border-spacing:0; width:100%'>
                                        <tr>
                                          <td   align='center' valign='middle' style='padding-top:20px; padding-right:30px'>
                                            <p style='font-size:30px; text-decoration:none; color:#262626; font-family: Verdana, Geneva, sans-serif; text-align:left'><strong>O Middle Office</strong></p>
                                            <p style='font-size:14px; text-decoration:none; color:#3a3d41; font-family: Verdana, Geneva, sans-serif; text-align:left; line-height:22px'>
                                              <br />Principais Atividades:  
                                              <br />- Apoio t&eacute;cnico a Rede.  
                                              <br />- Suporte &agrave; Rede de Atendimento e demais &aacute;reas envolvidas na gest&atilde;o da carteira.
                                              <br />  
                                              <br />
                                              <a href='http://www.ceopc.sp.caixa/middleoffice/' target='_blank' style='color:#1f3ca6; text-decoration:none'><strong>Saiba mais</strong></a>
                                            </p>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </div>                    
                              <div class='column' style='width:100%;max-width:399px;display:inline-block;vertical-align:top;'>
                                <table width='100%' style='border-spacing:0'>
                                  <tr>
                                    <td class='inner' style='padding-top:0px;padding-bottom:10px; padding-right:10px;padding-left:10px;'>
                                      <img src='http://www.geopc.mz.caixa/esteiracomex/data/images/img02.jpg' width='309' alt='' style='border-width:0;width:100%; height:auto;' />
                                    </td>
                                  </tr>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </table>
                        
                        <!-- ======= end two column ======= --> 
                        
                        <!-- ======= start footer ======= -->
                        
                        <table cellpadding='0' cellspacing='0' border='0' width='100%'>
                          <tr>
                            <td height='30'>&nbsp;</td>
                          </tr>
                          <tr>
                            <td class='two-column' style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;'>                        
                              <div class='column' style='width:100%;max-width:399px;display:inline-block;vertical-align:top;'>
                                <table class='contents' style='border-spacing:0; width:100%'>
                                  <tr>
                                    <td width='61%' align='left' valign='middle' style='padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;'><p style='color:#787777; font-size:13px; text-align:left; font-family: Verdana, Geneva, sans-serif'> &nbsp  Equipe de TI & COMEX<br />                                 
                                  </tr>
                                </table>
                              </div>                        
                              <div class='column' style='width:100%;max-width:399px;display:inline-block;vertical-align:top;'>
                                <table width='100%' style='border-spacing:0'>
                                  <tr>
                                    <td class='inner' style='padding-top:0px;padding-bottom:10px; padding-right:10px;padding-left:10px;'><table class='contents' style='border-spacing:0; width:100%'>
                                        <tr>
                                          <td width='32%' align='center' valign='top' style='padding-top:10px'><table width='150' border='0' cellspacing='0' cellpadding='0'>
                                              <tr>
                                                
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </table>
                        <!-- ======= end footer ======= -->
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
                    
                    ";

    // "
    // <head>
    //     <meta charset=\"UTF-8\">
    //     <style>
    //         body{
    //             font-family: arial,verdana,sans serif;
    //         }

    //         .head_msg{
    //             font-weight: bold;
    //             text-align: center;
    //         }

    //         .gray{
    //             color: #808080;
    //         }
    //     </style>
    // </head>
    // <body style=\"font-family: arial;\">
    //     <h3 class=\"head_msg gray\">TESTE DE ENVIO.</h3>
    //     <p>Data do Atendimento: " . $dataEnvio . ".</p>
    //     <p>Protocolo Atendimento: " . $idRegistroAtendimento . ".</p>
    //     <p>Matricula Atendido: " . $matriculaAtendido . ".</p>
    //     <p>Matricula CEOPC: " . $matriculaCeopc . ".</p>
    //     <p>Tipo Atendimento: CONSULTORIA.</p>
    //     <p>Canal de Atendimento: " . $canalAtendimento . ".</p>
    //     <p>Nome Atividade: " . $nomeAtividade . ".</p><br><br>
    //     <p>Para responder a pesquisa, <a href='http://www.ceopc.hom.sp.caixa/atendimento_web/responde_pesquisa.php?idAtendimento=" . $idRegistroAtendimento . "&matriculaAtendido=" . $matriculaAtendido . "'>clique aqui</a>.</p>
    //  </body>";

    $mail->send();
  }

  // MÉTODO PARA DAR O UPDATE DA RESPOSTA DA PESQUISA
  public function registrarRespostaPesquisa()
  {
    $sql = new Sql();

    try 
    {
      $sql->query
      (
        "UPDATE [dbo].[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS]
        SET 
          [DATA_RESPOSTA] = :DATA_RESPOSTA
          ,[NOTA_CORDIALIDADE] = :NOTA_CORDIALIDADE
          ,[NOTA_DOMINIO] = :NOTA_DOMINIO
          ,[NOTA_TEMPESTIVIDADE] = :NOTA_TEMPESTIVIDADE
          ,[CONSULTORIA_ATENDIDA] = :CONSULTORIA_ATENDIDA
          ,[FEEDBACK_ATENDIDO] = :FEEDBACK_ATENDIDO
        WHERE 
          [ID_REGISTRO_ATENDIMENTO] = :ID_REGISTRO_ATENDIMENTO"
        , array
        (
          ':ID_REGISTRO_ATENDIMENTO'=>$this->getIdRegistroAtendimento()
          ,':DATA_RESPOSTA'=>$this->getDataResposta()
          ,':NOTA_CORDIALIDADE'=>$this->getNotaCordialidade()
          ,':NOTA_DOMINIO'=>$this->getNotaDominio()
          ,':NOTA_TEMPESTIVIDADE'=>$this->getNotaTempestividade()
          ,':CONSULTORIA_ATENDIDA'=>$this->getConsultoriaAtendida()
          ,':FEEDBACK_ATENDIDO'=>$this->getFeedbackAtendido()
        )
      );
    } 
    catch (Exception $e) 
    {
      // EM CASO DE ERRO, RETORNA O TIPO VIA JSON NA TELA
      echo json_encode
      (
        array
        (
            "message"=>$e->getMessage(),
            "line"=>$e->getLine(),
            "file"=>$e->getFile(),
            "code"=>$e->getCode()
        )
      );
    }
  }
}

?>