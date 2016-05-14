<?php
 	
	/*Este arquivo será responsável pela tela dos jogos, recolherá todas informações dos nomes do times
	e preencherá a table
	 */ 

	session_start();

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
	
	<!-- Incluindo java Script do codigo-->
	<script src="_js/jsTelaJogo.js"></script>
	
	<!-- Passando dados da table por ajax -->
	<script>

		function obterDadosTabela(){
			var dataArr = [];
		    $("td").each(function(){
		        dataArr.push($(this).html());
		    });
		    
		        $.ajax({
		              type : "POST",
		              url : '../_model/modelAtualizaPlacar.php',
		              data : "content="+dataArr,
		              success: function(data) {
		                  alert(data);// alert the data from the server
		                  location.href='../_controller/controllerGerenciaPosJogo.php';
		              },
		              error : function() {
		              }
		       
		    });
		}
	</script>
	
	<!-- Incluindo  CSS -->
	<link href="_css/cssTelaJogo.css" rel="stylesheet" media="screen">
	
</head>

<body>
	
	<?php 
		
		//Consulta e exibição da rodada atual do campeonato	
		$consultaCampeonatoRodadaAtual = 'SELECT rodadaAtual FROM Campeonato;';
		$preparaConsultaCampeonatoRodadaAtual = $conn->query($consultaCampeonatoRodadaAtual);
		$preparaConsultaCampeonatoRodadaAtual->execute();
		
		$result = $preparaConsultaCampeonatoRodadaAtual->setFetchMode(PDO::FETCH_NUM);
		while ($row = $preparaConsultaCampeonatoRodadaAtual->fetch()) {
	
			$_SESSION['rodadaAtual'] = $row[0];
			echo "<h1 class=\"text-center\">Rodada {$row[0]}</h1>";
		
		}
	?>

	<div >
	<table class="table">
		<tr> 
			<th>Tempo</th>
			<th id="tempo"></th>
			<th>Minutos </th>
			<th id="label">0</th>
		
	</table>
	</div>
	
	<div id="myProgress">
    	<div id="myBar"></div>	
	</div>
	
    <div class="table-responsive">
    <table class="table" id="idTabela">
      <thead>
        <tr class = "info">
          <th>Time Casa</th>
          <th>Gol</th>
          <th></th>
          <th>Gol</th>
          <th>Time Visitante</th>
          <th>Lance</th>
        </tr> 
      </thead>
      
      <tbody>
      
	       <?php 
		       //Recolhe a sessão de array contendo o nome dos time e preencherá a table
	       	   $times = $_SESSION['times'];
		       reset($times);
		       $i=0;
		       
		       //Só possui dois jogos cada rodada
		       while($i<2){
		      	 echo"<div id=jogo".$i.">"; 
				 echo "<tr class=\"active\">";

					if($i==0){
						echo "<td>".current($times)."</td>";
					
					}
					else{

						echo "<td>".next($times)."</td>";
					} 
				
				echo "<td id=\"golCasa".$i."\">0</td>";
				echo "<td>X</td>";
				echo "<td id=\"golVisitante".$i."\">0</td>";
				echo "<td>".next($times)."</td>";
				echo "<td id=\"lance".$i."\"></td>";
				echo"</tr>";
				echo "</div>";
		        $i++;
	       		
		       }
	       	
			?>
	  </tbody>
	</table>
		
		<!--  Este botão será responsável por iniciar a rodada -->
		<div id="idBotaoIniciar">
		
			<button type="button" id="iniciar" class="btn btn-primary btn-block" onclick="move()">Iniciar</button>
		
		</div>
		
		<!--  Este botão será responsável por encaminhar os dados e salvar no banco -->
		<div id="idBotaoContinuar" style="visibility:hidden" >
		
			<button type="button" id="continuar" class="btn btn-success btn-block" onclick="obterDadosTabela()">Continuar</button> 
		
		</div>
		
	</div>
	<p>
</body>

</html>
