<?php 

 /*Este arquivo será responsável por ser o menu da seleção de rodada
  */
 include_once '../_controller/controllerClassMenu.php';

?>
<!DOCTYPE html>

<html>

<head>

	<title>Página Inicial</title>

</head>

<body>
	
 
	<form action= "viewRodada.php">
	
		<label for= "idRodada">Selecione Rodada :</label>
	  		<?php
	  		 
		  		$rodada = new controllerClassMenu();
		  		
		  		$idCampeonato = $_SESSION['IdCampeonato'];
		  		
				$quantidadeRodadas = $rodada->cabecalhoRodada($idCampeonato);
							
				echo "<select id = \"idSelectRodada\" name = \"selectRodada\">";
							
				for($i=1; $i<=$quantidadeRodadas; $i++) {
								
					echo "<option value = ".$i.">".$i."</option>";
				}
							
				echo "</select>";
			?>
  		<input type="submit" value= "Mostrar">
 	
 	</form>

 	</body>

</html>
