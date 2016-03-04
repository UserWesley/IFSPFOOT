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
	<link rel="stylesheet" href="_css/cssView.css">
</head>

<body>

    <table>
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Idade</th>
          <th>Forca</th>
          <th>Estamina</th>
          <th>Nivel</th>
        </tr> 
      </thead>
      <tbody>
      <?php
      	
      	//Listando Jogadores do time
        $consultaJogador = 'SELECT id,nome ,sobrenome ,idade ,forca ,estamina ,nivel FROM Jogador WHERE idTime = ? ';
		$preparaConsultaJogador = $conn->prepare($consultaJogador);
		$preparaConsultaJogador->bindValue(1, $idTime);
		$preparaConsultaJogador->execute();
		
		$result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
		
		while ($row = $preparaConsultaJogador->fetch()) {

            echo '<tr>';
            echo "<td>{$row[0]}</td>";            
            echo "<td>{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";  
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td>";
            echo "<td>{$row[5]}</td>";
            echo "<td>{$row[6]}</td>";

            echo '</tr>';
          }
      ?>
      </tbody>
    </table>

</body>

</html>