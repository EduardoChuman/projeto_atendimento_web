/****** Script for SelectTopNRows command from SSMS  ******/
SELECT 
    'MATRICULA' = EMPREGADO.[MATRICULA]
	,'NOME' = NOME.[NOME]
	,'NIVEL_ACESSO' = EMPREGADO.[NIVEL_ACESSO]
	,'EVENTUAL' = EMPREGADO.[EVENTUAL]
    ,'ID_CELULA' = EMPREGADO.[ID_CELULA]
	,'NOME_CELULA' = CELULAS.[NOME_CELULA]
	,'MATRICULA_GESTOR' = CELULAS.[MATRICULA_GESTOR]
	,'NOME_GESTOR' = CELULAS.[NOME_GESTOR]    
FROM 
	[tbl_CEOPC_EMPREGADO] AS EMPREGADO
	LEFT JOIN [EMPREGADOS] AS NOME ON CONVERT(BIGINT,REPLACE(EMPREGADO.[MATRICULA], 'c', '')) = NOME.[MATRICULA]
	INNER JOIN [tbl_CEOPC_GRUPOS_CELULAS] AS CELULAS ON EMPREGADO.[ID_CELULA] = CELULAS.[ID]
WHERE 
	CELULAS.[MATRICULA_GESTOR] = 'C052617'