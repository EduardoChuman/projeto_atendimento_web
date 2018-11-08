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
        $this->feedbackAtendido = $value;
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
            <p>Para responder a pesquisa, <a href='http://www.ceopc.hom.sp.caixa/atendimento_web/index_responde_pesquisa.php?idAtendimento=" . $idRegistroAtendimento . "&matriculaAtendido=" . $matriculaAtendido . "'>clique aqui</a>.</p>
         </body>";

        $mail->send();

        echo "Consultoria registrada com sucesso! A pesquisa de satisfação foi enviada. <br>";
    }

    // MÉTODO PARA DAR O UPDATE DA RESPOSTA DA PESQUISA
    public function registrarRespostaPesquisa()
    {
        $sql = new Sql();

        $sql->query
        (
            "UPDATE [dbo].[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS]
            SET 
                [DATA_RESPOSTA] = :DATA_RESPOSTA
                ,[NOTA_CORDIALIDADE] = :NOTA_CORDIALIDADE
                ,[NOTA_DOMINIO] = :NOTA_DOMINIO
                ,[NOTA_TEMPESTIVIDADE] = :NOTA_TEMPESTIVIDADE
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
                ,':FEEDBACK_ATENDIDO'=>$this->getFeedbackAtendido()
            )
        );
        header("location:http://www.ceopc.hom.sp.caixa/atendimento_web/voto/");      
    }
}

?>



