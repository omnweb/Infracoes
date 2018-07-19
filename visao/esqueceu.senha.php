<?php
include_once"phpmailer/config.php";
require_once "auto.php";
if($_POST)
{
	
	$email = $_POST["email"];
	
	
		//verificar se o email digitado pertence a um usuário do site
		//se for usuário enviar a senha para o email digitado. Isso não é usual. É apenas um exemplo.
		$usuario = new usuario(null, null, null, $email);
		$usuDAO = new usuarioDAO();
		$ret = $usuDAO->esqueceuSenha($usuario);		
		if(count($ret) > 0)
		{
		
		$assunto = 'Pedido para redefinir senha de acesso';
		date_default_timezone_set("America/Sao_Paulo");//definir a região da Hora
		$data = date("d/m/Y H:i");
		$titulo    = 'Neto Matiazi ';
		$email_adm = 'netomatiazi@hotmail.com.com';
		// Mensagem de texto para o remetente //
		$mensagem = "
				Recebemos um pedido para redefinir senha em nosso sistema.
				<br />
				A sua  senha é: ".$ret[0]->senha ."
				<br>
					Atenciosamente: <strong>$titulo</strong>
				<br />
				Enviado em: $data";
				// Envia a mensagem para o remetente
				if(sendMail($assunto, $mensagem, $email_adm, $titulo, $email, $email))
				{
					echo"<script> alert('Foi enviado para seu e-mail uma nova senha!');window.location.href='login.php'</script>";
				}
				else
					echo"<script> alert('Problema no envio do e-mail!')</script>";
					
		}
		else
		 echo "<script>alert('Esse e-Mail não é de um usuário da aplicação');</script>";
}
?>
<!doctype html>
<html lang="pt-BR">
	<head>		
		<meta name="description" content="cadastro usuário"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>		
		<meta charset="UTF-8"/>
		<title>Esqueci a senha</title>
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
					<article>
						<form action="#" method = "POST" id="cadastro_usuario" class="form">
							<div class="panel panel-info">
								<div class="panel-heading"><strong>Recuperação de senha</strong></div>
								<div class="panel-body">										
									<div class="col-md-2 col-xs-4">				
										<label for="email">e-Mail:</label>													
									</div>	
									<div class="col-md-10 col-xs-8"  >					
										<input class="form-control" type="text" name="email" id="email"><br/>					    					
									</div>
									<input type="submit" value="Enviar" role="button" class="btn btn-primary enviar" id="salvar"/>
									<a href="login.php" ><input type="cancel" value="Cancelar" role="button" class="btn btn-info enviar" /></a>
							
								</div>	
							</div>	
						</form>
					</article>				
				</div>
			</section>
		</article>
		<footer>
			<?php
				require_once "footer.html";
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
									 email:{
											required:true
									 }                          
							   },
					     messages:{
								   
									 email:{
											required:"Informe o email, ex: email@teste.com.br"
									 }
							   }	
					});
					});
			});
		</script>
	</body>
</html>				