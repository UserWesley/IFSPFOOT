<?php
	require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Jogo</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<link rel="stylesheet" href="../css/style.css" />
	</head>
		<body>
			<div id="content">	
				<fieldset>
					<form action="../_model/modelCrudCadastrarJogo.php" method="post">
					<a href="../indexCrud.php">IFSPFOOT</a>		
					<p/>
					<h4>CADASTRAR JOGO</h4>
					Time de Casa 
					<select name="timeCasa">
					<?php
						foreach($dbh->query('SELECT * FROM Time') as $linha){
						echo "<option>{$linha['nome']}</option>";
						}
					?>
					</select>			
					Gols em Casa <input type="number" name="golCasa" />
					Gols Visitante <input type="number" name="golVisitante" />
					Time Visitante 
					<select name="timeVisitante">
					<?php
						foreach($dbh->query('SELECT * FROM Time') as $linha){
						echo "<option>{$linha['nome']}</option>";
						}
					?>
					</select>
					Rodada 
					<select name="rodada">
					<?php
						foreach($dbh->query('SELECT * FROM Rodada') as $linha){
						echo "<option>{$linha['id']}</option>";
					}
					?>
					</select>
					<p/>				
					<input type="submit" value="Cadastrar" />
					</form>
					<p/>
				</fieldset>
			</div>	
			<script type="text/javascript" src="js/slideshow3.js"></script>
		</body>
</html>