<?php
	class veiculoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
				
		//Cadastrar Veículo
		
		public function inserir($veiculo)
		{
			$sql = "INSERT INTO veiculo(id_usuario, status_veic, marca, placa) VALUES(?,?,?,?)";
			
			try
			{
				$f = $this->db->prepare($sql);	
				$f->bindValue(1, $veiculo->getUsuario()->getId());
				$f->bindValue(2, $veiculo->getStatus());
				$f->bindValue(3, $veiculo->getMarca());				
				$f->bindValue(4, $veiculo->getPlaca());								
				$ret = $f->Execute();				
				$this->db = null;				
				if(!$ret)
				{
					die("Erro ao inserir Veículo");
				}
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}		
		
		
		//Listar veículos
		
		public function buscarTodas()
		{
			$sql = "SELECT id_veiculo, status_veic, marca, placa, nome FROM veiculo INNER JOIN usuario ON (veiculo.id_usuario = usuario.id_usuario)";
			
			try
			{
				//prepra a frase sql para ser executada
				
				$f = $this->db->prepare($sql);
				
				// Executa a frase no banco
				
				$ret = $f->execute();
				
				if(!$ret)
				{
					die("Erro ao buscar todos os veículos");
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
		
		
		//Excluir Veículo
		
		function excluir($veiculo)
		{
			$sql = "DELETE FROM veiculo WHERE id_veiculo = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $veiculo->getId());
				$ret =$stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao excluir veiculo");
				}
			}//try
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}//catch
		}//function
		
		//alterar veiculo
		
		public function alterar($veiculo)
		{
			$sql="UPDATE veiculo SET id_usuario=?, status_veic=?, marca=?, placa=? WHERE id_veiculo = ?";
			
			try
			{
				$f = $this->db->prepare($sql);	
				$f->bindValue(1, $veiculo->getUsuario()->getId());				
				$f->bindValue(2, $veiculo->getStatus());
				$f->bindValue(3, $veiculo->getMarca());				
				$f->bindValue(4, $veiculo->getPlaca());	
				$f->bindValue(5, $veiculo->getId());
				
				$ret = $f->Execute();
				$this->db = null;
				
				if(!$ret)
				{
					die("Erro ao atualizar veículo");
				}
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
	
	
	//buscar um
		
		public function buscarUm($veiculo)
		{
			$sql = "SELECT * FROM veiculo where id_veiculo = ?";
			try
			{
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(1, $veiculo->getId());
			$stmt->execute();
			$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
			$this->db = null;
			return $resultado;
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}
		}
		
		
	//Select de placas
	
	public function busca_placas()
		{
			$sql = 	" SELECT id_veiculo, placa from veiculo ";
			
			try
			{						
				$f = $this->db->prepare($sql);				
				$ret = $f->execute();									
				if(!$ret)
				{
					die("Erro ao Buscar Placa");
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
		
	}//class
	
?>