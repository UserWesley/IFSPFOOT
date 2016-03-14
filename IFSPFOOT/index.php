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
	<link href="_bootstrap-3.3.6-dist/_css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<!-- Incluindo Bootstrap JavaScript-->
	<script src="_bootstrap-3.3.6-dist/_js/bootstrap.min.js"></script>
	
	<!-- Incluindo jquery-->
	<script src="_jquery/jquery.js"></script>
	
</head>

<body>

	<fieldset>

		<legend>IFSPFOOT</legend>
		
		<form action="_controller/controllerAutenticaLogin.php">
		
			<label for = "idUsuario">Usuário :</label>
			<input type ="text" placeholder = "Entre com seu login" name = "textUsuario" id = "idUsuario"  required>
			<label for = "idSenha">Senha : </label>
			<input type ="password" placeholder = "Senha" name = "passwordSenha" id = "idSenha" required >
		
			<input type = "submit" value = "Entrar" />

		</form>
	</fieldset>
	
</body>

</html>