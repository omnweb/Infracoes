<?php
require_once 'auto.php';
	$id=0;
	$status="";
	$nome="";
	$email="";
	$senha="";
	$perfil="";
	$oper="";
	
	if($_GET)
	{
		$oper = $_GET["oper"];		
		if($oper != "I")
		{			
			$id = (int)$_GET["id"];			
			if($oper == "A")
			{
				$user = new usuario($id);
				$userDAO = new usuarioDAO();
				$retorno = $userDAO->buscarUm($user);
				$perfil=$retorno[0]->id_perfil;
				$status=$retorno[0]->status_user;
				$nome=$retorno[0]->nome;
				$email=$retorno[0]->email;	
				$senha=$retorno[0]->senha;					
			}
		}
		if($oper == "E")
		{
			//Excluir
			$user = new usuario($id);
			$userDAO = new usuarioDAO();
			$userDAO->excluir($user);
			header("location:Lista.usuario.php");
		}
	}
	$erro=0;
	if($_POST)
	{
		if($_POST["tipo_user"]=="")
		{
			echo"<script>alert('Selecione o tipo de usuário')</script>";
			$erro++;
		}
		if($_POST["status_user"]=="")
		{
			echo"<script>alert('Selecione o status de usuário')</script>";
			$erro++;
		}
		if($_POST["nome"]=="")
		{
			echo"<script>alert('Preencha seu Nome')</script>";
			$erro++;
		}
		if($_POST["email"]=="")
		{
			echo"<script>alert('Preencha seu e-Mail')</script>";
			$erro++;
		}
		if($_POST["senha"]=="")
		{
			echo"<script>alert('Preencha sua senha')</script>";
			$erro++;
		}
		if($erro==0)
		{
			switch ($oper)
			{
                case "I":
					//inserir no banco
					$tipo= $_POST["tipo_user"];
					$status= $_POST["status_user"];
					$nome= $_POST["nome"];
					$email= $_POST["email"];
					$senha= $_POST["senha"];
					$user = new usuario($tipo, $status, $nome, $email, $senha);
					$userDAO = new usuarioDAO();
					$ret = $userDAO->cadastrarUsuario($user);
					
				break;
                case "A":
                    //Alterar no BD	
					$user = new usuario($id, $_POST["status_user"], utf8_encode($_POST["nome"]), $_POST["email"], $_POST["senha"], $_POST["tipo_user"]);
                    $userDAO = new usuarioDAO();
                    $userDAO->alterar($user);
                break;
            }
			header("location:Lista.usuario.php");
		}
		else
		{
			echo"<script>alert('Erro ao inserir Usuário')</script>";
		}
	}
	
?>
<!doctype html>
<html lang="pt-BR">
	<head>		
		<meta name="description" content="cadastro usuário"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>		
		<meta charset="UTF-8"/>
		<title>cadastro usuário</title>
		<link rel="stylesheet" href="../estilo/bootstrap.css">
		<link rel="stylesheet" href="../estilo/estilo.css">	
		<link  type="text/css" rel="stylesheet" href="../estilo/font-awesome/css/font-awesome.min.css">	
		<script type="text/javascript" src="../lib/jquery.js"></script>
		<script type="text/javascript" src="../lib/bootstrap.js"></script>	
		
	</head>
	<body >
	    <article class="container">
			<section class="row" >
				<div class="col-xs-12">
					<header>
						<?php
							include "cabec.php";
						?>
					</header>														
						<form action="#" method="POST" id="cadastro_usuario" class="form">
							<div class="panel panel-info">
								<div class="panel-heading"><strong>Cadastrar Usuário</strong></div>
								<div class="panel-body">										
								<div class="col-md-2 col-xs-4">		
									  <label for="tipo">Perfil:</label>													
								</div>	
								<div class="col-md-4 col-xs-8" >					
									<div class="form-group" >						 
										<select name="tipo_user" class="form-control " id="tipo">													
											<?php
												if($oper == "I")
												{
													echo"<option value=''>Selecione</option>";
												}
												//carregar Perfis								
												$perfilDAO = new perfilDAO();
												$ret = $perfilDAO->buscarTodas();
												foreach($ret as $dado)
												{
													if($oper == "A" && $dado->id_perfil == $perfil)
														echo"<option value='{$dado->id_perfil}' selected>" .utf8_encode($dado->descritivo). "</option>";
													else
														echo"<option value='{$dado->id_perfil}'>" .utf8_encode($dado->descritivo). "</option>";
												}
												
											?>
										</select>
									</div>					    					
								</div>					
								<div class="col-md-2 col-xs-4">		
									<label for="status">Status:</label>													
								</div>	
								<div class="col-md-4 col-xs-8" >					
									<div class="form-group" >						 
										<select name="status_user" class="form-control" id="status">
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
								<br/>					
								<div class="col-md-2 col-xs-4">					
									<label for="nome">Nome:</label>													
								</div>	
								<div class="col-md-10 col-xs-8" >					
									<input class="form-control" type="text" name="nome" id="nome" value="<?php echo $nome; ?>"><br/>						    					
								</div>		
								<br/>
								<div class="col-md-2 col-xs-4">				
									<label for="email">eMail:</label>													
								</div>	
								<div class="col-md-10 col-xs-8"  >					
									<input class="form-control" type="text" name="email" id="email" value="<?php echo $email; ?>"><br/>					    					
								</div>	
								<div id="content">
								<div class="col-md-2 col-xs-4">					
										<label for="senha">Senha:</label>													
								</div>	
								<div class="col-md-10 col-xs-8"  >					
										<input class="form-control" type="password" name="senha" id="senha" value="<?php echo $senha; ?>"><br/><br/>					    					
								</div>	
								</div>
								<a href="cadastro.usuario.php" ><input type="submit" value="Cadastrar" role="button" class="btn btn-primary enviar" id="salvar"/></a>
								<a href="lista.usuario.php" ><input type="cancel" value="Cancelar" role="button" class="btn btn-info enviar" /></a>
							
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
					$("#cadastro_usuario").validate({
						 rules : {
									 tipo_user:{
											required:true
											
									 },
									 status_user:{
											required:true											
									 },
									 nome:{
											required:true
											
									 },
									 email:{
											required:true
									 },
									 senha:{
											required:true
											
									 }                                
							   },
							   messages:{
								     tipo_user:{
											required:"Selecione o perfil de Usuário"
											
									 },
									 status_user:{
											required:"Selecione status do Usuário"
											
									 },
									 nome:{
											required:"Informe o Nome do Usuário"
									 },
									 email:{
											required:"Informe o email, ex: email@teste.com.br"
									 },
									 senha:{
											required:"Digite uma senha"
											
									 }    
							   }	
					});
					});
			});
		</script>
	</body>
</html>