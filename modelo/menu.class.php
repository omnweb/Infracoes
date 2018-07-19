<?php
	class menu
	{
		private $nome;
		private $links;
		
		
		
		function __construct($nome, $link)
		{
			$this->nome = $nome;
			$this->links = $link;					
		}
		function getNome()
		{
			return $this->nome;
		}
		function getLinks()
		{
			return $this->links;
		}		
		
	}//class
?>