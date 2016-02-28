<?php
	
	//Inclui cabeçalho na página
	include_once "viewCabecalho.php";

?>

<!DOCTYPE html>

<html>

<head>

	<title>Cadastrar Dados</title>
	<link rel="stylesheet" href="_css/cssView.css">
	
</head>

<body>
	
	<header></header>
	
	<section>
	
		<fieldset>
	
			<legend>Cadastro Inicial</legend>
				<form action="../_model/modelCadastrarTime.php">
			
				<h3>Nome do Time :</h3> 
				<input type = "text" placeholder="Digite o nome do Time" name = "textNomeTime" maxlength = "20">
			
				<br><h3>Mascote :</h3>
				<input type = "text" placeholder="Digite o nome do seu time" name = "textNomeMascote" maxlength = "20">
			
				<h3>
				<label for="cor"><br> Cor :</label>
   				
   				<select name="selectCor" id="cor">
   			    	<option value="yellow">Amarelo</option>
	 				<option value="black">Preto</option>
	 				<option value="white">Branco</option>
	 				<option value="blue">Azul</option>    
    			</select>
				</h3>
				<input type= "submit" value = "Iniciar Jogo" />
			
			</form>
		
		</fieldset>
	
	</section>
	
	<footer><?php include_once "viewRodape.php"?></footer>
	
</body>

</html>