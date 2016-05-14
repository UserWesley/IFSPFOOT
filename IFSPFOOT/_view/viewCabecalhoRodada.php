<?php 

 /*Este arquivo será responsável por ser o menu da seleção de rodada
  */
 //Preciso refatorar por dados dinamicos 

?>
<!DOCTYPE html>

<html>

<head>

	<title>Página Inicial</title>

</head>

<body>
	
 
	<form action= "viewRodada.php">
	
		<label for= "idRodada">Selecione Rodada :</label>
		<select name="rodada" id="idRodada">

			<option value="1"selected>Rodada 1</option>
    		<option value="2">Rodada 2</option>
    		<option value="3">Rodada 3</option>
    		<option value="4">Rodada 4</option>   
    		<option value="5">Rodada 5</option>   
    		<option value="6">Rodada 6</option>      
  		
  		</select>
  
  		<input type="submit" value= "Mostrar">
 	
 	</form>

 	</body>

</html>
