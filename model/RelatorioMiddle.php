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
				'lote' = [MES]
				-- ,[RS]
				-- ,[SC]
				-- ,[MT]
				-- ,[MS]
				-- ,[PR]
				-- ,[SP]
				-- ,[DF]
				-- ,[MG]
				-- ,[ES]
				-- ,[RJ]
				-- ,[AM]
				-- ,[RR]
				-- ,[AP]
				-- ,[PA]
				-- ,[TO]
				-- ,[RO]
				-- ,[AC]
				-- ,[GO]
				-- ,[MA]
				-- ,[PI]
				-- ,[CE]
				-- ,[RN]
				-- ,[PB]
				-- ,[PE]
				-- ,[AL]
				-- ,[SE]
				-- ,[BA]
				-- ,'ufOutros' = [UF_OUTROS]
				,'direA' = [DIRE_A]
				,'direB' = [DIRE_B]
				,'direCD' = [DIRE_C_D]
				,'direE' = [DIRE_E]
				,'direF' = [DIRE_F]
				,'direG' = [DIRE_G]
				,'direH' = [DIRE_H]
				,'direOutros' = [DIRE_OUTROS]
				,'total' = [TOTAL]
			FROM [tbl_ATENDIMENTO_WEB_RELATORIO_INDICADORES]"
			);
			// return json_encode($selectcontagemAtendimentosPorUfDire, JSON_UNESCAPED_SLASHES);
			return $selectcontagemAtendimentosPorUfDire;	
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
				"DECLARE @MES_ANTERIOR_INT AS INT
				DECLARE @DOIS_MESES_ANTES_INT AS INT
				DECLARE @MES_ANTERIOR_DATE AS DATETIME
				DECLARE @DOIS_MESES_ANTES_DATE AS DATETIME
				
				SET @MES_ANTERIOR_INT = DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))
				SET @DOIS_MESES_ANTES_INT = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @MES_ANTERIOR_DATE = CASE @MES_ANTERIOR_INT 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				SET @DOIS_MESES_ANTES_DATE = CASE @DOIS_MESES_ANTES_INT 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				-- Pizza Canais de Atendimento
				SELECT
					'lote' = CONCAT(DATEPART(YEAR,[DATA_ATENDIMENTO]), '/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ATENDIMENTO])), 2))
					,'telefone' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
					,'lync' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
					,'email' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
					,'total' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
				WHERE
					DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,GETDATE())
				GROUP BY 
					CONCAT(DATEPART(YEAR,[DATA_ATENDIMENTO]), '/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ATENDIMENTO])), 2))
				
				UNION
				
				SELECT
					'lote' = CONCAT(DATEPART(YEAR,DATEADD(YEAR, -1,GETDATE())), '/', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1,GETDATE()))), 2))
					,'telefone' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@MES_ANTERIOR_DATE))
					,'lync' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@MES_ANTERIOR_DATE))
					,'email' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@MES_ANTERIOR_DATE))
					,'total' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE DATEPART(MONTH, [DATA_ATENDIMENTO]) =  DATEPART(MONTH,@MES_ANTERIOR_DATE))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
				WHERE
					DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@MES_ANTERIOR_DATE)
				GROUP BY 
					DATEPART(MONTH, DATEADD(MONTH, -1, [DATA_ATENDIMENTO]))
				
				UNION
				
				SELECT
					'lote' = CONCAT(DATEPART(YEAR,DATEADD(YEAR, -1,GETDATE())), '/', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2,GETDATE()))), 2))
					,'telefone' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE))
					,'lync' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE))
					,'email' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE))
					,'total' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE DATEPART(MONTH, [DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
				WHERE
					DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE)
				GROUP BY 
					DATEPART(MONTH, DATEADD(MONTH, -2, [DATA_ATENDIMENTO]))
				ORDER BY LOTE"
			);
			// return json_encode($selectContagemCanalAtendimento, JSON_UNESCAPED_SLASHES);
			return $selectContagemCanalAtendimento;	
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
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME
				
				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				-- Essa query faz o levantamento de pesquisas enviadas e respondidas nos ultimos três meses
				SELECT 
					'lote' = CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2))
					,'pesquisaEnviadas' = COUNT([DATA_ENVIO])
					,'pesquisasRespondidas' = COUNT([DATA_RESPOSTA])
					,'mediaCordialidade' = CAST(AVG(CONVERT(FLOAT,[NOTA_CORDIALIDADE])) AS DECIMAL (10,2))
					,'mediaDominio' = CAST(AVG(CONVERT(FLOAT,[NOTA_DOMINIO])) AS DECIMAL (10,2))
					,'mediaTempestividade' = CAST(AVG(CONVERT(FLOAT,[NOTA_TEMPESTIVIDADE])) AS DECIMAL (10,2))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS]
				WHERE
					[DATA_ENVIO] >= @PERIODO_INICIAL
				GROUP BY 
					CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2))
				ORDER BY
					CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2)) DESC"
			);
			// return json_encode($selectContagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral, JSON_UNESCAPED_SLASHES);
			return $selectContagemPesquisasEnviadasPesquisasRespondidasMediaNotasGeral;	
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

	public function contagemPesquisasEnviadasRespondidasComMediaNotasPorAssistenteGeral()
	{
		$sql = new Sql();

		try
		{
			$selectContagemAtendimentosComMediaNotasPorAssistente = $sql->select
			(
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME
				
				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				-- Essa query faz o levantamento de pesquisas enviadas e respondidas nos ultimos três meses
				SELECT 
					'lote' = CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2))
					,'matricula' = ATENDIMENTO.[MATRICULA_CEOPC]
					,'nome' = EMPREGADOS.[NOME]
					,'pesquisasEnviadas' = COUNT(PESQUISAS.[DATA_ENVIO])
					,'pesquisasRespondidas' = COUNT(PESQUISAS.[DATA_RESPOSTA])
					,'mediaCordialidade' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_CORDIALIDADE]))
					,'mediaDominio' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_DOMINIO]))
					,'mediatempestividade' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_TEMPESTIVIDADE]))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS] AS PESQUISAS
					INNER JOIN tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO AS ATENDIMENTO ON PESQUISAS.[ID_REGISTRO_ATENDIMENTO] = ATENDIMENTO.[ID]
					LEFT JOIN [EMPREGADOS] AS EMPREGADOS ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE
					[DATA_ENVIO] >= @PERIODO_INICIAL
				GROUP BY 
					CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2))
					,ATENDIMENTO.[MATRICULA_CEOPC]
					,EMPREGADOS.[NOME]
				ORDER BY 
					LOTE DESC
					,EMPREGADOS.[NOME]"
			);
			// return json_encode($selectContagemAtendimentosComMediaNotasPorAssistente, JSON_UNESCAPED_SLASHES);
			return $selectContagemAtendimentosComMediaNotasPorAssistente;	
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
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME
				
				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				-- Essa query faz o levantamento de pesquisas enviadas e respondidas nos ultimos três meses
				SELECT 
					'lote' = CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2))
					,'matricula' = ATENDIMENTO.[MATRICULA_CEOPC]
					,'nome' = EMPREGADOS.[NOME]
					,'pesquisasEnviadas' = COUNT(PESQUISAS.[DATA_ENVIO])
					,'pesquisasRespondidas' = COUNT(PESQUISAS.[DATA_RESPOSTA])
					,'mediaCordialidade' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_CORDIALIDADE]))
					,'mediaDominio' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_DOMINIO]))
					,'mediatempestividade' = AVG(CONVERT(FLOAT,PESQUISAS.[NOTA_TEMPESTIVIDADE]))
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS] AS PESQUISAS
					INNER JOIN tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO AS ATENDIMENTO ON PESQUISAS.[ID_REGISTRO_ATENDIMENTO] = ATENDIMENTO.[ID]
					LEFT JOIN [EMPREGADOS] AS EMPREGADOS ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE
					[DATA_ENVIO] >= @PERIODO_INICIAL
					AND ATENDIMENTO.[MATRICULA_CEOPC] = :MATRICULA
				GROUP BY 
					CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2))
					,ATENDIMENTO.[MATRICULA_CEOPC]
					,EMPREGADOS.[NOME]
				ORDER BY 
					LOTE DESC
					,EMPREGADOS.[NOME] "
				,
				array
				(
					':MATRICULA'=>$matricula
				)
			);
			// return json_encode($selectContagemAtendimentosComMediaNotasPorAssistente, JSON_UNESCAPED_SLASHES);
			return $selectContagemAtendimentosComMediaNotasPorAssistente;	
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
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME

				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))

				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				SELECT 
				    'lote' = CONCAT(DATEPART(YEAR,[DATA_ATENDIMENTO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ATENDIMENTO])), 2))
				    ,'matriculaCeopc' = ATENDIMENTO.[MATRICULA_CEOPC]
					,'nome' = EMPREGADOS.[NOME]
				    ,'rotina' = COUNT(ATENDIMENTO.[ROTINA])
					,'consultoria' = COUNT(ATENDIMENTO.[CONSULTORIA])
					,'totalAtendimentoMes' = COUNT(ATENDIMENTO.[CONSULTORIA]) + COUNT(ATENDIMENTO.[ROTINA])
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS ATENDIMENTO 
					INNER JOIN [EMPREGADOS] ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE 
					-- Filtro para retornar os últimos três meses
					[DATA_ATENDIMENTO] >= @PERIODO_INICIAL
					--AND ATENDIMENTO.[MATRICULA_CEOPC] = :MATRICULA
				GROUP BY 
					CONCAT(DATEPART(YEAR,[DATA_ATENDIMENTO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ATENDIMENTO])), 2))
					,ATENDIMENTO.[MATRICULA_CEOPC]
					,EMPREGADOS.[NOME]
				ORDER BY 
					LOTE DESC
					,EMPREGADOS.[NOME]"
			);
			// return json_encode($selectContagemAtendimentosPorAssistenteGeral, JSON_UNESCAPED_SLASHES);
			return $selectContagemAtendimentosPorAssistenteGeral;	
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

	public function contagemAtendimentosPorAssistente($matricula)
	{
		$sql = new Sql();

		try
		{
			$selectContagemAtendimentosPorAssistente = $sql->select
			(
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME

				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))

				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				SELECT 
				    'lote' = CONCAT(DATEPART(YEAR,[DATA_ATENDIMENTO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ATENDIMENTO])), 2))
				    ,'matriculaCeopc' = ATENDIMENTO.[MATRICULA_CEOPC]
					,'nome' = EMPREGADOS.[NOME]
				    ,'rotina' = COUNT(ATENDIMENTO.[ROTINA])
					,'consultoria' = COUNT(ATENDIMENTO.[CONSULTORIA])
					,'totalAtendimentoMes' = COUNT(ATENDIMENTO.[CONSULTORIA]) + COUNT(ATENDIMENTO.[ROTINA])
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS ATENDIMENTO 
					INNER JOIN [EMPREGADOS] ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE 
					-- Filtro para retornar os últimos três meses
					[DATA_ATENDIMENTO] >= @PERIODO_INICIAL
					AND ATENDIMENTO.[MATRICULA_CEOPC] = :MATRICULA
				GROUP BY 
					CONCAT(DATEPART(YEAR,[DATA_ATENDIMENTO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ATENDIMENTO])), 2))
					,ATENDIMENTO.[MATRICULA_CEOPC]
					,EMPREGADOS.[NOME]
				ORDER BY 
					LOTE DESC
					,EMPREGADOS.[NOME]"
				,
				array
				(
					':MATRICULA'=>$matricula
				)
			);
			// return json_encode($selectContagemAtendimentosPorAssistente, JSON_UNESCAPED_SLASHES);
			return $selectContagemAtendimentosPorAssistente;	
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
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME
				
				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				-- Pizza de Atendimento (Rotina e Consultoria)
				SELECT TOP 3
					'lote' = CONCAT(DATEPART(YEAR,[DATA_ATENDIMENTO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ATENDIMENTO])), 2))
					,'rotina' = COUNT([ROTINA])
					,'consultoria' = COUNT([CONSULTORIA])
					,'total' = COUNT([ROTINA]) + COUNT([CONSULTORIA])
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
				WHERE 
					[DATA_ATENDIMENTO] >= @PERIODO_INICIAL
				GROUP BY 
					MONTH([DATA_ATENDIMENTO])
					,DATEPART(YEAR,[DATA_ATENDIMENTO])
				ORDER BY 
					DATEPART(YEAR,[DATA_ATENDIMENTO]) DESC
					,DATEPART(MONTH,[DATA_ATENDIMENTO]) DESC"
			);
			// return json_encode($selectContagemPizzaAtendimentos, JSON_UNESCAPED_SLASHES);
			return $selectContagemPizzaAtendimentos;	
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

	public function feedbackAtendidosGeral()
	{
		$sql = new Sql();

		try
		{
			$selectFeedbackAtendidosGeral = $sql->select
			(
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME
				
				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				
				SELECT 
					'LOTE' = CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2))
					,'matriculaCeopc' = ATENDIMENTO.[MATRICULA_CEOPC]
					,'nome' = EMPREGADOS.[NOME]
					,'nomeAtividade' = ATIVIDADE.[NOME_ATIVIDADE]
					,'dataEnvioPesquisa' = PESQUISAS.[DATA_ENVIO]
					,'observacaoCeopc' = ATENDIMENTO.[OBSERVACAO_CEOPC]
					,'unidadeDemandante' = ATENDIMENTO.[UNIDADE_DEMANDANTE]
					,'dataRespostaPesquisa' = PESQUISAS.[DATA_RESPOSTA]
					,'notaCordialidade' = PESQUISAS.[NOTA_CORDIALIDADE]
					,'notaDominio' = PESQUISAS.[NOTA_DOMINIO]
					,'notaTempestividade' = PESQUISAS.[NOTA_TEMPESTIVIDADE]
					,'feedbackAtendido' = PESQUISAS.[FEEDBACK_ATENDIDO]
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS] AS PESQUISAS
					INNER JOIN tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO AS ATENDIMENTO ON PESQUISAS.[ID_REGISTRO_ATENDIMENTO] = ATENDIMENTO.[ID]
					INNER JOIN tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES AS ATIVIDADE ON ATENDIMENTO.[ITEM_LISTA_ATIVIDADES] = ATIVIDADE.[ID]
					LEFT JOIN [EMPREGADOS] AS EMPREGADOS ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE
					PESQUISAS.[DATA_ENVIO] >= @PERIODO_INICIAL
					AND PESQUISAS.[DATA_RESPOSTA] IS NOT NULL
				ORDER BY
					LOTE DESC
					, EMPREGADOS.[NOME]"
			);
			// return json_encode($selectFeedbackAtendidosGeral, JSON_UNESCAPED_SLASHES);
			return $selectFeedbackAtendidosGeral;	
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

	public function feedbackAtendidosAssistente($matricula)
	{
		$sql = new Sql();

		try
		{
			$selectFeedbackAtendidosGeral = $sql->select
			(
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME
				
				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				
				SELECT 
					'LOTE' = CONCAT(DATEPART(YEAR,[DATA_ENVIO]),'/', RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ENVIO])), 2))
					,'matriculaCeopc' = ATENDIMENTO.[MATRICULA_CEOPC]
					,'nome' = EMPREGADOS.[NOME]
					,'nomeAtividade' = ATIVIDADE.[NOME_ATIVIDADE]
					,'dataEnvioPesquisa' = PESQUISAS.[DATA_ENVIO]
					,'observacaoCeopc' = ATENDIMENTO.[OBSERVACAO_CEOPC]
					,'unidadeDemandante' = ATENDIMENTO.[UNIDADE_DEMANDANTE]
					,'dataRespostaPesquisa' = PESQUISAS.[DATA_RESPOSTA]
					,'notaCordialidade' = PESQUISAS.[NOTA_CORDIALIDADE]
					,'notaDominio' = PESQUISAS.[NOTA_DOMINIO]
					,'notaTempestividade' = PESQUISAS.[NOTA_TEMPESTIVIDADE]
					,'feedbackAtendido' = PESQUISAS.[FEEDBACK_ATENDIDO]
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS] AS PESQUISAS
					INNER JOIN tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO AS ATENDIMENTO ON PESQUISAS.[ID_REGISTRO_ATENDIMENTO] = ATENDIMENTO.[ID]
					INNER JOIN tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES AS ATIVIDADE ON ATENDIMENTO.[ITEM_LISTA_ATIVIDADES] = ATIVIDADE.[ID]
					LEFT JOIN [EMPREGADOS] AS EMPREGADOS ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
				WHERE
					PESQUISAS.[DATA_ENVIO] >= @PERIODO_INICIAL
					AND PESQUISAS.[DATA_RESPOSTA] IS NOT NULL
					AND ATENDIMENTO.[MATRICULA_CEOPC] = :MATRICULA
				ORDER BY
					LOTE DESC
					, EMPREGADOS.[NOME]"
				,
				array
				(
					':MATRICULA'=>$matricula
				)
			);
			// return json_encode($selectFeedbackAtendidosGeral, JSON_UNESCAPED_SLASHES);
			return $selectFeedbackAtendidosGeral;	
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

	public function contagemAtendimentosRotinaPorNomeDeAtividade()
	{
		$sql = new Sql();

		try
		{
			$contagemAtendimentosRotina = $sql->select
			(
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME
				
				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				
				SELECT
					'lote' = CONCAT(DATEPART(YEAR,REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO]), '/', RIGHT('0' + RTRIM(DATEPART(MONTH,REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO])), 2))
					,'nomeRotina' = LISTA_ATIVIDADES.NOME_ATIVIDADE
					,'quantidade' = COUNT(LISTA_ATIVIDADES.NOME_ATIVIDADE)
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS REGISTRO_ATENDIMENTO INNER JOIN [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES] AS LISTA_ATIVIDADES ON REGISTRO_ATENDIMENTO.[ITEM_LISTA_ATIVIDADES] = LISTA_ATIVIDADES.[ID]
				WHERE 
					REGISTRO_ATENDIMENTO.[ROTINA] IS NOT NULL
					AND REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO] >= @PERIODO_INICIAL
				GROUP BY 
					CONCAT(DATEPART(YEAR,REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO]), '/', RIGHT('0' + RTRIM(DATEPART(MONTH,REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO])), 2))
					,LISTA_ATIVIDADES.NOME_ATIVIDADE
				ORDER BY 
					lote DESC
					, quantidade desc"
			);
			// return json_encode($contagemAtendimentosRotina, JSON_UNESCAPED_SLASHES);
			return $contagemAtendimentosRotina;	
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

	public function contagemAtendimentosConsultoriaPorNomeDeAtividade()
	{
		$sql = new Sql();

		try
		{
			$contagemAtendimentosConsultoria = $sql->select
			(
				"DECLARE @MES_ANTERIOR AS INT
				DECLARE @PERIODO_INICIAL AS DATETIME
				
				SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
				
				SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
											WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
											ELSE GETDATE()
										END
				
				SELECT
					'lote' = CONCAT(DATEPART(YEAR,REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO]), '/', RIGHT('0' + RTRIM(DATEPART(MONTH,REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO])), 2))
					,'nomeConsultoria' = LISTA_ATIVIDADES.NOME_ATIVIDADE
					,'quantidade' = COUNT(LISTA_ATIVIDADES.NOME_ATIVIDADE)
				FROM 
					[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS REGISTRO_ATENDIMENTO INNER JOIN [tbl_ATENDIMENTO_WEB_LISTA_ATIVIDADES] AS LISTA_ATIVIDADES ON REGISTRO_ATENDIMENTO.[ITEM_LISTA_ATIVIDADES] = LISTA_ATIVIDADES.[ID]
				WHERE 
					REGISTRO_ATENDIMENTO.[CONSULTORIA] IS NOT NULL
					AND REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO] >= @PERIODO_INICIAL
				GROUP BY 
					CONCAT(DATEPART(YEAR,REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO]), '/', RIGHT('0' + RTRIM(DATEPART(MONTH,REGISTRO_ATENDIMENTO.[DATA_ATENDIMENTO])), 2))
					,LISTA_ATIVIDADES.NOME_ATIVIDADE
				ORDER BY 
					lote DESC
					,quantidade DESC"
			);
			// return json_encode($contagemAtendimentosConsultoria, JSON_UNESCAPED_SLASHES);
			return $contagemAtendimentosConsultoria;	
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