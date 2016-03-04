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
		
		<form action="../_model/modelCadastrarTime.php">
			<fieldset name = cadastroNovoJogo>
	
				<legend>Cadastro Inicial</legend>
					<fieldset name = cadastroTime>					
			
						<h3>Nome do Time :</h3> 
						<input type = "text" placeholder="Digite o nome do Time" name = "textNomeTime" maxlength = "20" required>
			
						<br><h3>Mascote :</h3>
						<input type = "text" placeholder="Digite o nome do seu time" name = "textNomeMascote" maxlength = "20"required>
			
						<h3>
						<label for="cor"><br> Cor :</label>
   				
   						<select name="selectCor" id="cor">
   			    			<option value="yellow">Amarelo</option>
	 						<option value="black">Preto</option>
	 						<option value="white">Branco</option>
	 						<option value="blue">Azul</option>    
    					</select>
						</h3>
					
					</fieldset>
					
					<fieldset>
						<legend>Cadastro Estádio</legend>
						
							<h3>Nome do Estádio :</h3> 
						
							<input type = "text" placeholder="Digite o nome do Estádio" name = "textNomeEstadio" maxlength = "20" required>			
					
					</fieldset>
					
				<input type= "submit" value = "Iniciar Jogo" />
			
			
		
		</fieldset>
	</form>
	</section>
	
	<footer><?php include_once "viewRodape.php"?></footer>
	
</body>

</html>