<?php

	/* Arquivo mostra todos os times disponiveis para seleção do usuário */
	
	include_once ('../_controller/controllerMenu.php');

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
      	$time = new controllerMenu();
      	$idTime = $_POST['selectTime'];
      	
      	$timeEscolhido = $time->buscarTime($idTime);
      	
      	echo "<h1 class=\"text-center\"> Time :";
      	echo $timeEscolhido;
      	
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

		      	$timeDados = array();	
				$timeDados = $time->buscarDadoTime($idTime);
				print_r($timeDados);
				$colunas = 6;
				
		      	//Listando Jogadores do time
		      	for($i=0; $i < count($timeDados); $i++) {
		      		echo "<td>".$timeDados[$i]."</td>";
		      		if((($i+1) % $colunas) == 0 )
		      			echo "</tr><tr>";
		      	}
				
		      ?>
      </tbody>
    </table>
  </div>

</body>

</html>