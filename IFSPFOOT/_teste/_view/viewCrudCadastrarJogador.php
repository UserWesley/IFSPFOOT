<!DOCTYPE html>
<html>
  <head>
	  <title>Cadastrar Jogador</title>
	  <meta charset="utf-8">
  </head>
  <body>
  <center>
		<form action="../_model/modelCrudCadastrarJogador.php" method="post">
			Nome: <input type="text" name="nome" />
			<br />
			<br />
			Sobrenome: <input type="text" name="sobrenome" />
			<br />
			<br />
			Posicao: <input type="text" name="posicao" />
			<br />	
			<br />	
			Nacionalidade: <input type="text" name="nacionalidade" />
			<br />	
			<br />		
			Habilidade: <input type="text" name="habilidade" />
			<br />	
			<br />		
			Idade: <input type="number" name="idade" />
			<br />	
			<br />	
			Forca: <input type="number" name="forca" />
			<br />	
			<br />	
			Id Time: <input type="number" name="idTime" />
			<br />	
			<br />	
			Estamina: <input type="number" name="estamina" />
			<br />	
			<br />	
			Nivel: <input type="text" name="nivel" />
			<br />	
			<br />	
			Gol: <input type="number" name="gol" />
			<br />	
			<br />				
			<input type="submit" value="Cadastrar" />
		</form>
	</center>
  </body>
</html>