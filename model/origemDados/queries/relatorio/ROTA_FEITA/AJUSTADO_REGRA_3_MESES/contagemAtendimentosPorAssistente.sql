/****** Script for SelectTopNRows command from SSMS  ******/
DECLARE @MES_ANTERIOR AS INT
DECLARE @PERIODO_INICIAL AS DATETIME

SET @MES_ANTERIOR = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))

SET @PERIODO_INICIAL = CASE @MES_ANTERIOR 
							WHEN 10 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -3, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
							WHEN 11 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
							WHEN 12 THEN CONVERT(DATETIME, CONCAT(DATEPART(YEAR, DATEADD(YEAR, -1, GETDATE())), '-', RIGHT('0' + RTRIM(DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))), 2), '-', '01', ' ', '00:00:00'), 120)
							ELSE GETDATE()
						END
-- Contagem de Registro de Rotinas
SELECT 
    'MÊS' = RIGHT('0' + RTRIM(DATEPART(MONTH,[DATA_ATENDIMENTO])), 2)
    ,ATENDIMENTO.[MATRICULA_CEOPC]
	,EMPREGADOS.[NOME]
    ,'ROTINA' = COUNT(ATENDIMENTO.[ROTINA])
	,'CONSULTORIA' = COUNT(ATENDIMENTO.[CONSULTORIA])
	,'TOTAL_ATENDIMENTOS_MÊS' = COUNT(ATENDIMENTO.[CONSULTORIA]) + COUNT(ATENDIMENTO.[ROTINA])
FROM 
	[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS ATENDIMENTO 
	INNER JOIN [EMPREGADOS] ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
WHERE 
	-- Filtro para retornar os últimos três meses
	[DATA_ATENDIMENTO] >= @PERIODO_INICIAL
	--AND ATENDIMENTO.[MATRICULA_CEOPC] = :MATRICULA
GROUP BY 
	MONTH(ATENDIMENTO.[DATA_ATENDIMENTO])
	,ATENDIMENTO.[MATRICULA_CEOPC]
	,EMPREGADOS.[NOME]