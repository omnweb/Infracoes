<?php
require_once 'auto.php';
	$id="";		
	$status="";
	$marca="";	
	$placa="";
	$usuario="";	
	if($_GET)
	{
		$oper = $_GET["oper"];		
		if($oper != "I"){			
			$id = (int)$_GET["id"];			
			if($oper == "A"){
				
				$veiculo = new veiculo($id);
				$veiculoDAO = new veiculoDAO();
				$retorno = $veiculoDAO->buscarUm($veiculo);
				$usuario=$retorno[0]->id_usuario;
				$status=$retorno[0]->status_veic;
				$marca=$retorno[0]->marca;				
				$placa=$retorno[0]->placa;			
			}
		}
		if($oper == "E")
		{
			//Excluir
			$veiculo = new veiculo($id);
			$veiculoDAO = new veiculoDAO();
			$veiculoDAO->excluir($veiculo);
			header("location:lista.veiculo.php");
		}
	}
	$erro=0;
	if($_POST)
	{
		if($_POST["status_veic"]=="")
		{
			echo"<script>alert('Selecione o status do veículo')</script>";
			$erro++;
		}
		if($_POST["marca"]=="")
		{
			echo"<script>alert('Preencha marca do veículo')</script>";
			$erro++;
		}		
		if($_POST["placa"]=="")
		{
			echo"<script>alert('Preencha a placa do veículo')</script>";
			$erro++;
		}
		if($_POST["nome"]=="")
		{
			echo"<script>alert('Preencha o motorista')</script>";
			$erro++;
		}
		if($erro==0)
		{
			switch ($oper)
			{
                case "I":
					//inserir no banco			
					$usuario = new usuario($_POST["nome"]);				
					$veiculo = new veiculo($id, $_POST["status_veic"], $_POST["marca"], $_POST["placa"], $usuario);					
					$veiculoDAO = new veiculoDAO();					
					$veiculoDAO->inserir($veiculo);
					
				break;
                case "A":
                    //Alterar no BD	
					$usuario = new usuario($_POST["nome"]);	
					$veiculo = new veiculo($id, $_POST["status_veic"], $_POST["marca"], $_POST["placa"], $usuario);
					$veiculoDAO = new veiculoDAO();
                    $veiculoDAO->alterar($veiculo);
                break;
    }
		header("location:lista.veiculo.php");
	}
		else
		{
			echo"<script>alert('Erro ao inserir Veículo')</script>";
		}
	}	
	

?>
<!doctype html>
<html lang="pt-BR">
	<head>		
		<meta name="description" content="cadastro veículo"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>		
		<meta charset="UTF-8"/>
		<title>Cadastro Veículo</title>
		<link rel="stylesheet" href="../estilo/bootstrap.css">
		<link rel="stylesheet" href="../estilo/estilo.css">
		<link  type="text/css" rel="stylesheet" href="../estilo/font-awesome/css/font-awesome.min.css">		
		<script type="text/javascript" src="../lib/jquery.js"></script>
		<script type="text/javascript" src="../lib/bootstrap.js"></script>	
	</head>
	<body >
	    <article class="container">
			<section class="row">
				<div class="col-xs-12">
					<header>
						<?php
							include "cabec.php";
						?>
					</header>														
						<form action="#" method="POST" id="cadastro_veiculo" class="form">
							<div class="panel panel-info">
								<div class="panel-heading"><strong>Cadastrar Veículo</strong></div>
								<div class="panel-body">
									<div class="col-md-2 col-xs-4">		
											  <label for="status">Status:</label>													
									</div>	
									<div class="col-md-10 col-xs-8" >					
										<div class="form-group" >						 
										  <select class="form-control" id="status" name="status_veic" required>
											<?php 
										  if($status == "")
										  {
										  
											echo"<option value=''>Selecione</option>
											<option value='1'>Ativo</option>
											<option value='2'>Inativo</option>	";
											}	
											else if($status == '1')
											{
											echo"<option value='1' selected>Ativo</option>
											<option value='2'>Inativo</option>	";
											}
											else if($status == '2')
											{
											echo"<option value='1' >Ativo</option>
											<option value='2' selected>Inativo</option>	";
											}
											?>										
										  </select>
										</div>					    					
									</div>														
									<div class="col-md-2 col-xs-4">					
											<label for="marca">Marca:</label>													
									</div>	
									<div class="col-md-10 col-xs-8" >					
											<input class="form-control" type="text" name="marca" id="marca" value="<?php echo $marca; ?>" required><br/>						    					
									</div>																			
									<div class="col-md-2 col-xs-4">					
											<label for="placa">Placa:</label>													
									</div>	
									<div class="col-md-10 col-xs-8" >					
											<input class="form-control" type="text" name="placa" id="placa" value="<?php echo $placa; ?>" required><br/>					    					
									</div>
									<div class="col-md-2 col-xs-4">					
									<label for="nome">Nome:</label>													
									</div>	
									<div class="col-md-10 col-xs-8" >					
										<div class="form-group" >						 
										  <select class="form-control" id="nome" name="nome" required>						    
											<?php
												if($oper == "I")
												{
													echo"<option value=''>Selecione</option>";
												}
												//carregar Motorista								
												$userDAO = new usuarioDAO();
												$ret = $userDAO->buscarMotorista();
												foreach($ret as $dado)
												{
													if($oper == "A" && $dado->id_usuario == $usuario)
														echo"<option value='{$dado->id_usuario}' selected>{$dado->nome}</option>";
													else
														echo"<option value='{$dado->id_usuario}'>{$dado->nome}</option>";
												}
												
											 ?>						
										  </select>
										</div><br>						
									</div>
									<a href="cadastro.veiculo.php" ><input type="submit" value="Cadastrar" role="button" class="btn btn-primary enviar" id="salvar"/></a>
									<a href="lista.veiculo.php" ><input type="cancel" value="Cancelar" role="button" class="btn btn-info enviar" /></a>
								</div>
							</div>
						</form>							
				</div>
			</section>
		</article>
		<footer >
			<?php 
				include"footer.html";
			?>
		</footer>
		<script type="text/javascript" src="../lib/jquery-latest.js"></script>
		<script type="text/javascript" src="../lib/jquery.validate.js"></script>
		<script type="text/javascript">
			$(function(){
			//executa quando clicar no botão Enviar
				$("#salvar").click(function(){
					//validar o formulário
					$("#cadastro_veiculo").validate({
						 rules : {
									 status_veic:{
											required:true
											
									 },
									 marca:{
											required:true,
											minlength:3
									 },									
									 placa:{
											required:true
									 },									
									 nome:{
											required:true
									 }                                
							   },
							   messages:{
								     status_veic:{
											required:"Selecione um status"
											
									 },
									 marca:{
											required:"Informe a marca do veículo",
											minlength:"O veículo deve ter pelo menos 3 caracteres"
									 },
									
									 placa:{
											required:"Digite a placa, ex: XXX-0000"
									 },
									
									 nome:{
											required:"Escolha o motorista"
									 }
     
							   }	
					});
					});
			});
		  </script>
	</body>
</html>