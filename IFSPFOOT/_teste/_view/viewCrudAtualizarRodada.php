<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM Rodada WHERE id = $id";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Atualizar Rodada</title>
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
						<form action="../_model/modelCrudAtualizarRodada.php" method="post">
						<a href="../indexCrud.php">IFSPFOOT</a>		
						<p>
						<h4>DADOS DA RODADA</h4>
						ID <input type="number"
							name="id"
							value="<?php echo $linha['id']?>" 
							readonly="readonly" />
       
						Numero <input type="number"
							name="numero"
							value="<?php echo $linha['numero']?>"/>                  
       
						Data <input type="date" 
							name="data"
							value="<?php echo $linha['data']?>" />
       
						Hora <input type="time" 
							name="hora"
							value="<?php echo $linha['hora']?>" />
        	
						Periodo <input type="text" 
							name="periodo"
							value="<?php echo $linha['periodo']?>" />
       
						Clima <input type="text" 
							name="clima"
							value="<?php echo $linha['clima']?>" />
       	
						Campeonato 
						<select name="campeonato">
						<?php
							foreach($dbh->query('SELECT * FROM Campeonato') as $linha){
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
			<script type="text/javascript" src="js/slideshow4.js"></script>
		</body>
</html>