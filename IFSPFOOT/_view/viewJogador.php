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
          <th>Posição</th>
          <th>Nacionalidade</th>
          <th>Habilidade</th>
          <th>Idade</th>
          <th>Forca</th>
          <th>Estamina</th>
          <th>Nivel</th>
          <th>Gol</th>
        </tr> 
      </thead>
      <tbody>
      <?php
      	
      	//Listando Jogadores do time
        $consultaJogador = 'SELECT id,nome ,sobrenome,posicao,nacionalidade,habilidade ,idade ,forca ,estamina ,nivel,gol FROM Jogador WHERE idTime = ? ';
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
            echo "<td>{$row[7]}</td>";
            echo "<td>{$row[8]}</td>";
            echo "<td>{$row[9]}</td>";
            echo "<td>{$row[10]}</td>";
            echo '</tr>';
          }
      ?>
      </tbody>
    </table>

</body>

</html>