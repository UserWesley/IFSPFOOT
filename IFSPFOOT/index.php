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

	<fieldset>

		<legend>IFSPFOOT</legend>
		
		<form  action="_controller/controllerAutenticaLogin.php">
		
			<label for = "idUsuario">Usuário :</label>
			<input type ="text" placeholder = "Entre com seu login" name = "textUsuario" id = "idUsuario"  required>
			<label for = "idSenha">Senha : </label>
			<input class="text-capitalize" type="password" placeholder = "Senha" name="passwordSenha" id="idSenha" required >
			<a href="_view/_doc/viewDocMenu.php">Documentação</a>
			<a href="_teste/indexCrud.php">Teste</a>
			<input type="submit" value="Entrar" />

		</form>
	</fieldset>
	
</body>

</html>