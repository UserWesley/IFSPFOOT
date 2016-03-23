<?php
	require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Campeonato</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<link rel="stylesheet" href="../css/style.css" />
	</head>
		<body>
			<div id="content">	
				<fieldset>
					<form action="../_model/modelCrudCadastrarRodada.php" method="post">
					<a href="../indexCrud.php">IFSPFOOT</a>		
					<p/>
					<h4>CADASTRAR RODADA</h4>
					Numero <input type="number" name="numero" />
					Data <input type="date" name="data" />
					Hora <input type="time" name="hora" />
					Periodo <input type="text" name="periodo" />
					Clima <input type="text" name="clima" />
					Campeonato 
					<select name="campeonato">
					<?php
						foreach($dbh->query('SELECT * FROM Campeonato') as $linha){
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
			<script type="text/javascript" src="js/slideshow4.js"></script>
		</body>
</html>