<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

?>

<!DOCTYPE html>

<html>

<head>

	<title>Página Inicial</title>

</head>

<body>

	<?php
	 
		//Consulta para visualizar jogos e seus atributos
		$consultaRodada = 'SELECT * FROM Jogo';
		$preparaConsultaRodada = $conn->query($consultaRodada);
		$preparaConsultaRodada->execute();
	
		$result = $preparaConsultaRodada->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaRodada->fetch()) {
			echo "\t". $row[0] . "\t" . $row[1]. "\t" . $row[2]. "\t" . $row[3]. "\t" . $row[4]. "\t" . $row[5]."<p>"  ;
		}
	?>
	
</body>

</html>