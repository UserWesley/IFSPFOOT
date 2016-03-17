<!DOCTYPE html>
<html>
  <head>
	  <title>Cadastrar Time</title>
	  <meta charset="utf-8">
  </head>
  <body>
  <center>
		<form action="../_model/modelCrudCadastrarTime.php" method="post">
			Nome: <input type="text" name="nome" />
			<br />
			<br />
			Mascote: <input type="text" name="mascote" />
			<br />
			<br />
			Cor: <input type="text" name="cor" />
			<br />	
			<br />	
			Dono: <input type="number" name="dono" />
			<br />	
			<br />		
			Dinheiro: <input type="number" name="dinheiro" />
			<br />	
			<br />	
			Torcida: <input type="text" name="torcida" />
			<br />	
			<br />	
			Nome do Estadio: <input type="text" name="nomeEstadio" />
			<br />	
			<br />	
			Capacidade: <input type="number" name="capacidade" />
			<br />	
			<br />	
			Vitoria: <input type="number" name="vitoria" />
			<br />	
			<br />	
			Derrota: <input type="number" name="derrota" />
			<br />	
			<br />	
			Empate: <input type="number" name="empate" />
			<br />	
			<br />	
			Pontos: <input type="number" name="pontos" />
			<br />	
			<br />				
			<input type="submit" value="Cadastrar" />
		</form>
	</center>
  </body>
</html>