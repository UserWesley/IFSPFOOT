<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	session_start();
	$idTime = $_SESSION['idDono'];
	
?>
<!DOCTYPE html>

<html>

<head>

	<title>Página Inicial</title>

</head>

<body>

	<?php
		
		$consultaJogador = 'SELECT * FROM Jogador WHERE idTime = ? ';
		$preparaConsultaJogador = $conn->prepare($consultaJogador);
		$preparaConsultaJogador->bindValue(1, $idTime);
		$preparaConsultaJogador->execute();
		
		$result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaJogador->fetch()) {
			echo "id : ". $row[0] . "\t Nome : " . $row[1]  ;
			echo "\t Sobrenome : " . $row[2] . "\n Idade : ". $row[3] . "\t Forca : ". $row[4] . "\n";
		}
		
    ?>

</body>

</html>