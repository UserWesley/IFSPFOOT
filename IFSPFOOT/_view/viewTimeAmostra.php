<?php

	/* Arquivo mostra todos os times disponiveis para seleção do usuário */
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';

?>

<!DOCTYPE html>

<html>

<head>

	<meta charset= "UTF-8"/>
	<title>Página Inicial</title>
	
	<!-- Visualização Mobile" -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Incluindo Bootstrap CSS -->
	<link href="_bootstrap-3.3.6-dist/_css/bootstrap.min.css" rel="stylesheet" media="screen">
	
	<!-- Incluindo Bootstrap JavaScript-->
	<script src="_bootstrap-3.3.6-dist/_js/bootstrap.min.js"></script>
	
	<!-- Incluindo jquery-->
	<script src="_jquery/jquery.js"></script>

</head>

<body>

   <p>
   
   <?php

      	//Mostrando o nome do time selecionado
        $consultaTime = 'SELECT nome FROM Time WHERE id = ? ';
		$preparaConsultaTime = $conn->prepare($consultaTime);
		$preparaConsultaTime->bindValue(1,$_POST['selectTime']);
		$preparaConsultaTime->execute();
		
		$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
		
		while ($row = $preparaConsultaTime->fetch()) {

            echo "<h1 class=\"text-center\"> Time :";            
            echo $row[0]."</h1>";
            
		}
     ?>
   
   
   <h2 class="text-center">Dados do Time</h2>
   <div class="table-responsive">
      <table class="table">
      		<thead>
        		<tr class = "info">
			          <th>Nome</th>
			          <th>Mascote</th>
			          <th>Cor</th>
			          <th>Dinheiro</th>
			          <th>Torcida</th>
			          <th>Nome Estádio</th>
			          <th>Capacidade</th>
        		</tr> 
      		</thead>
      		<tbody>
      		
      <?php

      	//Listando Jogadores do time
        $consultaTime = 'SELECT nome ,mascote,cor,dinheiro,torcida ,nomeEstadio ,capacidade FROM Time WHERE id = ? ';
		$preparaConsultaTime = $conn->prepare($consultaTime);
		$preparaConsultaTime->bindValue(1,$_POST['selectTime']);
		$preparaConsultaTime->execute();
		
		$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
		
		while ($row = $preparaConsultaTime->fetch()) {

            echo '<tr  class = "active">';
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
  </div>

</body>

</html>