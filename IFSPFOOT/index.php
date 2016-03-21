<?php 

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


</head>

<body>
	<div class="panel panel-default">

		<div class="panel-heading">
    		<h2 class="panel-title">IFSPFOOT</h2>
  		</div>
		<div class="panel-body">
		<form  action="_controller/controllerAutenticaLogin.php" class="form-horizontal">
			
			<div class="form-group">
				<div class="col-xs-10"> 
					<input type ="text" placeholder = "Entre com seu login" name = "textUsuario" id = "idUsuario"  required>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-xs-10"> 
					<input type="password" placeholder = "Senha" name="passwordSenha" id="idSenha" required >
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" value="Entrar" class="btn btn-default"/>
			</div>
			
			<div class="form-group">
				<a href="_view/_doc/viewDocMenu.php">Documentação</a>
			</div>
			
			<div class="form-group">
				<a href="_teste/indexCrud.php">Teste</a>
			</div>
			
		</form>
		</div>
	</div>

</body>

</html>