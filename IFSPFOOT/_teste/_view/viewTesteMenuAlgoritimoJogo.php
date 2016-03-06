<?php
?>

<!DOCTYPE html>

<html lang="PT-BR">

<head>

	<meta charset= "UTF-8"/>
	<title></title>
	<link rel="stylesheet" href="_css/cssViewMenu.css">
	<link rel="stylesheet" href="_css/cssView.css">
	
</head>

<body>

	<h4>Preencha os valores :</h4> 
	<form action = "viewTesteAlgoritmoJogo.php" method="POST">
		<br><label for = "idForcaTime1">Força do Time  1 : </label>
		<input type= "number" name= "numberForcaTime1" id = "idForcaTime1" min="0" required>
		<br><label for = "idForcaTime2">Força do Time  2 : </label>
		<input type= "number" name= "numberForcaTime2" id = "idForcaTime2" min="0" required>
		<br><label for = "idExecucao">Quantas Vezes executar : </label>
		<input type= "number" name= "numberExecucao" id = "idExecucao" min="0" required>
		<br><label for = "idFuncao">Função do Número Aleatório :</label>
		<select name = "selectFuncao" id = "idFuncao" >
			<option value = "1">mt_random</option>
			<option value = "2">random</option>
		</select>
		
		<p>
		<input type="submit" value = "Gerar">	
	</form>
	
</body>

</html>