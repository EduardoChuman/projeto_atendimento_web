-- Essa query faz o levantamento de pesquisas enviadas e respondidas nos ultimos tr�s meses
SELECT 
	'MES' = RIGHT('0' + RTRIM(DATEPART(MONTH,PESQUISAS.[DATA_ENVIO])), 2)
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
	DATEPART(YEAR, [DATA_ENVIO]) >= 2018
GROUP BY 
	DATEPART(MONTH, PESQUISAS.[DATA_ENVIO])
	,DATEPART(YEAR, PESQUISAS.[DATA_ENVIO])
	,ATENDIMENTO.[MATRICULA_CEOPC]
	,EMPREGADOS.[NOME]
ORDER BY 
	DATEPART(MONTH, PESQUISAS.[DATA_ENVIO])
	,DATEPART(YEAR, PESQUISAS.[DATA_ENVIO])