
<!doctype html>
<html lang="pt-BR">
	<head>
		
		<meta name="description" content="index"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
		<meta charset="UTF-8"/>
		<title>index</title>
		<link rel="stylesheet" href="../estilo/bootstrap.min.css">
		<link rel="stylesheet" href="../estilo/estilo.css">
		<link  type="text/css" rel="stylesheet" href="../estilo/font-awesome/css/font-awesome.min.css">
		<script type="text/javascript" src="../lib/jquery.js"></script>
		<script type="text/javascript" src="../lib/bootstrap.js"></script>	
		<script>
			// Carousel Auto-Cycle
			  $(document).ready(function() {
				$('.carousel').carousel({
				  interval: 6000
				})
			  });
		</script>
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
						<div id="margin-top">
							<div class="container-fluid-2" >
								<div class="row-fluid">
									<div class="span12" >

										<div class="page-header" >
											<h3>LEVA&TRAZ</h3>
											<p>Transportadora</p>
										</div>
											
										<div class="carousel slide" id="myCarousel">
											<div class="carousel-inner">
									 
												<div class="item active">
												
													<div class="bannerImage">
														<a href="#"><img src="../img/veiculo1.jpg" alt=""></a>
													</div>
																
													<div class="caption row-fluid">
														<div class="span4"><h3>Entrega com segurança</h3>
														
														</div>                	
														<div class="span8"><h4>Entrega garantida e dentro do prazo</h4>
														</div>
													</div>
																							 
												</div><!-- /Slide1 --> 

												<div class="item">
												
													<div class="bannerImage">
														<a href="#"><img src="../img/veiculo2.jpg" alt=""></a>
													</div>
																
													<div class="caption row-fluid">
														<div class="span4"><h3>Controle de qualidade dos motoristas</h3>
														
														</div>                	
														<div class="span8"><h4> Ferramentas de controle para fornecer o melhor profissional disponível.</h4>
														</div>
													</div>
																							 
												</div><!-- /Slide2 -->             

												<div class="item">
												
													<div class="bannerImage">
														<a href="#"><img src="../img/veiculo4.jpg" alt=""></a>
													</div>
																
													<div class="caption row-fluid">
														<div class="span4"><h3>Nosso cliente em primeiro lugar</h3>
														
														</div>                	
														<div class="span8"><h4>Entregamos em todo território nacional</h4>
														</div>
													</div>
																							 
												</div><!-- /Slide2 -->                      
									 
											</div>
											
											<div class="control-box">                            
												<a data-slide="prev" href="#myCarousel" class="carousel-control left">‹</a>
												<a data-slide="next" href="#myCarousel" class="carousel-control right">›</a>
											</div><!-- /.control-box -->   
																  
										</div><!-- /#myCarousel -->
											
									</div><!-- /.span12 -->          
								</div><!-- /.row --> 
							</div><!-- /.container -->
						</div>
					</div>
				</div>	
			</section>
		</article>
		<footer>
			<?php
				include "footer.html";
			?>
		</footer>
	</body>
	
</html>
