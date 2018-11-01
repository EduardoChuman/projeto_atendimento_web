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

    // CONSTRUCT
    public function __construct()
    {

    }

    // MÉTODO DE INSERT E ENVIO DA PESQUISA
    public function cadastrarEnvioPesquisa()
    {
        
    }

    // MÉTODO PARA DAR O UPDATE DA RESPOSTA DA PESQUISA
    public function registrarRespostaPesquisa()
    {
        
    }
}

?>