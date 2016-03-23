<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM Time WHERE id = $id";
?>
<!DOCTYPE html>
<html>

<head>

	<title>Atualizar Time</title>
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
						
			<form action="../_model/modelCrudAtualizarTime.php" method="post">	
				
				<a href="../indexCrud.php">IFSPFOOT</a>		
				<p>
				<h4>DADOS DO TIME</h4>
				ID <input type="number"
						  name="id"
						  value="<?php echo $linha['id']?>" readonly="readonly" />
							
				Nome <input type="text"
						    name="nome"
						    value="<?php echo $linha['nome']?>"/>                  
       
				Mascote <input type="text" 
							   name="mascote"
							   value="<?php echo $linha['mascote']?>" />
       
				Cor <input type="text" 
						   name="cor"
						   value="<?php echo $linha['cor']?>" />
           
				Dinheiro <input type="number" 
						name="dinheiro"
						value="<?php echo $linha['dinheiro']?>" />
        		
						Torcida <input type="text" 
						name="torcida"
						value="<?php echo $linha['torcida']?>" />
       
						Nome do Estadio <input type="text" 
						name="nomeEstadio"
						value="<?php echo $linha['nomeEstadio']?>" />
       
						Capacidade <input type="number" 
						name="capacidade"
						value="<?php echo $linha['capacidade']?>" />
       
						Vitorias <input type="number" 
						name="vitoria"
						value="<?php echo $linha['vitoria']?>" />
       
						Derrotas <input type="number" 
						name="derrota"
						value="<?php echo $linha['derrota']?>" />
        
						Empates <input type="number" 
						name="empate"
						value="<?php echo $linha['empate']?>" />
        
						Pontos <input type="number" 
						name="pontos"
						value="<?php echo $linha['pontos']?>" />
					  
						Dono 
						<select name="dono">			
						<?php
							foreach($dbh->query('SELECT * FROM Login') as $linha){
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
			<script type="text/javascript" src="js/slideshow5.js"></script>
		</body>
</html>