<?php	
// VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
ini_set('display_errors',1);

// CRIAÇÃO DA CLASSE
class RegistroAtendimento
{
    // DEFINIÇÃO DOS ATRIBUTOS
    private $idAtendimento;
    private $dataAtendimento;
    private $recuperarDataAtendimento;
    private $matriculaCeopc;
    private $tipoAtendimento;
    private $canalAtendimento;
    private $itemListaAtividades;
    private $nomeAtividade;
    private $observacaoCeopc;
    private $matriculaAtendido;
    private $unidadeDemandante;
    private $contagemConsultorias;

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
        $this->dataAtendimento = date("Y-m-d H:i:s", time());
    }

    // $recuperarDataAtendimento
    public function getRecuperarDataAtendimento()
    {
        return $this->recuperarDataAtendimento;
    }
    public function setRecuperarDataAtendimento($value)
    {
        $this->recuperarDataAtendimento = $value;
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
        if ($value != "") 
        {
            $this->observacaoCeopc = $value;
        }
        else
        {
            $this->observacaoCeopc = null;
        }
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

    // $contagemConsultorias
    public function getContagemConsultorias()
    {
        return $this->contagemConsultorias;
    }
    public function setContagemConsultorias($value)
    {
        $this->contagemConsultorias = $value;
    }  

    // CONSTRUCT
    public function __construct()
    {
        $this->setDataAtendimento();
    }

    // MÉTODO DE REGISTRO DE ROTINA
    public function registrarAtendimentoRotina()
    {
        $sql = new Sql();

        try
        {
            $sql->select
            (
                "INSERT INTO [dbo].[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]          
                    (
                        [DATA_ATENDIMENTO]
                        ,[MATRICULA_CEOPC]
                        ,[ROTINA]
                        ,[CANAL_ATENDIMENTO]
                        ,[ITEM_LISTA_ATIVIDADES]
                        ,[OBSERVACAO_CEOPC]
                        ,[UNIDADE_DEMANDANTE]
                    )
                VALUES
                    (
                        :DATA_ATENDIMENTO
                        ,:MATRICULA_CEOPC
                        ,:ROTINA
                        ,:CANAL_ATENDIMENTO
                        ,:ITEM_LISTA_ATIVIDADES
                        ,:OBSERVACAO_CEOPC
                        ,:UNIDADE_DEMANDANTE
                    )"
                , array
                (
                    ':DATA_ATENDIMENTO'=>$this->getDataAtendimento()
                    ,':MATRICULA_CEOPC'=>$this->getMatriculaCeopc()
                    ,':ROTINA'=>1
                    ,':CANAL_ATENDIMENTO'=>$this->getCanalAtendimento()
                    ,':ITEM_LISTA_ATIVIDADES'=>$this->getItemListaAtividades()
                    ,':OBSERVACAO_CEOPC'=>$this->getObservacaoCeopc()
                    ,':UNIDADE_DEMANDANTE'=>$this->getUnidadeDemandante()
                )
            );
            echo "Atendimento registrado com sucesso! <br>";
        }
        catch(Exception $e)
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

    // MÉTODO DE REGISTRO DE CONSULTORIA
    public function registrarAtendimentoConsultoria()
    {
        $sql = new Sql();

        try
        {
            $sql->select
            (
                "INSERT INTO [dbo].[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]          
                    (
                        [DATA_ATENDIMENTO]
                        ,[MATRICULA_CEOPC]
                        ,[CONSULTORIA]
                        ,[CANAL_ATENDIMENTO]
                        ,[ITEM_LISTA_ATIVIDADES]
                        ,[OBSERVACAO_CEOPC]
                        ,[MATRICULA_ATENDIDO]
                        ,[UNIDADE_DEMANDANTE]
                    )
                VALUES
                    (
                        :DATA_ATENDIMENTO
                        ,:MATRICULA_CEOPC
                        ,:CONSULTORIA
                        ,:CANAL_ATENDIMENTO
                        ,:ITEM_LISTA_ATIVIDADES
                        ,:OBSERVACAO_CEOPC
                        ,:MATRICULA_ATENDIDO
                        ,:UNIDADE_DEMANDANTE
                    )"
                , array
                (
                    ':DATA_ATENDIMENTO'=>$this->getDataAtendimento()
                    ,':MATRICULA_CEOPC'=>$this->getMatriculaCeopc()
                    ,':CONSULTORIA'=>1
                    ,':CANAL_ATENDIMENTO'=>$this->getCanalAtendimento()
                    ,':ITEM_LISTA_ATIVIDADES'=>$this->getItemListaAtividades()
                    ,':OBSERVACAO_CEOPC'=>$this->getObservacaoCeopc()
                    ,':MATRICULA_ATENDIDO'=>$this->getMatriculaAtendido()
                    ,':UNIDADE_DEMANDANTE'=>$this->getUnidadeDemandante()
                )
            );

            // ROTINA PARA INSTANCIAR O OBJETO REGISTRO PESQUISA, REGISTRAR A PESQUISA NA TABELA REGISTRO_PESQUISA
            if ($this->getTipoAtendimento() == 'CONSULTORIA') 
            {
                // QUERY PARA VERIFICAR SE HOUVE ALGUMA CONSULTORIA PARA ESSA MATRICULA, DO MESMO COLABORADOR CEOPC NA DATA DE HOJE
                $validarQuantidadePesquisa = $sql->select
                (
                    "SELECT 
                        'CONTAGEM' = COUNT([ID])
                    FROM 
                        [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
                    WHERE 
                        [MATRICULA_ATENDIDO] = :MATRICULA_ATENDIDO
                        AND [MATRICULA_CEOPC] = :MATRICULA_CEOPC
                        AND [TIPO_ATENDIMENTO] = 'CONSULTORIA'
                        AND CONVERT(DATE,[DATA_ATENDIMENTO]) = CONVERT(DATE, GETDATE())"
                    , array
                    (
                        ':MATRICULA_ATENDIDO'=>$this->getMatriculaAtendido()
                        ,':MATRICULA_CEOPC'=>$this->getMatriculaCeopc()
                    )
                );

                // ATRIBUI O VALOR DA CONSULTA NA VARIÁVEL DO OBJETO
                if(!empty($validarQuantidadePesquisa))
                {
                    $row = $validarQuantidadePesquisa[0];
                    $this->setContagemConsultorias($row['CONTAGEM']);
                }

                // VALIDA O RESULTADO DA PESQUISA E CASO NÃO TENHA CONSULTORIA NESSA DATA, SERÁ ENVIADO A PESQUISA
                if ($this->getContagemConsultorias() <= 1) 
                {
                    $this->consultarUltimoProtocoloCadastrado();

                    // INSTANCIA UM OBJETO DA CLASSE REGISTRO PESQUISA
                    $pesquisa = new RegistroPesquisa();

                    // CHAMA O MÉTODO DA CLASSE REGISTRO PESQUISA QUE FAZ INSERT NO BANCO E ENVIA O E-MAIL DE PESQUISA
                    $pesquisa->cadastrarEnvioPesquisa
                    (
                        $this->getDataAtendimento()
                        ,$this->getIdAtendimento()
                        ,$this->getMatriculaAtendido()
                        ,$this->getMatriculaCeopc()
                        ,$this->getCanalAtendimento()
                        ,$this->getNomeAtividade()
                    );
                    echo "Consultoria registrada com sucesso! <br>";
                }
                // CASO JÁ TENHA CONSULTORIA NESSA DATA, SERÁ RALIZADO SOMENTE O REGISTRO NA TABELA REGISTRO ATENDIMENTO
                else
                {
                    echo "Consultoria registrada com sucesso! Pesquisa não foi enviada pois você já realizou uma consultoria para essa matricula hoje. <br>";
                }          
            }
            // CASO SEJA SOMENTE UM REGISTRO DE ATIVIDADE/ROTINA, NÃO É NECESSÁRIO INSTANCIAR O OBJETO DE REGISTRO PESQUISA
            else
            {
                echo "Atendimento registrado com sucesso! <br>";
            }
        }
        catch(Exception $e)
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

    // MÉTODO DE CONSULTA DO ÚLTIMO PROTOCOLO CADASTRADO PARA INSERT NA TABELA PESQUISA
    public function consultarUltimoProtocoloCadastrado()
    {
        $sql2 = new Sql();

        $consultaId = $sql2->select
        (
            "SELECT TOP 1
                'ID' = ATENDIMENTO.[ID]
                ,'NOME_ATIVIDADE' = ATIVIDADES.[NOME_ATIVIDADE]
            FROM 
                [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS ATENDIMENTO
                INNER JOIN [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES] AS ATIVIDADES 
                ON ATENDIMENTO.[ITEM_LISTA_ATIVIDADES] = ATIVIDADES.[ID]
            WHERE
                [MATRICULA_CEOPC] = :MATRICULA
            ORDER BY 
                [ID] DESC"
            , array
            (
                ':MATRICULA'=>$this->getMatriculaCeopc()
            )
        );
        if(!empty($consultaId))
        {
            $row = $consultaId[0];
            $this->setIdAtendimento($row['ID']);
            $this->setNomeAtividade($row['NOME_ATIVIDADE']);
        }
    }

    // MÉTODO QUE RESGATA INFORMAÇÕES DO ATENDIMENTO
    public function consultarAtendimento($idAtendimento)
    {
        $this->setIdAtendimento($idAtendimento);

        $sql = new Sql();

        $consulta = $sql->select
        (
            "SELECT 
                'DATA_ATENDIMENTO' = ATENDIMENTO.[DATA_ATENDIMENTO]
                ,'MATRICULA_ATENDIDO'=ATENDIMENTO.[MATRICULA_ATENDIDO]
                ,'MATRICULA_CEOPC' = ATENDIMENTO.[MATRICULA_CEOPC]
                ,'CANAL_ATENDIMENTO' = ATENDIMENTO.[CANAL_ATENDIMENTO]
            FROM 
                [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS ATENDIMENTO
                INNER JOIN [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES] AS ATIVIDADES ON ATENDIMENTO.[ITEM_LISTA_ATIVIDADES] = ATIVIDADES.[ID]
            WHERE 
                ATENDIMENTO.[ID] = :ID"
            , array
            (
                ':ID'=>$this->getIdAtendimento()
            )
        );
        if(!empty($consulta))
        {
            $row = $consulta[0];
            $this->setRecuperarDataAtendimento($row['DATA_ATENDIMENTO']);
            $this->setMatriculaCeopc($row['MATRICULA_CEOPC']);
            $this->setMatriculaAtendido($row['MATRICULA_ATENDIDO']);
            $this->setCanalAtendimento($row['CANAL_ATENDIMENTO']);
        }   
    }

    // MÉTODO PARA TRAZER OS DADOS DO OBJETO COMO JSON
	public function __toString()
	{
		return json_encode(array(
			"DATA_ATENDIMENTO"=>$this->getRecuperarDataAtendimento(),
			"MATRICULA_CEOPC"=>$this->getMatriculaCeopc(),
			"MATRICULA_ATENDIDO"=>$this->getMatriculaAtendido(),
			"CANAL_ATENDIMENTO"=>$this->getCanalAtendimento(),
		), JSON_UNESCAPED_SLASHES);
	}
}

?>