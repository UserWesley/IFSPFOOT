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
	
	<script >

	function getUser()
	
	{
	
	 $.post('teste1.php',{nome: 'Joe', mail: 'joe@foo.com'},function(data){
	
	 //mostrando o retorno do post
	
	 alert(data)
	
	 })
	
	}

</script>


</head>

<body>
	<form id="cadUsuario" action="" method="post">
	
	<label>Nome:</label><input type="text" name="nome" id="nome" />
	<label>Email:</label><input type="text" name="email" id="email" />
	<label>Senha:</label> <input type="text" name="senha" id="senha" />
	<input type="button" value="Salvar" id="salvar" onclick="getUser()"/>
	
	</form>
		
</body>

</html>

