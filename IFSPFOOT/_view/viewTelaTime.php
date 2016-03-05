<?php
	
	//Inclui cabeçalho na página e conexao com banco
	include_once "viewCabecalho.php";
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	$donoTime = $_SESSION['idDono'];
?>

<!DOCTYPE html>

<html lang="PT-BR">

<head>

	<meta charset= "UTF-8"/>
	<title>Gerenciamento Time</title>
	<link rel="stylesheet" href="_css/cssViewMenu.css">
	<link rel="stylesheet" href="_css/cssView.css">
	
</head>

<body>
	<hr></hr>
	<?php 
	
		//Dados do time principal
		$consultaTime = 'SELECT nome,mascote,cor, dinheiro,torcida FROM Time WHERE dono = ? ';
		$preparaConsultaTime = $conn->prepare($consultaTime);
		$preparaConsultaTime->bindValue(1, $donoTime);
		$preparaConsultaTime->execute();
	
		$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaTime->fetch()) {
			echo "<span>Time : ". $row[0] . "\t\t Mascote : " . $row[1]  ;
			echo "\t\t Cor : " . $row[2] . "\t\t Dinheiro : ". $row[3] . "\t\t Torcida : ". $row[4] . "</span>\n";
		}
		
	?>
	<hr></hr>
	 
	<nav>
	
		<ul>
	
			<li><a href="viewArtilharia.php" target="janela">Artilharia</a></li>
			
			<li><a href="viewEstadio.php" target="janela">Estádio</a></li>

			<li><a href="viewJogador.php" target="janela">Jogadores</a></li>
			
			<li><a href="viewJogos.php" target="janela">Jogos</a></li>
			
			<li><a href="viewTabela.php" target="janela">Rodadas</a></li>
						
			<li><a href="viewTabela.php" target="janela">Tabela</a></li>
			
		    <li><a href="viewTabela.php" target="janela">     !! Jogar !!</a></li>
		
		</ul>
	
	</nav>
	<hr></hr>
	<section> 
	
		<iframe src="viewJogador.php" name="janela" id="framePrincipal"></iframe>		
	
	</section>
	
	<hr></hr>
	<footer><?php include_once "viewRodape.php"?></footer>	

</body>

</html>