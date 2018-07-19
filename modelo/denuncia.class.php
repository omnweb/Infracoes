<?php
	class denuncia
	{
		private $id;				
		private $veiculo;
		private $infracao;
		private $datad;	
		
		function __construct($id="", $veiculo="", $infracao="",$datad="")
		{
			$this->id = $id;							
			$this->veiculo = $veiculo;
			$this->infracao= $infracao;	
			$this->datad = $datad;				

		}//construct
		function getId()
		{
			return $this->id;
		}
		function getDatad()
		{
			return $this->datad;
		}	

		function getVeiculo()
		{
			return $this->veiculo;
		}		
		function setVeiculo($veiculo)
		{
			$this->veiculo = $veiculo;
		}
			function getInfracao()
		{
			return $this->infracao;
		}		
		function setInfracao($infracao)
		{
			$this->infracao = $infracao;
		}
	}//class
?>