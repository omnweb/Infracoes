<!-- Cabeçalho-->
	
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">

	   <div class="navbar-header">
		   <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#elementoCollapse1">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand"> Leva&traz <small>Transportadora</small></a>                    
	   </div>
		<div class="collapse navbar-collapse" id="elementoCollapse1">                    
		   <ul class="nav navbar-nav">
			  <?php							  
				require_once "auto.php";
				if(!isset($_SESSION))
				{										
					session_start();
				}									
				if(isset($_SESSION["perfil"]))
				{															
						foreach($_SESSION["menu"] as $dado)
						{
							echo"<li><a href='{$dado->link}'><strong>".utf8_encode($dado->nome)."</strong></a></li>";
						}
						echo "<li><a href='denunciar.php'> <strong>Denunciar</strong></a></li>";
						echo "<li><a href='sair.php'> <i class='fa fa-sign-out' aria-hidden='true'></i> <strong>Sair</strong></a></li>";						
				}
				else
				{		
					echo "<li><a href='denunciar.php'> <strong>Denunciar</strong></a></li>";	
					echo "<li><a href='login.php'> <i class='fa fa-sign-in' aria-hidden='true'></i></i> <strong>Entrar</strong></a></li>";
									
				}		
			?>                      
		   </ul>                    
		   <form class="navbar-form  navbar-right" role="search">
			   <div class="row">                          
				  <div class="col-lg-12">
					<div class="input-group">
					  <input type="text" class="form-control" placeholder="Buscar por...">
					  <span class="input-group-btn">
						<button class="btn btn-default" type="button">
							 <span><i class="fa fa-search" aria-hidden="true"></i></span>
						</button>
					  </span>
					</div><!-- /input-group -->
				  </div><!-- /.col-lg-6 -->                           
				</div><!-- /.row -->                         
		   </form>  <!-- /form -->    				   
		</div><!-- /.collapse -->   
	</div>  <!-- /.container-fluid --> 				
</nav>  <!-- /.navbar--> 
				
			