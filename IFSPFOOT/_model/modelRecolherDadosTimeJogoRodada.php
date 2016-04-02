<?php
 
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

	$forca = 10;
	
	$consultaTime = 'SELECT * FROM Time;';
	$preparaConsultaTime = $conn->query($consultaTime);
	$preparaConsultaTime->execute();
	
	$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
	while ($row = $preparaConsultaTime->fetch()) {

		echo "<table>";
		echo '<tr class = "active">';
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo '</tr>';
		echo "</table>";
			
		for($i=1;$i<=4;$i++){
			
			$time = array();
			$time['idTime']=$row[0];
			$time['timeNome']=$row[1];
			$time['timeForca']=$forca;
			$_SESSION['time'] = $time;
		
		}
	}

?>
