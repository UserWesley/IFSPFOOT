<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM Jogador WHERE id = $id";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Atualizar Jogador</title>
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
						<form action="../_model/modelCrudAtualizarJogador.php" method="post">
						<a href="../indexCrud.php">IFSPFOOT</a>		
						<p/>
						<h4>DADOS DO JOGADOR</h4>
						ID <input type="number"
							name="id"
							value="<?php echo $linha['id']?>" readonly="readonly" />
							
						Titular <input type="text"
							name="titular"
							value="<?php echo $linha['titular']?>"/>   
        
						Nome <input type="text"
							name="nome"
							value="<?php echo $linha['nome']?>"/>                  
        
						Sobrenome <input type="text" 
							name="sobrenome"
							value="<?php echo $linha['sobrenome']?>" />
        
						Posicao <input type="text" 
							name="posicao"
							value="<?php echo $linha['posicao']?>" />
        		
						Nacionalidade <input type="text" 
							name="nacionalidade"
							value="<?php echo $linha['nacionalidade']?>" />
        
						Habilidade <input type="text" 
							name="habilidade"
							value="<?php echo $linha['habilidade']?>" />
        
						Idade <input type="number" 
							name="idade"
							value="<?php echo $linha['idade']?>" />
        
						Forca <input type="number" 
							name="forca"
							value="<?php echo $linha['forca']?>" />   
       
						Estamina <input type="number" 
							name="estamina"
							value="<?php echo $linha['estamina']?>" />
       
						Nivel <input type="text" 
							name="nivel"
							value="<?php echo $linha['nivel']?>" />
        
						Gols <input type="number" 
						name="gol"
						value="<?php echo $linha['gol']?>" />
		
						ID Time 
						<select name="idTime">
						<?php
							foreach($dbh->query('SELECT * FROM Time') as $linha){
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
			<script type="text/javascript" src="js/slideshow2.js"></script>
		</body>
</html>