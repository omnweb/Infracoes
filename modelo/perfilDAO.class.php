<?php
	class perfilDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		//buscar Permissões
		
		function buscarPermissoes($perfil)
		{
			$sql = "SELECT nome, link 
					FROM menu 
					INNER JOIN acesso ON (menu.id_menu = acesso.id_menu)
					INNER JOIN perfil ON (perfil.id_perfil = acesso.id_perfil)
					WHERE menu.id_menu = acesso.id_menu AND perfil.id_perfil = ?
				   ";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $perfil->getId());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar o perfil do usuário");
				}
				else
				{
					$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}
		
		//buscar Perfil		
	
		public function buscarTodas()
		{
			$sql = "SELECT * FROM perfil";
			
			try
			{
				//prepra a frase sql para ser executada
				
				$f = $this->db->prepare($sql);
				
				// Executa a frase no banco
				
				$ret = $f->execute();
				
				if(!$ret)
				{
					die("Erro ao buscar perfís");
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