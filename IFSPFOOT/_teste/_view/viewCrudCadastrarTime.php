<?php
	require_once('../conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Time</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<link rel="stylesheet" href="../css/style.css" />
	</head>
		<body>
			<div id="content">	
				<fieldset>
					<form action="../_model/modelCrudCadastrarTime.php" method="post">	
					<a href="../indexCrud.php">IFSPFOOT</a>		
					<p/>
					<h4>CADASTRAR TIME</h4>
					Nome <input type="text" name="nome" />
					Mascote <input type="text" name="mascote" />
					Cor <input type="text" name="cor" />
					Dono 
					<select name="dono">
					<?php
						foreach($dbh->query('SELECT * FROM Login') as $linha){
						echo "<option>{$linha['id']}</option>";
						}
					?>
					</select>
					Dinheiro <input type="number" name="dinheiro" />
					Torcida <input type="text" name="torcida" />
					Nome do Estadio <input type="text" name="nomeEstadio" />
					Capacidade <input type="number" name="capacidade" />
					Vitoria <input type="number" name="vitoria" />
					Derrota <input type="number" name="derrota" />
					Empate <input type="number" name="empate" />
					Pontos <input type="number" name="pontos" />
					<p/>				
					<input type="submit" value="Cadastrar" />
					</form>
					<p/>
				</fieldset>
			</div>
			<script type="text/javascript" src="js/slideshow5.js"></script>
		</body>
</html>