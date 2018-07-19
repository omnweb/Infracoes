<!doctype html>
<html lang="pt-BR">
	<head>		
		<meta name="description" content="cadastro usuário"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>		
		<meta charset="UTF-8"/>
		<title>Lista veículo</title>
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
						<div class="panel-heading"><strong>Veículos cadastrados</strong></div>
						<div class="panel-body">			   
							<div class="table-responsive" >							
								<table cellspacing="0" summary="Tabela de Categorias" class="table table-striped table-bordered table-default table-hover  tablesorter" cellspacing="0" summary="Tabela de Categorias" id="tabcat">
									<thead>
										<tr class="active">                                    
											 <th>Status</th>
											 <th>Marca</th>											
											 <th>Placa</th>
											 <th>Proprietário</th>
											 <th>Alterar</th>
											 <th>Excluir</th>
										</tr>                        
									</thead>
									<tbody>
										  <?php
											//buscar os registros no banco de dados
											require_once'auto.php';
											$veiculoDAO = new veiculoDAO();
											$retorno = $veiculoDAO->buscarTodas();
											
											// mostrar registro em forma de tabela
											foreach($retorno as $dado)
											{
												if($dado->status_veic == 1)
											{
												$status1 = "Ativo";
											}
											else
											{
												$status1 = "Inativo";
											}
												echo"<tr><td>{$status1}</td><td>{$dado->marca}</td><td>{$dado->placa}</td><td>{$dado->nome}</td>";
													echo"<td><a href='cadastro.veiculo.php?oper=A&id={$dado->id_veiculo}'><img src='../figuras/edit-page-blue.gif' title='Alterar'></a></td>";
													
										  ?>
													   &nbsp; &nbsp;<td><a href='cadastro.veiculo.php?oper=E&id=<?php echo $dado->id_veiculo?>' onclick="return confirm('Deseja Excluir?')"><img src='../figuras/delete-page-blue.gif' title='Excluir'></a></td></tr>
										  <?php					
											}			
										  ?>
									</tbody> 
								</table>
								<br/>
								<p><a href="cadastro.veiculo.php?oper=I" class="btn btn-primary">Cadastrar novo veículo</a></p>
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


  
  