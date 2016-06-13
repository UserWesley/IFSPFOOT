<?php

	/*Após logar, esta tela lhe dará as opções de iniciar um novo jogo ou carregar um jogo salvo.*/
	include_once '../_controller/controllerClassCarregamento.php';
?>

<!DOCTYPE html>

<html lang="PT-BR">

<head>

	<meta charset= "UTF-8"/>
	
	<title>Menu</title>
	
	<!-- Visualização Mobile" -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Incluindo Bootstrap CSS -->
	<link href="_bootstrap-3.3.6-dist/_css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<!-- Incluindo Bootstrap JavaScript-->
	<script src="_bootstrap-3.3.6-dist/_js/bootstrap.min.js"></script>
	
	<!-- Incluindo jquery-->
	<script src="_jquery/jquery.js"></script>
	
	<!-- Incluindo jquery backstretch-->
	<script src="_jquery/jquery.backstretch.min.js"></script>
	
	<!-- Incluindo js index-->
	<script src="_js/jsIndex.js"></script>
	
	<!-- Incluindo css dos elementos-->
   	<link rel="stylesheet" href="_css/form-elements.css">
   	
   	<!-- Incluindo css index-->
    <link rel="stylesheet" href="_css/style.css">

</head>

<body>
	<!-- Top content -->
	<div class="top-content">
		
	    <div class="inner-bg"style="margin-bottom: 0px; padding-bottom:0px;">
	        <div class="container">
	            
	            <div class="row" >
	                <div class="col-sm-6 col-sm-offset-3 form-box">
	                	<div class="form-top" style="margin-top:-100px;">
	                		<div class="form-top-left">
	                			<h1 class="text-center" >Jogos Salvos</h1>
	                    		<h3 class="text-center">Selecione seu jogo salvo</h3>
	                		</div>
	                		<div class="form-top-right" >
	                			<i class="fa fa-key"></i>
	                		</div>
	                    </div>
	                  	<div class="form-bottom" >
		                	
		                    <div class="social-login-buttons" style="margin-bottom: 0px; padding-bottom:0px;">
		                		
		                    	<div class="form-group" >

		                    	<?php
					                 

									$gerenciaCampeonato = new controllerClassCarregamento();
							
									$campeonatos = array();
									
									$campeonatos = $gerenciaCampeonato->carregamentoJogo();
									
									if($campeonatos == NULL){
										echo "Você não tem nenhum jogo !";	
									}
									else {
										echo "<form action=\"viewTelaTime.php\" method=POST>";
											echo "<select id = \"idSelectCarregamento\" name = \"selectCarregamento\">";
											
											foreach($campeonatos as $key => $value):
												echo '<option value="'.$key.'">'.$value.'</option>'; 
											endforeach;
									
											echo "</select>";
											
											echo "<input type=\"submit\" value=\"Selecionar\">";
											
										echo "</form>";
									}										
								?>
									
				                </div>
		                	
		                    	
		                    	<div class="form-group">
			                    	<a class="btn btn-warning btn-block" href="viewInicial.php">
			                    		 Voltar Jogo
			                    	</a>
			                    </div>
			                    
	                    </div>
	                    </div>

	                </div>
	            </div>
	        </div>
	    </div>
	    
	</div>
	
</body>

</html>