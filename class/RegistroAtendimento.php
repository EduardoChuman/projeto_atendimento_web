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
    private $nomeAtividade;
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
    public function setDataAtendimento()
    {
        $this->data = date("Y-m-d H:i:s", time());
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

    // $nomeAtividade
    public function getNomeAtividade()
    {
        return $this->nomeAtividade;
    }
    public function setNomeAtividade($value)
    {
        $this->nomeAtividade = $value;
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
        $this->setDataAtendimento();
    }

    // MÉTODO DE REGISTRO DE ATENDIMENTO
    public function registrarAtendimento()
    {
        $sql = new Sql();

        $sql->beginTransaction();

        try
        {
            $sql->select("INSERT INTO [dbo].[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
                            (
                                [DATA_ATENDIMENTO]
                                ,[MATRICULA_CEOPC]
                                ,[TIPO_ATENDIMENTO]
                                ,[CANAL_ATENDIMENTO]
                                ,[ITEM_LISTA_ATIVIDADES]
                                ,[OBSERVACAO_CEOPC]
                                ,[MATRICULA_ATENDIDO]
                                ,[UNIDADE_DEMANDANTE]
                            )
                        VALUES
                            (
                                :DATA_ATENDIMENTO,
                                ,:MATRICULA_CEOPC
                                ,:TIPO_ATENDIMENTO
                                ,:CANAL_ATENDIMENTO
                                ,:ITEM_LISTA_ATIVIDADES
                                ,:OBSERVACAO_CEOPC
                                ,:MATRICULA_ATENDIDO
                                ,:UNIDADE_DEMANDANTE
                            )", array(
                                ':DATA_ATENDIMENTO'=>$this->getDataAtendimento()
                                ,':MATRICULA_CEOPC'=>$this->getMatriculaCeopc()
                                ,':TIPO_ATENDIMENTO'=>$this->getTipoAtendimento()
                                ,':CANAL_ATENDIMENTO'=>$this->getCanalAtendimento()
                                ,':ITEM_LISTA_ATIVIDADES'=>$this->getItemListaAtividades()
                                ,':OBSERVACAO_CEOPC'=>$this->getObservacaoCeopc()
                                ,':MATRICULA_ATENDIDO'=>$this->getMatriculaAtendido()
                                ,':UNIDADE_DEMANDANTE'=>$this->getUnidadeDemandante()
                            ));

            // ROTINA PARA INSTANCIAR O OBJETO REGISTRO PESQUISA, REGISTRAR A PESQUISA NA TABELA REGISTRO_PESQUISA
            if ($this->getTipoAtendimento() == 'CONSULTORIA') {
                
                $this->consultarUltimoProtocoloCadastrado();

                // INSTANCIA UM OBJETO DA CLASSE REGISTRO PESQUISA
                $pesquisa = new RegistroPesquisa();

                $pesquisa->cadastrarEnvioPesquisa($this->getDataAtendimento(), $this->getIdAtendimento(), $this->getMatriculaAtendido(), $this->getMatriculaCeopc(), $this->getCanalAtendimento(), $this->getNomeAtividade);         

            }
            
            $sql->commit();

        }
        catch(Exception $e) 
        {

			$sql->rollback();

			// EM CASO DE ERRO, RETORNA O TIPO VIA JSON NA TELA
			echo json_encode(array(
				"message"=>$e->getMessage(),
				"line"=>$e->getLine(),
				"file"=>$e->getFile(),
				"code"=>$e->getCode()
			));
		}

    }

    public function consultarUltimoProtocoloCadastrado()
    {
        $sql = new Sql();

        $consultaId = $sql->select("SELECT TOP 1
                        [ID]
                    FROM 
                        [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
                    WHERE
                        [MATRICULA_CEOPC] = :MATRICULA
                    ORDER BY 
                        [ID] DESC", array(
                            ':MATRICULA'=>$this->getMatriculaCeopc()
                        ));
        if(!empty($consultaId))
        {
            $row = $result[0];
            $this->setIdAtendimento($row['ID']);
        }
    }

    public function consultarAtendimento($idAtendimento)
    {
        $this->setIdAtendimento($idAtendimento);

        $sql = new Sql();

        $consulta = $sql->select("SELECT 
                                    ,'DATA_ATENDIMENTO' = ATENDIMENTO.[DATA_ATENDIMENTO]
                                    ,'MATRICULA_CEOPC' = ATENDIMENTO.[MATRICULA_CEOPC]
                                    ,'TIPO_ATENDIMENTO' = ATENDIMENTO.[TIPO_ATENDIMENTO]
                                    ,'CANAL_ATENDIMENTO' = ATENDIMENTO.[CANAL_ATENDIMENTO]
                                    ,'NOME_ATIVIDADE' = ATIVIDADES.[NOME_ATIVIDADE]
                                FROM 
                                    [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS ATENDIMENTO
                                    INNER JOIN [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES] AS ATIVIDADES ON ATENDIMENTO.ITEM_LISTA_ATIVIDADES = ATIVIDADES.ID
                                WHERE ATENDIMENTO.[ID] = :ID", array(
                                    ':ID'=>$this->getIdAtendimento()
                                ));
        if(!empty($consulta))
        {
            $row = $consulta[0];
            $this->setDataAtendimento($row['DATA_ATENDIMENTO']);
            $this->setMatriculaCeopc($row['MATRICULA_CEOPC']);
            $this->setTipoAtendimento($row['TIPO_ATENDIMENTO']);
            $this->setCanalAtendimento($row['CANAL_ATENDIMENTO']);
            $this->setNomeAtividade($row['NOME_ATIVIDADE']);
        }
        
    }
}

?>