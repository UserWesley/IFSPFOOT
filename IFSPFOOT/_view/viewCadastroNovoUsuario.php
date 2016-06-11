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
	                    		<p>Efetue o login com seu usuário e senha :</p>
	                		</div>
	                		<div class="form-top-right" >
	                			<i class="fa fa-key"></i>
	                		</div>
	                    </div>
	                    <div class="form-bottom">
	                    	<!-- Formulário encaminha dados para a Classe controller de cadastro Usuario com o metodo post -->
		                    <form role="form" action="../_controller/controllerClassCadastraUsuario.php" method="POST" class="login-form">
		                    	
		                    	<div class="form-group">
		                    		<label class="sr-only" for="form-nome">Nome</label>
		                        	<input type="text" name="form-nome" placeholder="Nome" class="form-username form-control" id="form-nome">
		                        </div>
								
								<div class="form-group">
		                    		<label class="sr-only" for="form-sobrenome">Sobrenome</label>
		                        	<input type="text" name="form-sobrenome" placeholder="Sobrenome" class="form-sobrenome form-control" id="form-sobrenome">
		                        </div>
		                        
		                      	<div class="form-group">
		                    		<label class="sr-only" for="form-email">E-mail</label>
		                        	<input type="email" name="form-email" placeholder="E-mail" class="form-email form-control" id="form-email" required>
		                        </div>
		                        
		                        <div class="form-group">
		                    		<label class="sr-only" for="form-celular">Celular</label>
		                        	<input type="tel" name="form-celular" placeholder="Celular" class="form-celular form-control" id="form-celular" required>
		                        </div>
		                        
		                        <div class="form-group">
		                        	<label class="sr-only" for="form-login">Login</label>
		                        	<input type="text" name="form-login" placeholder="Login" class="form-login form-control" id="form-login">
		                        </div>
		                        
		                        <?php 	

		                            //Informa se o login já existe
			                		if(!isset($_SESSION['cadastroLogin'])){
			                			echo "";
			                		}
			                		else {
			                			echo "Login Sendo Utilizado !";
			                		}
			                		
			                	?>
		                        
		                        <div class="form-group">
		                        	<label class="sr-only" for="form-senha">Senha</label>
		                        	<input type="password" name="form-senha" placeholder="Senha" class="form-senha form-control" id="form-senha">
		                        </div>
		                        
	                            <div class="form-group">
		                        	<label class="sr-only" for="form-repitasenha">Repita Senha</label>
		                        	<input type="password" name="form-repitasenha" placeholder="Repita Senha" class="form- form-control" id="form-repitasenha">
		                        </div>
		                        
		                        <?php 	

		                            //Informa o usuário que o nome,senha ou ambos estão errados, caso a variveis não exista ele exibi uma mensagem vazia, ou seja nada
			                		if(!isset($_SESSION['cadastroSenha'])){
			                			echo "";
			                		}
			                		else {
			                			echo "Senhas Diferentes !";
			                		}
			                		
			                	?>
		                        
		                        <button type="submit" class="btn">Cadastrar</button>
		                     	
		                    </form>
		                	
		                    <div class="social-login-buttons" style="margin-bottom: 0px; padding-bottom:0px;">
			                    <div class="form-group" >

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