<!DOCTYPE html>
<html>
  <head>
	  <title>Cadastrar Campeonato</title>
	  <meta charset="utf-8">
  </head>
  <body>
  <center>
		<form action="../_model/modelCrudCadastrarRodada.php" method="post">
			Numero: <input type="number" name="numero" />
			<br />
			<br />
			Data: <input type="date" name="data" />
			<br />
			<br />
			Hora: <input type="time" name="hora" />
			<br />	
			<br />	
			Periodo: <input type="text" name="periodo" />
			<br />	
			<br />		
			Clima: <input type="text" name="clima" />
			<br />	
			<br />	
			Campeonato: <input type="number" name="campeonato" />
			<br />	
			<br />				
			<input type="submit" value="Cadastrar" />
		</form>
	</center>
  </body>
</html>