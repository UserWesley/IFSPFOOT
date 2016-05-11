<?php
  require_once('../conexao.php');
  $id = $_GET['id'];
  $sql   = "SELECT * FROM Campeonato WHERE id = $id";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Atualizar Campeonato</title>
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
						<form action="../_model/modelCrudAtualizarCampeonato.php" method="post">
						<a href="../indexCrud.php">IFSPFOOT</a>		
						<p/>
						<h4>DADOS DO CAMPEONATO</h4>
						ID <input type="number"
							name="id"
							value="<?php echo $linha['id']?>" readonly="readonly" />
       
						Nome <input type="text"
							name="nome"
							value="<?php echo $linha['nome']?>"/>
							
						Rodada Atual <input type="number" 
							name="rodadaAtual"
							value="<?php echo $linha['rodadaAtual']?>" />                  
       
						Temporada <input type="number" 
							name="temporada"
							value="<?php echo $linha['temporada']?>" />
       
						Vencedor <input type="text" 
							name="vencedor"
							value="<?php echo $linha['vencedor']?>" />   
						<p>		
						<input type="submit" value="Atualizar" />
						</form>
						<p>						
					<?php
					endforeach;
					?>
				</fieldset>
			</div>	
			<script type="text/javascript" src="js/slideshow1.js"></script>
		</body>
</html>