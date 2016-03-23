<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM Jogo WHERE id = $id";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Atualizar Jogo</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<link rel="stylesheet" href="../css/style.css" />
	</head>
		<body>
			<div id="content">	
				<fieldset>
					<?php
					foreach($dbh->query($sql) as $linha):
					?>
						<form action="../_model/modelCrudAtualizarJogo.php" method="post">
						<a href="../indexCrud.php">IFSPFOOT</a>		
						<p/>
						<h4>DADOS DO JOGO</h4>
						ID <input type="number"
							name="id"
							value="<?php echo $linha['id']?>" readonly="readonly" />
							
						Gols em Casa <input type="number" 
							name="golCasa"
							value="<?php echo $linha['golCasa']?>" />
       
						Gols Visitante <input type="number" 
							name="golVisitante"
							value="<?php echo $linha['golVisitante']?>" />
					  
						Time de Casa 
						<select name="timeCasa">
						<?php
							foreach($dbh->query('SELECT * FROM Time') as $linha){
							echo "<option>{$linha['nome']}</option>";
							}
						?>
						</select>   
       		
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
						<p>				
						<input type="submit" value="Atualizar" />
						</form>
						<p>
					<?php
					endforeach;
					?>
				</fieldset>
			</div>
			<script type="text/javascript" src="js/slideshow3.js"></script>
		</body>
</html>