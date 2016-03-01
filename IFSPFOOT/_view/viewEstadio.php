<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	session_start();
	$donoTime = $_SESSION['idDono'];
?>

<!DOCTYPE html>

<html>

<head>

	<title>Página Inicial</title>

</head>

<body>
	<?php
	 
		$consultaEstadio = 'SELECT nomeEstadio,capacidade FROM Time WHERE dono = ? ';
		$preparaConsultaEstadio = $conn->prepare($consultaEstadio);
		$preparaConsultaEstadio->bindValue(1, $donoTime);
		$preparaConsultaEstadio->execute();
	
		$result = $preparaConsultaEstadio->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaEstadio->fetch()) {
			echo "Nome Estádio : ". $row[0] . "\t Capacidade : " . $row[1]  ;
		}
	?>
</body>

</html>