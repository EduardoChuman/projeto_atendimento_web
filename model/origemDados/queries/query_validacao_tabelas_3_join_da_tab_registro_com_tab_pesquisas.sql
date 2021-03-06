/****** Script for SelectTopNRows command from SSMS  ******/
SELECT TOP 1000 PESQUISAS.[ID]
	,ATENDIMENTOS.MATRICULA_CEOPC
      ,PESQUISAS.[DATA_ENVIO]
      ,PESQUISAS.[ID_REGISTRO_ATENDIMENTO]
      ,PESQUISAS.[DATA_RESPOSTA]
      ,PESQUISAS.[NOTA_CORDIALIDADE]
      ,PESQUISAS.[NOTA_DOMINIO]
      ,PESQUISAS.[NOTA_TEMPESTIVIDADE]
	  ,ATENDIMENTOS.OBSERVACAO_CEOPC
      ,PESQUISAS.FEEDBACK_ATENDIDO
      ,PESQUISAS.[MATRICULA_ENTREVISTADO]
FROM [SP5459_DES].[dbo].[tbl_ATENDIMENTO_WEB_REGISTRO_PESQUISAS] AS PESQUISAS
INNER JOIN tbl_ATENDIMENTO_WEB_REGISTRO_ATENDIMENTO AS ATENDIMENTOS ON PESQUISAS.ID_REGISTRO_ATENDIMENTO = ATENDIMENTOS.ID