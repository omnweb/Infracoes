<?php
	class veiculo
	{
		private $id;
		private $status;
		private $marca;		
		private $placa;	
		private $usuario;		
		
		function __construct($id=null, $status=null,$marca=null, $placa=null,$usuario=null)
		{
			$this->id = $id;
			$this->status = $status;
			$this->marca = $marca;			
			$this->placa = $placa;
			$this->usuario = $usuario;			

		}//construct
		function getId()
		{
			return $this->id;
		}
		function getStatus()
		{
			return $this->status;
		}
		function getMarca()
		{
			return $this->marca;
		}		
		function getPlaca()
		{
			return $this->placa;
		}	
		function getUsuario()
		{
			return $this->usuario;
		}
		function SetUsuario($usuario)
		{
			$this->usuario = $usuario;
		}
	}//class
?>