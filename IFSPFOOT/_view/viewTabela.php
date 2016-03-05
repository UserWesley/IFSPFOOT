<?php
 
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

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
          <th>Posição</th>
          <th>Nome</th>
          <th>Vitorias</th>
          <th>Derrotas</th>
          <th>Empates</th>
          <th>Pontos</th>
        </tr> 
      </thead>
      <tbody>

	<?php
	 	
		//Lista Posições
		$posicao =1;
		
		//Listando posições
		$consultaTabela = 'SELECT nome,vitoria,derrota,empate,pontos FROM Time ORDER BY pontos DESC';
		$preparaConsultaTabela = $conn->query($consultaTabela);
		$preparaConsultaTabela->execute();
	
		$result = $preparaConsultaTabela->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaTabela->fetch()) {
			echo '<tr>';
			echo "<td>{$posicao}</td>";
            echo "<td>{$row[0]}</td>";            
            echo "<td>{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";  
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td>";
            echo '</tr>';
            $posicao++;
		}
	?>
	 </tbody>
    </table>
	
</body>

</html>