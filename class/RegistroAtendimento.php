<?php	
// VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
ini_set('display_errors',1);

// CRIAÇÃO DA CLASSE
class RegistroAtendimento
{
    // DEFINIÇÃO DOS ATRIBUTOS
    private $idAtendimento;
    private $dataAtendimento;
    private $matriculaCeopc;
    private $tipoAtendimento;
    private $canalAtendimento;
    private $itemListaAtividades;
    private $observacaoCeopc;
    private $matriculaAtendido;
    private $unidadeDemandante;

	// MÉTODOS

    // GETTERS E SETTERS DOS ATRIBUTOS
    
 	// $idAtendimento
    public function getIdAtendimento()
    {
        return $this->idAtendimento;
    }
    public function setIdAtendimento($value)
    {
        $this->idAtendimento = $value;
    }  
    
    // $dataAtendimento
    public function getDataAtendimento()
    {
        return $this->dataAtendimento;
    }
    public function setDataAtendimento($value)
    {
        $this->dataAtendimento = $value;
    }  
    
    // $matriculaCeopc
    public function getMatriculaCeopc()
    {
        return $this->matriculaCeopc;
    }
    public function setMatriculaCeopc($value)
    {
        $this->matriculaCeopc = $value;
    }  

    // $tipoAtendimento
    public function getTipoAtendimento()
    {
        return $this->tipoAtendimento;
    }
    public function setTipoAtendimento($value)
    {
        $this->tipoAtendimento = $value;
    }  

    // $canalAtendimento
    public function getCanalAtendimento()
    {
        return $this->canalAtendimento;
    }
    public function setCanalAtendimento($value)
    {
        $this->canalAtendimento = $value;
    }  

    // $itemListaAtividades
    public function getItemListaAtividades()
    {
        return $this->itemListaAtividades;
    }
    public function setItemListaAtividades($value)
    {
        $this->itemListaAtividades = $value;
    }  

    // $observacaoCeopc
    public function getObservacaoCeopc()
    {
        return $this->observacaoCeopc;
    }
    public function setObservacaoCeopc($value)
    {
        $this->observacaoCeopc = $value;
    }  

    // $matriculaAtendido
    public function getMatriculaAtendido()
    {
        return $this->matriculaAtendido;
    }
    public function setMatriculaAtendido($value)
    {
        $this->matriculaAtendido = $value;
    }  

    // $unidadeDemandante
    public function getUnidadeDemandante()
    {
        return $this->unidadeDemandante;
    }
    public function setUnidadeDemandante($value)
    {
        $this->unidadeDemandante = $value;
    }  

    // CONSTRUCT
    public function __construct()
    {

    }

    // MÉTODO DE REGISTRO DE ATENDIMENTO
    public function registrarAtendimento()
    {
        
    }
}

?>