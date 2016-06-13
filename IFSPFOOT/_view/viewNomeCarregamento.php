<?php

	/*Este arquivo é a página inicial do projeto, ele permite o usuário logar, navegar na documentação e ir em teste.*/
	
	//A sessão esta sendo iniciada, no caso de erro de usuario,senha ou ambos retorna uma mensagem de erro nesta tela
	session_start();
	
?>
<!DOCTYPE html>

<html lang="PT-BR">

<head>

	<meta charset= "UTF-8"/>
	
	<title>Página Inicial</title>
	
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
	                			<h1 class="text-center" >IFSPFOOT</h1>
	                    		<p>Digite um nome para seu jogo :</p>
	                		</div>
	                		<div class="form-top-right" >
	                			<i class="fa fa-key"></i>
	                		</div>
	                    </div>
	                    <div class="form-bottom">
	                    	<!-- Formulário encaminha dados para a Classe controller de cadastro Usuario com o metodo post -->
		                    <form role="form" action="../_controller/controllerClassGerenciaInicio.php" method="POST" class="login-form">
		                    	
		                    	<div class="form-group">
		                    		<label class="sr-only" for="nomeCarregamento">Nome Carregamento</label>
		                        	<input type="text" name="nomeCarregamento" placeholder="Nome do Carregamento" class="nomeCarregamento form-control" id="nomeCarregamento">
		                        </div>
		                        
		                        <?php 	

		                            //Informa se o login já existe
			                		if(!isset($_SESSION['cadastroNomeCarregamento'])){
			   
			                			echo "";
			                			
			                		}
			                		elseif ($_SESSION['cadastroNomeCarregamento']){
			                			echo "Nome ja esta sendo utilizado";
			                		}
			                		
			                	?>	                     
		                        
		                        <button type="submit" class="btn">Iniciar</button>
		                     	
		                    </form>
		                	
		                    <div class="social-login-buttons" style="margin-bottom: 0px; padding-bottom:0px;">
			                    
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