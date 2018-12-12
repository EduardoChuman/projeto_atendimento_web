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


}