<?php
	class infracaoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		//buscar infracao
		
		public function buscarInfracao()
		{
			$sql = "SELECT * FROM infracao";
			
			try
			{
				//prepra a frase sql para ser executada
				
				$f = $this->db->prepare($sql);
				
				// Executa a frase no banco
				
				$ret = $f->execute();
				
				if(!$ret)
				{
					die("Erro ao buscar infrações");
				}
				else
				{
					return $retorno = $f->fetchAll(PDO::FETCH_OBJ);
				}
			}	
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}		
		
	}	
?>