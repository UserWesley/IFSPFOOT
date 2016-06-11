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
	<link href="_view/_bootstrap-3.3.6-dist/_css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<!-- Incluindo Bootstrap JavaScript-->
	<script src="_view/_bootstrap-3.3.6-dist/_js/bootstrap.min.js"></script>
	
	<!-- Incluindo jquery-->
	<script src="_view/_jquery/jquery.js"></script>
	
	<!-- Incluindo jquery backstretch-->
	<script src="_view/_jquery/jquery.backstretch.min.js"></script>
	
	<!-- Incluindo js index-->
	<script src="_view/_js/jsIndex.js"></script>
	
	<!-- Incluindo css dos elementos-->
   	<link rel="stylesheet" href="_view/_css/form-elements.css">
   	
   	<!-- Incluindo css index-->
    <link rel="stylesheet" href="_view/_css/style.css">

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
	                    	<!-- Formulário encaminha dados para a Classe controller de autenticação com o metodo post -->
		                    <form role="form" action="_controller/controllerClassAutenticaLogin.php" method="POST" class="login-form">
		                    	<div class="form-group">
		                    		<label class="sr-only" for="form-username">Usuário</label>
		                        	<input type="text" name="form-username" placeholder="Usuário" class="form-username form-control" id="form-username">
		                        </div>
		                        <div class="form-group">
		                        	<label class="sr-only" for="form-password">Senha</label>
		                        	<input type="password" name="form-password" placeholder="Senha" class="form-password form-control" id="form-password">
		                        </div>
		                        
		                        <button type="submit" class="btn">Entrar</button>
		                     	
		                    </form>
		                	
		                    <div class="social-login-buttons" style="margin-bottom: 0px; padding-bottom:0px;">
			                    <div class="form-group" >
			                		<?php 	
			                				//Informa o usuário que o nome,senha ou ambos estão errados, caso a variveis não exista ele exibi uma mensagem vazia, ou seja nada
			                				if (!isset($_SESSION['logado'])){
			                					echo "";
			                				}
			                				elseif ($_SESSION['logado'] == false){
			                					echo "Usuário ou senha inválido";
			                				}
			                		?>
		                    	</div>
		                    	
		                		<div class="form-group">
		                			<!-- Link para página de cadastro -->
		                        	<a class="btn btn-link btn-block" href="_view/viewCadastroNovoUsuario.php">
			                    		 Cadastrar Novo Usuário
			                    	</a></div>
		                		
		                    	<div class="form-group" >
		                    		<!-- Link para página de documentação -->
			                		<a class="btn btn-info btn-block" href="_view/_doc/viewDocMenu.php">
			                    		 Documentação
			                    	</a>
		                    	</div>
		                    	
		                    	<div class="form-group">
			                    	<!-- Link para página de testes -->
			                    	<a class="btn btn-danger btn-block" href="_teste/indexCrud.php">
			                    		 Teste
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