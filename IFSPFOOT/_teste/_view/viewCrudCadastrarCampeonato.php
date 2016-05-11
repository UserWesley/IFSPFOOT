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
				<form action="../_model/modelCrudCadastrarCampeonato.php" method="post">	
				<a href="../indexCrud.php">IFSPFOOT</a>		
				<p/>
				<h4>DADOS DO CAMPEONATO</h4>
				Nome <input type="text" name="nome"/>
				Rodada Atual <input type="number" name="rodadaAtual"/>				
				Temporada <input type="number" name="temporada" />					
				Vencedor <input type="text" name="vencedor" />	
				<p/>				
				<input type="submit" value="Cadastrar" />
				</form>
				<p/>	
			</fieldset>	
		</div>
		<script type="text/javascript" src="js/slideshow1.js"></script>
	</body>
</html>