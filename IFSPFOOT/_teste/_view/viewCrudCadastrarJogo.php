<!DOCTYPE html>
<html>
  <head>
	  <title>Cadastrar Jogo</title>
	  <meta charset="utf-8">
  </head>
  <body>
  <center>
		<form action="../_model/modelCrudCadastrarJogo.php" method="post">
			Time de Casa: <input type="text" name="timeCasa" />
			<br />
			<br />
			Gols em Casa: <input type="number" name="golCasa" />
			<br />
			<br />
			Gols Visitante: <input type="number" name="golVisitante" />
			<br />	
			<br />	
			Time Visitante: <input type="text" name="timeVisitante" />
			<br />	
			<br />		
			Rodada: <input type="number" name="rodada" />
			<br />	
			<br />				
			<input type="submit" value="Cadastrar" />
		</form>
	</center>
  </body>
</html>