<?php
	require_once 'auto.php';	
	$erro=0;
	if($_POST)
	{
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
			$email= $_POST["email"];
			$senha= $_POST["senha"];
			$usuario = new usuario(null, null, null, $email, $senha);			
			$usuarioDAO = new usuarioDAO();
			$ret = $usuarioDAO->login($usuario);		
			if(count($ret) > 0)
			{
				//se for identificado
				session_start();
				$_SESSION["perfil"] = $ret[0]->id_perfil;
				$_SESSION["id"] = $ret[0]->id_usuario;
				
				// buscar as permissões de acordo com o acesso
				$perfil = new perfil($ret[0]->id_perfil);				
				$perfilDAO = new perfilDAO();
				$retorno = $perfilDAO->buscarPermissoes($perfil);				
				$_SESSION["menu"]= $retorno;				
				echo "<script>alert('Bem-Vindo!!!')</script>";
				header("location:index.php");
			}
			else
			{
				echo "<script>alert('email/senha não conferem')</script>";
			}
		}
	}
?>
<!doctype html>
<html lang="pt-BR">
	<head>		
		<meta name="description" content="login"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta charset="UTF-8"/>
		<title>Login</title>
		<link rel="stylesheet" href="../estilo/bootstrap.css">
		<link rel="stylesheet" href="../estilo/estilo.css">	
		<link  type="text/css" rel="stylesheet" href="../estilo/font-awesome/css/font-awesome.min.css">	
	</head>
	<body >
		<article class="container">
			<section class="row" >	
				<div class="col-xs-12">
					<header>
						
					</header>						
					<form action="#" method="POST" border="1"  class="form" id="login">
						<div class="panel panel-info">
							<div class="panel-heading"><strong>Página de login</strong></div>
							<div class="panel-body">									
								<div class="col-md-3 col-xs-4">					
										<label for="email">e-Mail:</label>													
								</div>	
								<div class="col-md-9 col-xs-8" >					
										<input class="form-control" type="text" name="email" id="email" required><br/>					    					
								</div>										
								<div class="col-md-3 col-xs-4">					
										<label for="senha">Senha:</label>													
								</div>	
								<div class="col-md-9 col-xs-8" >					
										<input class="form-control" type="password" name="senha" id="senha" required><br/>				    					
								</div>								
								<div class="col-xs-12">					
										<p><a href="esqueceu.senha.php" style="color:#4169E1;">Esqueci minha senha</a></p>												
								</div>
								<br/>								
								<br/>								
								<a href="#" ><input type="submit" value=" Login" role="button" class="btn btn-primary enviar" id="salvar"/></a>
								<a href="index.php" ><input type="cancel" value="Cancelar" role="button" class="btn btn-info enviar" /></a>
							</div>
						</div>				
					</form>					
				</div>	
			</section>
		</article>		
		<footer>
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
					$("#login").validate({
						 rules : {									 
									 email:{
											required:true
									 },
									 senha:{
											required:true
											
									 }                                
							   },
							   messages:{								     
									 email:{
											required:"Informe o e-Mail cadastrado"
									 },
									 senha:{
											required:"Digite uma senha cadastrada"
											
									 }    
							   }	
					});
					});
			});
		</script>
	</body>
</html>
