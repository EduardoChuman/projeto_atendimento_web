-- QUERY PARA INCLUIR QUEM É NOVO NA UNIDADE NA TABELA tbl_CEOPC_EMPREGADO
INSERT INTO [tbl_CEOPC_EMPREGADO]
	(
		[MATRICULA]
		, [DV] 
	)
	(
		SELECT ACESSA.[MATRICULA], EMPREGADOS.[DV_MATRICULA] FROM [EMPREGADOS] AS EMPREGADOS INNER JOIN [tbl_ACESSA_EMPREGADO] AS ACESSA ON EMPREGADOS.[MATRICULA] = CONVERT(BIGINT,REPLACE(ACESSA.[MATRICULA], 'c', ''))  WHERE [CODIGO_UNIDADE_LOTACAO_ADMINISTRATIVA] = '5459' --OR [CODIGO_UNIDADE_LOTACAO_FISICA] = '5459'
		EXCEPT
		SELECT [MATRICULA], [DV] FROM [tbl_CEOPC_EMPREGADO]
	)

-- QUERY PARA REMOVER DA TABELA tbl_CEOPC_EMPREGADO QUEM JÁ SAIU DA UNIDADE
DELETE 
FROM 
	[tbl_CEOPC_EMPREGADO] 
WHERE 
	[MATRICULA] IN
		(
			SELECT [MATRICULA] FROM [tbl_CEOPC_EMPREGADO]
			EXCEPT
			SELECT ACESSA.[MATRICULA] FROM [EMPREGADOS] AS EMPREGADOS INNER JOIN [tbl_ACESSA_EMPREGADO] AS ACESSA ON EMPREGADOS.[MATRICULA] = CONVERT(BIGINT,REPLACE(ACESSA.[MATRICULA], 'c', ''))  WHERE [CODIGO_UNIDADE_LOTACAO_ADMINISTRATIVA] = '5459' --OR [CODIGO_UNIDADE_LOTACAO_FISICA] = '5459'
		)