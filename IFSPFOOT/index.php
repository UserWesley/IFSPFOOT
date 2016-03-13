<?php 

?>
<!DOCTYPE html>

<html lang="PT-BR">

<head>
	<meta charset= "UTF-8"/>
	<title>Página Inicial</title>

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