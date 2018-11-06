<?php	
// VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
ini_set('display_errors',1);

// CRIAÇÃO DA CLASSE
class registroPesquisas 
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
    public function setDataResposta($value)
    {
        $this->dataResposta = $value;
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
        $this->feedbackAtendido = $value;
    }

    // MÉTODO DE INSERT E ENVIO DA PESQUISA
    public function cadastrarEnvioPesquisa($dataEnvio, $idRegistroAtendimento, $matriculaAtendido, $matriculaCeopc, $canalAtendimento, $nomeAtividade)
    {
        $this->setDataEnvio($dataEnvio);
        $this->setIdRegistroAtendimento($idRegistroAtendimento);

        $sql = new Sql();

        $sql->select("INSERT INTO [dbo].[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS]
                        (
                            [DATA_ENVIO]
                            ,[ID_REGISTRO_ATENDIMENTO]
                            ,[DATA_RESPOSTA]
                            ,[NOTA_CORDIALIDADE]
                            ,[NOTA_DOMINIO]
                            ,[NOTA_TEMPESTIVIDADE]
                            ,[FEEDBACK_ATENDIDO]
                        )
                    VALUES
                        (
                            :DATA_ENVIO
                            ,:ID_REGISTRO_ATENDIMENTO
                        )", array(
                            ':DATA_ENVIO'=>$this->getDataEnvio()
                            ,':ID_REGISTRO_ATENDIMENTO'=>$this->getIdRegistroAtendimento()
                        ));

        // ENVIO DA PESQUISA
        require_once ("../../PHPMailer/src/Exception.php");
        require_once ("../../PHPMailer/src/PHPMailer.php");
        require_once ("../../PHPMailer/src/SMTP.php");

        // INICIA A CRIAÇÃO DO E-MAIL PARA ENVIO
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

        $mail->CharSet = 'UTF-8';
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'sistemas.correiolivre.caixa';            // Specify main and backup SMTP servers
        $mail->SMTPAuth = false;                               // Enable SMTP authentication
                        
        $mail->Port = 25;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('ceopc08@caixa.gov.br', 'CAIXA - ROTINAS AUTOMATICAS');

        // DEFINE O DESTINATÁRIO
        $mail->addAddress($matriculaAtendido . '@mail.caixa');

        // DEFINE AS CÓPIAS OCULTAS
        $mail->addBCC('c079436@mail.caixa');
        $mail->addBCC('c111710@mail.caixa');
        $mail->addBCC('CEOPC08@mail.caixa');

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '#CONFIDENCIAL10 - Pesquisa de Satisfação - Atendimento COMEX';

        $mail->Body = 
        "
        <head>
        <meta charset=\"UTF-8\">
        <style>
            body{
                font-family: arial,verdana,sans serif;
            }

            .head_msg{
                font-weight: bold;
                text-align: center;
            }

            .gray{
                color: #808080;
            }


        </style>
    </head>
    <body style=\"font-family: arial;\">


        <h3 class=\"head_msg gray\">TESTE DE ENVIO.</h3>
        <p>Data do Atendimento: " . $dataEnvio . ".</p>
        <p>Protocolo Atendimento: " . $idRegistroAtendimento . ".</p>
        <p>Matricula Atendido: " . $matriculaAtendido . ".</p>
        <p>Matricula CEOPC: " . $matriculaCeopc . ".</p>
        <p>Tipo Atendimento: CONSULTORIA.</p>
        <p>Canal de Atendimento: " . $canalAtendimento . ".</p>
        <p>Nome Atividade: " . $nomeAtividade . ".</p><br><br>
        <p>Para responder a pesquisa, <a href='http://www.ceopc.hom.sp.caixa/atendimento_web/index_registro_pesquisa.php?idAtendimento=" . $idRegistroAtendimento . "'>clique aqui</a>.</p>
    </body>";

        $mail->send();

        echo "e-mail encaminhado com sucesso!";

    }

    // MÉTODO PARA DAR O UPDATE DA RESPOSTA DA PESQUISA
    public function registrarRespostaPesquisa()
    {
        
    }
}

?>



