<?php
	class denunciaDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
				//Ranking
		
		public function ranking($denuncia)
		{
			$sql = "SELECT * FROM vw_ranking";
			
			try
			{
				//prepra a frase sql para ser executada
				
				$f = $this->db->prepare($sql);
				
				// Executa a frase no banco
				
				$ret = $f->execute();
				$this->db = null;	
				if(!$ret)
				{
					die("Erro ao buscar ranking");
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
	
		//buscar Denuncia
		
		public function buscarDenuncia()
		{
			$sql = "SELECT * from vw_denuncias";
			
			try
			{
				//prepra a frase sql para ser executada
				
				$f = $this->db->prepare($sql);
				
				// Executa a frase no banco
				
				$ret = $f->execute();
				$this->db = null;	
				if(!$ret)
				{
					die("Erro ao buscar denúncias");
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
		
		
		//Cadastrar Denúncia
		
		public function cadastrarDenuncia($denuncia)
		{
			$sql = "INSERT INTO denuncia(id_veiculo, id_infracao, datad) VALUES(?,?,?)";
			
			try
			{
				$f = $this->db->prepare($sql);					
				$f->bindValue(1, $denuncia->getVeiculo());
				$f->bindValue(2, $denuncia->getInfracao()->getId());
				$f->bindValue(3, $denuncia->getDatad());							
				$ret = $f->Execute();
				
				$this->db = null;
				
				if(!$ret)
				{
					die("Erro ao Cadastrar Denúncia");
				}
				else
				{
					echo"<script>alert('Denúncia cadastrada com sucesso')</script>";
					echo'<script>window.location="index.php";</script>';
				}
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}				
	}//class
?>