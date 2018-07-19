<!doctype html>
<html lang="pt-BR">
	<head>		
		<meta name="description" content="Ranking usuário"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>		
		<meta charset="UTF-8"/>
		<title>Ranking</title>
		<link rel="stylesheet" href="../estilo/bootstrap.css">
		<link rel="stylesheet" href="../estilo/estilo.css">
		<link  type="text/css" rel="stylesheet" href="../estilo/font-awesome/css/font-awesome.min.css">	
		<script type="text/javascript" src="../lib/jquery.js"></script>
		<script type="text/javascript" src="../lib/bootstrap.js"></script>	
	</head>
	<body >	 
	<header>
		<?php
			include "cabec.php";
		?>
	</header>			 
	<div class="container" >
        <div class="row">
            <div class="col-xs-12">
				<form method="POST" action="#" class="form1">	
					<div class="panel panel-info">
						<div class="panel-heading"><strong>Ranking de Infrações</strong></div>
						<div class="panel-body"> 		  
							<div class="table-responsive " >
								<table cellspacing="0" summary="Tabela de Categorias" class="table table-striped table-bordered table-default table-hover  tablesorter" cellspacing="0" summary="Tabela de Categorias" id="tabcat">
									<thead>
										<tr class="active">
											<th>Motorista</th>
											<th>Infrações</th>
											 <th>Pontuação</th>
											
										</tr>                        
									</thead>
									<tbody>
										  <?php
											//buscar os registros no banco de dados
											require_once'auto.php';
											$infracoes="";
											$denuncia = new denuncia();
											$denunciaDAO = new denunciaDAO();
											$retorno = $denunciaDAO->ranking($denuncia);									
											// mostrar registro em forma de tabela
											foreach($retorno as $dado)
											{
											
												echo"<tr><td>".utf8_encode($dado->nome)."</td><td>{$dado->infracoes}</td><td>{$dado->pontuacao}</td></tr>";
																							
											}			
										  ?>
									</tbody> 
								</table>
								<br/>
							</div>
						</div>				
					</div>
				</form>
			</div>
		</div>	
	</div>
	<footer>
	<?php 
		include"footer.html";
	?>
	</footer>	
</body>
</html>


  
  