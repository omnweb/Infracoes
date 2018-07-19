<?php
	class UsuarioDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		//login
		
		public function login($user)
		{
			$sql = "SELECT id_perfil, id_usuario FROM usuario WHERE email = ? && senha = ?";
			try
			{						
				$f = $this->db->prepare($sql);
				$f->bindValue(1, $user->getEmail());
				$f->bindValue(2, $user->getSenha());
				$ret = $f->execute();	
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao validar usuario/senha");
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
		
		//Cadastrar Usuario
		
		public function cadastrarUsuario($user)
		{
			$sql = "INSERT INTO usuario(id_perfil, status_user, nome, email, senha) VALUES(?,?,?,?,?)";
			
			try
			{
				$f = $this->db->prepare($sql);	
				$f->bindValue(1, $user->getId());
				$f->bindValue(2, $user->getStatus());
				$f->bindValue(3, $user->getNome());
				$f->bindValue(4, $user->getEmail());
				$f->bindValue(5, $user->getSenha());				
				$ret = $f->Execute();
				
				$this->db = null;
				
				if(!$ret)
				{
					die("Erro ao inserir Usuário");
				}
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}		
				
		//Lista Usuários
		
		public function buscarTodas()
		{
			$sql = "SELECT usuario.*, descritivo FROM usuario, perfil where usuario.id_perfil = perfil.id_perfil";
			
			try
			{
				//prepra a frase sql para ser executada
				
				$f = $this->db->prepare($sql);
				
				// Executa a frase no banco
				
				$ret = $f->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos os usuarios");
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
		
		//Preenche select de motorista
		
		public function buscarMotorista()
		{
			$sql = "SELECT * FROM usuario WHERE id_perfil =2 AND status_user=1";
			
			try
			{
				//prepra a frase sql para ser executada
				
				$f = $this->db->prepare($sql);
				
				// Executa a frase no banco
				
				$ret = $f->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos os usuarios");
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
		
		//excluir usuário
		
		public function excluir($user)
		{
			$sql = "DELETE FROM usuario WHERE id_usuario = ?";
			
			try
			{
				$f = $this->db->prepare($sql);
				$f->bindValue(1, $user->getId());				
				$ret = $f->Execute();
				$this->db = null;				
				if(!$ret)
				{
					die("Erro ao excluir usuário");
				}
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		//alterar Usuario
		
		public function alterar($user)
		{
		//var_dump($user);
			$sql="UPDATE usuario SET id_perfil=?, status_user=?, nome=?, email=?, senha=? WHERE id_usuario = ?";
			
			try
			{
				$f = $this->db->prepare($sql);
				$f->bindValue(1, $user->getPerfil());
				$f->bindValue(2, $user->getStatus());
				$f->bindValue(3, $user->getNome());
				$f->bindValue(4, $user->getEmail());
				$f->bindValue(5, $user->getSenha());
				$f->bindValue(6, $user->getId());
				
				$ret = $f->Execute();
				$this->db = null;
				
				if(!$ret)
				{
					die("Erro ao atualizar usuário");
				}
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}			
		}
		
		//buscar um
		
		public function buscarUm($user)
		{
			$sql = "SELECT * FROM usuario where id_usuario = ?";
			try
			{
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(1, $user->getId());
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
		
		
		//Esqueceu senha
		
		function esqueceuSenha($usuario)
		{
			
			$sql = "SELECT nome, senha FROM usuario WHERE email = ?";
			try
			{
				//preparar frase
				$com = $this->db->prepare($sql);
				$com->bindValue(1, $usuario->getEmail());
				$retorno = $com->execute();
				$this->db = null;
				if(!$retorno)
					echo "Erro ao Buscar um Usuários";
				else
				{
					$resultado = $com->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}			
		}
		
		
	}//class
?>