<?php

	abstract class conexao {
		protected $db;
		
		protected function __construct()
		{
			//qual banco sera utilizado=mysql
			//nome do servidor onde está o banco de dados = localhost
			//nome do banco de dados = loja

			$dc="mysql:host=localhost;dbname=infracoes";
			try
			{
				$this->db = new PDO($dc, "root", "");
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}
		}
	}
?>


