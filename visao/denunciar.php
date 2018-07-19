<!doctype html>
<html lang="pt-BR">
	<head>
		
		<meta name="description" content="Denunciar"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
		<meta charset="UTF-8"/>
		<title>Denunciar</title>
		<link rel="stylesheet" href="../estilo/bootstrap.css">
		<link rel="stylesheet" href="../estilo/estilo.css">		
		<link  type="text/css" rel="stylesheet" href="../estilo/font-awesome/css/font-awesome.min.css">	
		<script type="text/javascript" src="../lib/jquery.js"></script>
		<script type="text/javascript" src="../lib/bootstrap.js"></script>	
	</head>
	<body >		
		<section class="container">	
			<div class="row">
				<div class="col-xs-12">
						<header >
							<?php include"cabec.php"?>
						</header>
						<article id="box-banner">												
							<p id="p1">	FAÇA SUA <br>DENÚNCIA </p>
							<p id="p2"> Ajude-nos a tornar o trânsito mais seguro.</p >
							<a href="denuncia.php?oper=I" ><button role="button" class="btn btn-primary btn-lg" id="botao-banner"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Denunciar</button></a>
						</article>		
				</div>
			</div>
		</section>
		<footer >
			<?php
			include"footer.html";
			?>
		</footer>	
	</body>
</html>