<?php
	class infracao
	{
		private $id;
		private $descritivo;
		private $pontos;
		
		
		
		function __construct($id="", $desc="", $pontos="")
		{
			$this->id =$id;
			$this->descritivo = $desc;
			$this->pontos = $pontos;			
			
		}
		function getId()
		{
			return $this->id;
		}
		function getDescritivo()
		{
			return $this->descritivo;
		}
		function getPontos()
		{
			return $this->pontos;
		}		
	}//class
?>