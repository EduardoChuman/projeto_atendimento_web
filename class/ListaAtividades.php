<?php	
// VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
ini_set('display_errors',1);

// CRIAÇÃO DA CLASSE
class ListaAtividades 
{
	// DEFINIÇÃO DOS ATRIBUTOS
	private $idAtividade;
    private $tipoGrupoAtendimento;
    private $nomeAtividade;
    private $idCelula;
    private $ativa;

    // MÉTODOS

	// GETTERS E SETTERS DOS ATRIBUTOS
	
	// $idAtividade
	public function getIdAtividade()
	{
		return $this->idAtividade;
	}
	public function setIdAtividade($value)
	{
		$this->idAtividade = $value;
	}
    
    // $tipoGrupoAtendimento
	public function getTipoGrupoAtendimento()
	{
		return $this->tipoGrupoAtendimento;
	}
	public function setTipoGrupoAtendimento($value)
	{
		$this->tipoGrupoAtendimento = $value;
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

    // $idCelula
	public function getIdCelula()
	{
		return $this->idCelula;
	}
	public function setIdCelula($value)
	{
		$this->idCelula = $value;
    }

    // $ativa
	public function getAtiva()
	{
		return $this->ativa;
	}
	public function setAtiva($value)
	{
		$this->ativa = $value;
    }
    
    // CONSTRUCT
    public function __construct()
    {

    }

    // MÉTODO PARA CADASTRAR NOVA ATIVIDADE
    public function incluirAtividade($tipoGrupoAtendimento, $nomeAtividade, $idCelula)
    {
		$this->setTipoGrupoAtendimento($tipoGrupoAtendimento);
		$this->setNomeAtividade($nomeAtividade);
		$this->setIdCelula($idCelula);
		$this->setAtiva(1);

		$sql = new Sql();

		try{

			$registraAtividade = $sql->select("INSERT [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES]
													(
														[TIPO_GRUPO_ATENDIMENTO]
														,[NOME_ATIVIDADE]
														,[ID_CELULA]
														,[ATIVA]
													)
												VALUES
													(
														:TIPO_GRUPO_ATENDIMENTO,
														:NOME_ATIVIDADE,
														:ID_CELULA,
														:ATIVA
													)", array(
														':TIPO_GRUPO_ATENDIMENTO'=>$this->getTipoGrupoAtendimento(),
														':NOME_ATIVIDADE'=>$this->getNomeAtividade(),
														':ID_CELULA'=>$this->getIdCelula(),
														':ATIVA'=>$this->getAtiva()
													));

		} catch (Exception $e) {

			echo json_encode(array(
				"message"=>$e->getMessage(),
				"line"=>$e->getLine(),
				"file"=>$e->getFile(),
				"code"=>$e->getCode()
			));

		}
    }

    // MÉTODO PARA DESABILITAR UMA ATIVIDADE
    public function removerAtividade($id)
    {
		$this->setIdAtividade($id);

		$sql = new Sql();

		try{

			$desativaAtividade = $sql->select("UPDATE [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES]
												SET 
													[ATIVA] = 0
												WHERE 
													[ID] = :ID
												", array(
													':ID'=>$this->getIdAtividade()
												));
		
		} catch (Exception $e) {

			echo json_encode(array(
				"message"=>$e->getMessage(),
				"line"=>$e->getLine(),
				"file"=>$e->getFile(),
				"code"=>$e->getCode()
			));

		}
	}

    // MÉTODO PARA REATIVAR UMA ATIVIDADE
    public function reativarAtividade($id)
    {
		$this->setIdAtividade($id);

		$sql = new Sql();

		try{

			$reativaAtividade = $sql->select("UPDATE [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES]
												SET 
													[ATIVA] = 1
												WHERE 
													[ID] = :ID
												", array(
													':ID'=>$this->getIdAtividade()
												));
		
		} catch (Exception $e) {

			echo json_encode(array(
				"message"=>$e->getMessage(),
				"line"=>$e->getLine(),
				"file"=>$e->getFile(),
				"code"=>$e->getCode()
			));

		}
	}
	
	// MÉTODO PARA LISTAR AS ATIVIDADES DE ROTINA
	public function listaAtividadesRotina($idCelula)
	{
		$this->setIdCelula($idCelula);

		$sql = new Sql();

		try{
		
			$selectAtividadesRotina = $sql->select("SELECT 
														[ID]
														,[TIPO_GRUPO_ATENDIMENTO]
														,[NOME_ATIVIDADE]
														,[ID_CELULA]
														,[ATIVA]
													FROM [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES]
													WHERE 
														[TIPO_GRUPO_ATENDIMENTO] = 'ATIVIDADE'
														AND [ID_CELULA] = :ID_CELULA", array(
															'ID_CELULA'=>$this->getIdCelula()
														));
			return json_encode($selectAtividadesRotina, JSON_UNESCAPED_SLASHES);
		
		} catch (Exception $e) {

			echo json_encode(array(
				"message"=>$e->getMessage(),
				"line"=>$e->getLine(),
				"file"=>$e->getFile(),
				"code"=>$e->getCode()
			));

		}
	}

	// MÉTODO PARA LISTAR AS ATIVIDADES DE CONSULTORIA
	public function listaAtividadesConsultoria($idCelula)
	{
		$this->setIdCelula($idCelula);

		$sql = new Sql();

		try{
		
			$selectAtividadesConsultoria = $sql->select("SELECT 
														[ID]
														,[TIPO_GRUPO_ATENDIMENTO]
														,[NOME_ATIVIDADE]
														,[ID_CELULA]
														,[ATIVA]
													FROM [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES]
													WHERE 
														[TIPO_GRUPO_ATENDIMENTO] = 'CONSULTORIA'
														AND [ID_CELULA] = :ID_CELULA", array(
															'ID_CELULA'=>$this->getIdCelula()
														));
			return json_encode($selectAtividadesConsultoria, JSON_UNESCAPED_SLASHES);
		
		} catch (Exception $e) {

			echo json_encode(array(
				"message"=>$e->getMessage(),
				"line"=>$e->getLine(),
				"file"=>$e->getFile(),
				"code"=>$e->getCode()
			));

		}
	}
}

?>