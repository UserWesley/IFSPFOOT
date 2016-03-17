<!DOCTYPE html>
<html>
  <head>
	  <title>Cadastrar Campeonato</title>
	  <meta charset="utf-8">
  </head>
  <body>
  <center>
		<form action="../_model/modelCrudCadastrarCampeonato.php" method="post">
			Nome: <input type="text" name="nome" />
			<br />
			<br />
			Temporada: <input type="number" name="temporada" />
			<br />
			<br />
			Vencedor: <input type="text" name="vencedor" />
			<br />	
			<br />			
			<input type="submit" value="Cadastrar" />
		</form>
	</center>
  </body>
</html>