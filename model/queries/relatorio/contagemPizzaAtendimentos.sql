/****** Script for SelectTopNRows command from SSMS  ******/

-- Pizza de Atendimento (Rotina e Consultoria)
SELECT 
    'MÊS' = DATEPART(MONTH,ATENDIMENTO.[DATA_ATENDIMENTO])
	,'ROTINA' = COUNT(ATENDIMENTO.[TIPO_ATENDIMENTO])
	,'CONSULTORIA' = (SELECT COUNT([TIPO_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [TIPO_ATENDIMENTO] = 'ATIVIDADE')
FROM 
	[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] AS ATENDIMENTO 
	INNER JOIN [EMPREGADOS] ON CONVERT(BIGINT,REPLACE(ATENDIMENTO.MATRICULA_CEOPC, 'c', '')) = EMPREGADOS.[MATRICULA]
WHERE 
	DATEPART(YEAR,ATENDIMENTO.[DATA_ATENDIMENTO]) >= YEAR(GETDATE())
	-- Filtro para retornar os últimos três meses
	--AND DATEPART(MONTH, [DATA_ATENDIMENTO]) BETWEEN (MONTH(GETDATE())-3) AND MONTH(GETDATE())
GROUP BY 
	MONTH(ATENDIMENTO.[DATA_ATENDIMENTO])
