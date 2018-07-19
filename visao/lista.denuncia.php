<!DOCTYPE html>
	<html>
	<head>
		<title>Listar Denúncia</title>
		<meta name="description" content="Listar Denúncia"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta charset="UTF-8">		
		<link  type="text/css" rel="stylesheet" href="../estilo/font-awesome/css/font-awesome.min.css">			
		<link href="../estilo/bootstrap.min.css" rel="stylesheet" media="all"> 
		<link rel="stylesheet" href="../estilo/estilo.css">  
		<script type="text/javascript" src="../lib/jquery.js"></script>
		<script type="text/javascript" src="../lib/bootstrap.js"></script>	
		
	</head>
	<body>
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
							<div class="panel-heading"><strong>Denúncias cadastradas</strong></div>
							<div class="panel-body"> 		  
								<div class="table-responsive " >
									<table cellspacing="0" summary="Tabela de Categorias" class="table table-striped table-bordered table-default table-hover  tablesorter" cellspacing="0" summary="Tabela de Categorias" id="tabcat">
										<thead>
											<tr class="active">
												<th>Motorista</th>
												 <th>Veículo</th>
												 <th>Data da Ocorrência</th>												
												<th>Infração</th>	
												<th>Pontos</th>												
											</tr>                        
										</thead>
										<tbody>
											  <?php
												//buscar os registros no banco de dados
												require_once'auto.php';
												$denunciaDAO = new denunciaDAO();
												$retorno = $denunciaDAO->buscarDenuncia();
												$denuncia1 = "";
												// mostrar registro em forma de tabela
												foreach($retorno as $dado)
												{
												
													echo"<tr><td>".utf8_encode($dado->nome)."</td><td>".utf8_encode($dado->marca)."</td><td>{$dado->datad}</td><td>".utf8_encode($dado->descritivo)."</td><td>{$dado->pontos}</td>";
																								
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
	</div>
	<footer>
		<?php
			include"footer.html";
		?>
	</footer>
	<script type="text/javascript" src="../lib/jquery-latest.js"></script>
    <script type="text/javascript" src="../lib/jquery.quicksearch.js"></script>
	<script type="text/javascript" src="../lib/jquery.tablesorter.js"></script>	
	<script type="text/javascript" id="js">
	$(document).ready(function()
	{ 
    	// extend the default setting to always include the zebra widget. 
	    $.tablesorter.defaults.widgets = ['zebra']; 
	    // extend the default setting to always sort on the first column 
	    $.tablesorter.defaults.sortList = [[0,0]]; 
	    // call the tablesorter plugin 
	    $("table").tablesorter(); 
		$("#tabcat tbody tr").quicksearch({
            labelText: 'Pesquisar: ',
            attached: '#tabcat',
            position: 'before',
            delay: 100,
            loaderText: 'Loading...',
            onAfter: function() {
                if ($("#tabcat tbody tr:visible").length != 0) {
                    $("#tabcat").trigger("update");
                    $("#tabcat").trigger("appendCache");
                    $("#tabcat tfoot tr").hide();
                }
                
            }
        });
	});
	</script>
</body>
</html>


  
  