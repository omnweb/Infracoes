<?php
	class usuario
	{
		private $id;
		private $status;
		private $nome;
		private $email;
		private $senha;
		private $perfil;
		
		public function __construct($id="", $status="",$nome="", $email="", $senha="", $perfil="")
		{
			$this->id = $id;
			$this->status = $status;
			$this->nome = $nome;
			$this->email = $email;
			$this->senha = $senha;
			$this->perfil = $perfil;
		}//construct
		
		public function getId()
		{
			return $this->id;
		}			
		public function getStatus()
		{
			return $this->status;
		}
		public function getNome()
		{
			return $this->nome;
		}

		public function getEmail()
		{
			return $this->email;
		}
		
		public function getSenha()
		{
			return $this->senha;
		}
		public function getPerfil()
		{
			return $this->perfil;
		}
		
		
		//set 
		
		/*public function setId($id)
		{
			$this->id = $id;
		}
		public function setStatus($status)
		{
			$this->status = $status;
		}
		public function setNome($nome)
		{
			$this->nome = $nome;
		}
		public function setEmail($email)
		{
			$this->email = $email;
		}
		public function setSenha($senha)
		{
			$this->senha = $senha;
		}
		*/
		public function setPerfil($perfil)
		{
			$this->perfil = $perfil;
		}		
	}//class
?>