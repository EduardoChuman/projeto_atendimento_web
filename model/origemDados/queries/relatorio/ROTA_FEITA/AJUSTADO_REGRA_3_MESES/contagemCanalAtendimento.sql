/****** Script for SelectTopNRows command from SSMS  ******/
DECLARE @MES_ANTERIOR_INT AS INT
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
    'MÊS' = RIGHT('0' + RTRIM(DATEPART(MONTH, GETDATE())), 2)
	,'TELEFONE' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
	,'LYNC' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
	,'E-MAIL' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH, [DATA_ATENDIMENTO]) = MONTH(GETDATE()))
FROM 
	[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
WHERE
	DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,GETDATE())
GROUP BY 
	DATEPART(MONTH,[DATA_ATENDIMENTO])

UNION

SELECT 
    'MÊS' = DATEPART(MONTH, DATEADD(MONTH, -1, GETDATE()))
	,'TELEFONE' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@MES_ANTERIOR_DATE))
	,'LYNC' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@MES_ANTERIOR_DATE))
	,'E-MAIL' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@MES_ANTERIOR_DATE))
FROM 
	[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
WHERE
	DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@MES_ANTERIOR_DATE)
GROUP BY 
	DATEPART(MONTH, DATEADD(MONTH, -1, [DATA_ATENDIMENTO]))

UNION

SELECT 
    'MÊS' = DATEPART(MONTH, DATEADD(MONTH, -2, GETDATE()))
	,'TELEFONE' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'TELEFONE' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE))
	,'LYNC' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'LYNC' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE))
	,'E-MAIL' = (SELECT COUNT([CANAL_ATENDIMENTO]) FROM [tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO] WHERE [CANAL_ATENDIMENTO] = 'EMAIL' AND DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE))
FROM 
	[tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO]
WHERE
	DATEPART(MONTH,[DATA_ATENDIMENTO]) = DATEPART(MONTH,@DOIS_MESES_ANTES_DATE)
GROUP BY 
	DATEPART(MONTH, DATEADD(MONTH, -2, [DATA_ATENDIMENTO]))

