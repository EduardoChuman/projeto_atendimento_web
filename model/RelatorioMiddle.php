<?php	
// VERIFICA SE EXISTEM ERROS DE EXECUÇÃO NO CÓDIGO
ini_set('display_errors',1);

// CRIAÇÃO DA CLASSE
class RelatorioMiddle
{
	// MÉTODOS

	public function contagemAtendimentosPorUfDire()
	{
		$sql = new Sql();

		try
		{
			$selectcontagemAtendimentosPorUfDire = $sql->select
			(
				"SELECT 
					*
				FROM 
					[tbl_ATENDIMENTO_WEB_RELATORIO_INDICADORES]"
			);
			return json_encode($selectcontagemAtendimentosPorUfDire, JSON_UNESCAPED_SLASHES);	
		} 
		catch (Exception $e) 
		{
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

	public function contagemCanalAtendimento()
	{
		$sql = new Sql();

		try
		{
			$selectContagemCanalAtendimento = $sql->select
			(
				"SELECT 
				    'MES' = DATEPART(MONTH,[DATA_ATENDIMENTO])
					,'TELEFONE' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
					,'LYNC' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
					,'E-MAIL' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
				WHERE 
					DATEPART(YEAR,[DATA_ATENDIMENTO]) >= YEAR(GETDATE())
				GROUP BY 
					DATEPART(MONTH,[DATA_ATENDIMENTO])

				UNION

				SELECT 
				    'MES' = (MONTH(GETDATE())-1)
					,'TELEFONE' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = (MONTH(GETDATE())-1))
					,'LYNC' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = (MONTH(GETDATE())-1))
					,'E-MAIL' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = (MONTH(GETDATE())-1))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
				WHERE 
					DATEPART(YEAR,[DATA_ATENDIMENTO]) >= YEAR(GETDATE())
					-- Filtro para retornar os últimos três meses
					AND DATEPART(MONTH, [DATA_ATENDIMENTO]) BETWEEN (MONTH(GETDATE())-3) AND MONTH(GETDATE())
				GROUP BY 
					DATEPART(MONTH,[DATA_ATENDIMENTO])

				UNION

				SELECT 
				    'MES' = (MONTH(GETDATE())-2)
					,'TELEFONE' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = (MONTH(GETDATE())-2))
					,'LYNC' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = (MONTH(GETDATE())-2))
					,'E-MAIL' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = (MONTH(GETDATE())-2))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
				WHERE 
					DATEPART(YEAR,[DATA_ATENDIMENTO]) >= YEAR(GETDATE())
					-- Filtro para retornar os últimos três meses
					AND DATEPART(MONTH, [DATA_ATENDIMENTO]) BETWEEN (MONTH(GETDATE())-3) AND MONTH(GETDATE())
				GROUP BY 
					DATEPART(MONTH,[DATA_ATENDIMENTO])"
			);
			return json_encode($selectContagemCanalAtendimento, JSON_UNESCAPED_SLASHES);	
		} 
		catch (Exception $e) 
		{
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

	public function contagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral()
	{
		$sql = new Sql();

		try
		{
			$selectContagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral = $sql->select
			(
				"SELECT 
					'MES' = DATEPART(MONTH, [DATA_ENVIO])
					,'PESQUISAS_ENVIADAS' = COUNT([DATA_ENVIO])
					,'PESQUISAS_RESPONDIDAS' = COUNT([DATA_RESPOSTA])
					,'MEDIA_CORDIALIDADE' = AVG(CONVERT(FLOAT,[NOTA_CORDIALIDADE]))
					,'MEDIA_DOMINIO' = AVG(CONVERT(FLOAT,[NOTA_DOMINIO]))
					,'MEDIA_TESPESTIVIDADE' = AVG(CONVERT(FLOAT,[NOTA_TEMPESTIVIDADE]))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS]
				WHERE
					DATEPART(YEAR, [DATA_ENVIO]) >= YEAR(GETDATE())
					AND DATEPART(MONTH, [DATA_ENVIO]) BETWEEN (MONTH(GETDATE())-3) AND MONTH(GETDATE())
				GROUP BY DATEPART(MONTH, [DATA_ENVIO])"
			);
			return json_encode($selectContagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral, JSON_UNESCAPED_SLASHES);	
		} 
		catch (Exception $e) 
		{
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

	public function contagemAtendimentosComMediaNotasPorAssistenteGeral()
	{
		$sql = new Sql();

		try
		{
			$selectContagemAtendimentosComMediaNotasPorAssistente = $sql->select
			(
				"SELECT 
					'MES' = DATEPART(MONTH, PESQUISAS.[DATA_ENVIO])
					,'MATRICULA' = ATENDIMENTO.[MATRICULA_CEOPC]
					,'NOME' = EMPREGADOS.[NOME]
					,'PESQUISAS_ENVIADAS' = COUNT(PESQUISAS.[DATA_ENVIO])
					,'PESQUISAS_RESPONDIDAS' = COUNT(PESQUISAS.[DATA_RESPOSTA])
					,'MEDIA_CORDIALIDADE' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_CORDIALIDADE]))
					,'MEDIA_DOMINIO' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_DOMINIO]))
					,'MEDIA_TESPESTIVIDADE' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_TEMPESTIVIDADE]))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS] AS PESQUISAS
					INNER JOIN tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO AS ATENDIMENTO ON PESQUISAS.[ID_REGISTRO_ATENDIMENTO] = ATENDIMENTO.[ID]
					LEFT JOIN [EMPREGADOS] AS EMPREGADOS ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE
					DATEPART(YEAR, [DATA_ENVIO]) >= YEAR(GETDATE())
					AND DATEPART(MONTH, [DATA_ENVIO]) BETWEEN (MONTH(GETDATE())-3) AND MONTH(GETDATE())
				GROUP BY 
					DATEPART(MONTH, PESQUISAS.[DATA_ENVIO])
					,ATENDIMENTO.[MATRICULA_CEOPC]
					,EMPREGADOS.[NOME]"
			);
			return json_encode($selectContagemAtendimentosComMediaNotasPorAssistente, JSON_UNESCAPED_SLASHES);	
		} 
		catch (Exception $e) 
		{
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

	public function contagemAtendimentosComMediaNotasPorAssistente($matricula)
	{
		$sql = new Sql();

		try
		{
			$selectContagemAtendimentosComMediaNotasPorAssistente = $sql->select
			(
				"SELECT 
					'MES' = DATEPART(MONTH, PESQUISAS.[DATA_ENVIO])
					,'MATRICULA' = ATENDIMENTO.[MATRICULA_CEOPC]
					,'NOME' = EMPREGADOS.[NOME]
					,'PESQUISAS_ENVIADAS' = COUNT(PESQUISAS.[DATA_ENVIO])
					,'PESQUISAS_RESPONDIDAS' = COUNT(PESQUISAS.[DATA_RESPOSTA])
					,'MEDIA_CORDIALIDADE' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_CORDIALIDADE]))
					,'MEDIA_DOMINIO' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_DOMINIO]))
					,'MEDIA_TESPESTIVIDADE' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_TEMPESTIVIDADE]))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS] AS PESQUISAS
					INNER JOIN tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO AS ATENDIMENTO ON PESQUISAS.[ID_REGISTRO_ATENDIMENTO] = ATENDIMENTO.[ID]
					LEFT JOIN [EMPREGADOS] AS EMPREGADOS ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE
					DATEPART(YEAR, PESQUISAS.[DATA_ENVIO]) >= YEAR(GETDATE())
					AND DATEPART(MONTH, PESQUISAS.[DATA_ENVIO]) BETWEEN (MONTH(GETDATE())-3) AND MONTH(GETDATE())
					AND ATENDIMENTO.[MATRICULA_CEOPC] = :MATRICULA
				GROUP BY 
					DATEPART(MONTH, PESQUISAS.[DATA_ENVIO])
					,ATENDIMENTO.[MATRICULA_CEOPC]
					,EMPREGADOS.[NOME]"
				,
				array
				(
					':MATRICULA'=>$matricula
				)
			);
			return json_encode($selectContagemAtendimentosComMediaNotasPorAssistente, JSON_UNESCAPED_SLASHES);	
		} 
		catch (Exception $e) 
		{
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

	public function contagemAtendimentosPorAssistenteGeral()
	{
		$sql = new Sql();

		try
		{
			$selectContagemAtendimentosPorAssistenteGeral = $sql->select
			(
				"SELECT
					'MES' = DATEPART(MONTH,ATENDIMENTO.[DATA_ATENDIMENTO])
					,ATENDIMENTO.[MATRICULA_CEOPC]
					,EMPREGADOS.[NOME]
					,'ROTINA' = COUNT(ATENDIMENTO.[ROTINA])
					,'CONSULTORIA' = COUNT(ATENDIMENTO.[CONSULTORIA])
					,'TOTAL_ATENDIMENTOS_MES' = COUNT(ATENDIMENTO.[CONSULTORIA]) + COUNT(ATENDIMENTO.[ROTINA])
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS ATENDIMENTO 
					INNER JOIN [EMPREGADOS] ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE 
					DATEPART(YEAR,ATENDIMENTO.[DATA_ATENDIMENTO]) >= YEAR(GETDATE())
					AND DATEPART(MONTH, [DATA_ATENDIMENTO]) BETWEEN (MONTH(GETDATE())-3) AND MONTH(GETDATE())
				GROUP BY 
					MONTH(ATENDIMENTO.[DATA_ATENDIMENTO])
					,ATENDIMENTO.[MATRICULA_CEOPC]
					,EMPREGADOS.[NOME]"
			);
			return json_encode($selectContagemAtendimentosPorAssistenteGeral, JSON_UNESCAPED_SLASHES);	
		} 
		catch (Exception $e) 
		{
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

	public function contagemPizzaAtendimentos()
	{
		$sql = new Sql();

		try
		{
			$selectContagemPizzaAtendimentos = $sql->select
			(
				"SELECT
					'MES' = DATEPART(MONTH,[DATA_ATENDIMENTO])
					,'ROTINA' = COUNT([ROTINA])
					,'CONSULTORIA' = COUNT([CONSULTORIA])
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
				WHERE 
					DATEPART(YEAR,[DATA_ATENDIMENTO]) >= YEAR(GETDATE())
					-- Filtro para retornar os últimos três meses
					AND DATEPART(MONTH, [DATA_ATENDIMENTO]) BETWEEN (MONTH(GETDATE())-3) AND MONTH(GETDATE())
				GROUP BY 
					MONTH([DATA_ATENDIMENTO])"
			);
			return json_encode($selectContagemPizzaAtendimentos, JSON_UNESCAPED_SLASHES);	
		} 
		catch (Exception $e) 
		{
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