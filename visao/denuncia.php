<?php
require_once 'auto.php';
	$id=0;
	$datad="";
	$veiculo="";
	$infracao="";	
	$erro=0;	
	if($_POST)
	{
		if($_POST["datad"]=="")
		{
			echo"<script>alert('Preencha a data da ocorrência')</script>";
			$erro++;
		}		
		if($_POST["veiculo"]=="")
		{
			echo"<script>alert('Digite a placa do veículo')</script>";
			$erro++;
		}
		if($_POST["infracao"]=="")
		{
			echo"<script>alert('Escolha ao menos uma infração')</script>";
			$erro++;
		}
				
		if($erro==0)
		{

			//inserir no banco	
			$infracao = new infracao($_POST["infracao"]);
			$denuncia = new denuncia($id, $_POST["veiculo"], $infracao, $_POST["datad"]);			
			$denunciaDAO = new denunciaDAO();
			$ret =$denunciaDAO->cadastrarDenuncia($denuncia);	
			
		}
		else
		{
			echo"<script>alert('Erro ao inserir Denuncia')</script>";
		}		
		
		
	}

?>
<!doctype html>
<html lang="pt-BR">
	<head>		
		<meta name="description" content="Denúncia"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta charset="UTF-8"/>
		<title>Denúncia</title>			
		<!-- Include Twitter Bootstrap and jQuery: -->
		<link rel="stylesheet" href="../estilo/bootstrap.min.css" type="text/css"/>
		<link rel="stylesheet" href="../estilo/estilo.css">	
		<link  type="text/css" rel="stylesheet" href="../estilo/font-awesome/css/font-awesome.min.css">	
		<script type="text/javascript" src="../lib/jquery.js"></script>
		<script type="text/javascript" src="../lib/bootstrap.js"></script>	
			
	</head>
	<body > 
		<article class="container">
			<section class="row"  >	
				<div class="col-xs-12">
					<header>
						<?php
							include "cabec.php";
						?>
					</header>				
					<form action="#" method="POST" border="1"  class="form" id="cadastro_denuncia">
						<div class="panel panel-info">
							<div class="panel-heading"><strong>Cadastrar Denúncia</strong></div>
							<div class="panel-body">
								<div class="col-md-2 col-xs-4">		
									  <label for="data">Data:</label>													
								</div>	
								<div class="col-md-10 col-xs-8" >					
									 <input type="date" class="form-control" name="datad"><br>			    					
								</div>														
								<div class="col-md-2 col-xs-4">		
									  <label for="placa">Veículo:</label>													
								</div>	
								<div class="col-md-10 col-xs-8">					
									<div class="form-group" >						  
									  <select class="form-control" id="placa" name="veiculo">
										<option value="">Placa</option>
										<?php
											//carregar Placa								
											$veiculoDAO = new veiculoDAO();
											$ret = $veiculoDAO->busca_placas();
											foreach($ret as $dado)
											{
												echo"<option value='{$dado->id_veiculo}'>".utf8_encode($dado->placa)."</option>";
											}
											
										 ?>				
									  </select>
									</div>
									<br/>			    					
								</div>															
								<div class="col-md-2 col-xs-4">					
									<label for="sinfracao">Infração:</label>													
								</div>	
								<div class="col-md-10 col-xs-8" >					
									<div class="form-group">						  
									 <select class="form-control" id="infracao" name="infracao">
									 <option value="">Selecione</option>
										<?php
											//carregar infracao								
											$infracaoDAO = new infracaoDAO();
											$ret = $infracaoDAO->buscarInfracao();
											foreach($ret as $dado)
											{								
													echo"<option value='{$dado->id_infracao}'>".utf8_encode($dado->descritivo)."</option>";									
											}
											
										 ?>		
									</select>
									</div>
									<br/>
									<br/>					    					
								</div>	
								<a href="denuncia.php" ><input type="submit" value="Cadastrar" role="button" class="btn btn-primary enviar" id="salvar"/></a>
								<a href="index.php" ><input type="cancel" value="Cancelar" role="button" class="btn btn-info enviar" /></a>
							</div> 
						</div>	
					</form>
				</div>										
			</section>
		</article>
		<footer >
			<?php
				include"footer.html"
			?>
		</footer>		
		<script type="text/javascript" src="../lib/jquery-latest.js"></script>
		<script type="text/javascript" src="../lib/jquery.validate.js"></script>
		<script type="text/javascript">
			$(function(){
			//executa quando clicar no botão Enviar
				$("#salvar").click(function(){
					//validar o formulário
					$("#cadastro_denuncia").validate({
						 rules : {
									 datad:{
											required:true
											
									 },									
									 veiculo:{
											required:true
											
									 },
									 infracao:{
											required:true
									 }                             
							   },
							   messages:{
								     datad:{
											required:"Informe a data do Ocorrido"
											
									 },									
									 veiculo:{
											required:"Selecione a Placa do veículo"
									 },
									 infracao:{
											required:"Selecione a infração"
									 } 
							   }	
					});
					});
			});
		</script>
	</body>
</html>
