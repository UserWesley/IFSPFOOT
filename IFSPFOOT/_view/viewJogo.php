<?php
 
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	session_start();
	
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
	
	<!-- Incluindo JavaScript
	<script src="_js/jsTelaJogo.js"></script>-->
	
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
	        
		function move() {
			document.getElementById("idBotaoIniciar").style.visibility= "hidden";
		    var elem = document.getElementById("myBar");
		    var width = 1;
		    var id = setInterval(frame, 10);
		    var golCasa=0;
		    var golVisitante=0;
		    var placar = [0,0,0,0];
		    
		    function frame() {
		    	document.getElementById("tempo").innerHTML = 1;	
		        if (width >= 100) {
		            clearInterval(id);
		            document.getElementById("tempo").innerHTML = "Fim";
		            document.getElementById("idBotaoContinuar").style.visibility= "visible";	
		            
		        } else {
		            width++;
		            var i;
		          	for(i=0;i<=1;i++){
			            var valor = Math.floor((Math.random() * 100) + 1);
						if(valor<=25){
								var chanceGol = Math.floor((Math.random() * 10) + 1);
								if(chanceGol==5){
									golCasa++;
									document.getElementById("golCasa"+i).innerHTML = golCasa;
									document.getElementById("lance"+i).innerHTML = "Gol do time Casa";
									if(i==0){
										placar[0] = golCasa;
									}
									else {
										placar[2] = golCasa;
									}
								}
							}
						else if(valor<=50){
								var chanceGol = Math.floor((Math.random() * 10) + 1);
								if(chanceGol==5){
									golVisitante++;
									document.getElementById("golVisitante"+i).innerHTML = golVisitante;
									document.getElementById("lance"+i).innerHTML = "Gol do time Visitante";
									if(i==0){
										placar[1] = golVisitante;
									}
									else {
										placar[3] = golVisitante;
									}
								}
						}
						else{
							
							if(valor<=70){
								document.getElementById("lance"+i).innerHTML = "Troca de Passes entre time da Casa";
							}
							else if(valor<=80){
								document.getElementById("lance"+i).innerHTML = "Troca de Passes entre time VIsitante";
							}
							else if(valor<=90){
								document.getElementById("lance"+i).innerHTML = "Lateral para time Casa";
							}
							else{
								document.getElementById("lance"+i).innerHTML = "Lateral para time VIsitante";
							}
						}

		          	}
		            elem.style.width = width + '%';
		            document.getElementById("label").innerHTML = width * 1;
		            
		            if(width > 45){
		            	document.getElementById("tempo").innerHTML = 2;	
		            }
		        }
		    }
		}

	</script>
	
	<!-- Incluindo  CSS -->
	<link href="_css/cssTelaJogo.css" rel="stylesheet" media="screen">
	
	
</head>

<body>
	
	<?php 

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
       $times = $_SESSION['times'];
       reset($times);
       $i=0;
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
	
		<div id="idBotaoIniciar">
			<button type="button" id="iniciar" class="btn btn-primary btn-block" onclick="move()">Iniciar</button>
		</div>
		
		<div id="idBotaoContinuar" style="visibility:hidden" >
			<!-- <button type="button" id="continuar" class="btn btn-success btn-block" onclick="javascript:location.href='../_controller/controllerGerenciaPosJogo.php';">Continuar</button>--> 
			<button type="button" id="continuar" class="btn btn-success btn-block" onclick="obterDadosTabela()">Continuar</button> 
		</div>
		
	</div>
	<p>
</body>

</html>
