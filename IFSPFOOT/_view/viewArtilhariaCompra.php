<?php 
	
	/* Este arquivo mostra a artilharia do campeonato e ordena por número de gols 
	 */

	session_start();
	
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';	

	$idTime = $_SESSION['idDono'];

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

	<script>
	function redirecionar(idJogador, vlCusto, vlDisponivel, nomeJogador, forca){

		//var vlCompra = parseFloat(vlCusto)*parseFloat(forca);

		if (parseFloat(vlCusto) > vlDisponivel){
			alert("Seu time não tem dinheiro suficiente para comprar este Jogador: \n\n Valor do Jogador:"+vlCusto+"\n Valor Disponível: "+vlDisponivel);
		}
		else
		{	
			if(confirm("Confirma a compra do jogador "+nomeJogador+" ?" )){

			var vlAtualizar = vlDisponivel - vlCusto;
			 
             var dados = {"idJogador": idJogador, "vlAtualizar": vlAtualizar};
             dados = $(this).serialize() +"&" + $.param(dados);

			 $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../_controller/controllerCompraJogador.php',
                async: true,
                data: dados,
                success: function(dados) {
                   if (dados["resposta"] == "sucesso"){
                   		alert("Compra do jogador "+nomeJogador+" realizada com sucesso!");  
                   		location.href='viewArtilhariaCompra.php';                 	
                   }
                   else alert("Não foi possível comprar o jogador escolhido.");
                   },
                 reload: true
            });

            return false;
			}
	    }
	}
	</script>


</head>

<body>
	<div>
		<h3 class="text-right">
			<?php 

                $conn = Database::conexao();

		   		//Consulta na tabela time, para recolher o id do time
		     	$consultaTime = 'SELECT cast(dinheiro as float) FROM Time WHERE dono = ? ';
		     	$preparaConsultaTime = $conn->prepare($consultaTime);
		     	$preparaConsultaTime->bindValue(1,$idTime);
		     	$preparaConsultaTime->execute();		   
		      
		     	$result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
		     
		      	while ($row = $preparaConsultaTime->fetch()) { 		      		
		     		$dinheiroTimeJogador = $row[0];  
		     				      			
		    	 }

		    	 
		    	 $dinheiroFormatado = number_format($dinheiroTimeJogador, 2, ',', '.');	     
		    	echo "Dinheiro disponível: R$$dinheiroFormatado";
		    
			?>
		</h3>		
	</div>


	<h1 class="text-center">Comprar Jogador</h1>
	
	<div class="table-responsive">
	<table class="table">
      <thead>
        <tr class="info">
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Time</th>
          <th>Força</th>
          <th>Gols</th>
          <th>Valor</th>
        </tr> 
      </thead>
      <tbody>
		<?php 
		      	//Consulta na tabela time, para recolher o id do time
		     $consultaTime = 'SELECT id FROM Time WHERE dono = ? ';
		     $preparaConsultaTime = $conn->prepare($consultaTime);
		     $preparaConsultaTime->bindValue(1,$idTime);
		     $preparaConsultaTime->execute();
		      
		     $result = $preparaConsultaTime->setFetchMode(PDO::FETCH_NUM);
		     
		     while ($row = $preparaConsultaTime->fetch()) { 
		     	$idTimeJogador = $row[0];     
		      		
		     }

		   $_SESSION['idTimeJogador'] = $idTimeJogador;
			//Listando alguns dados dos jogadores e ordena de forma crescente
	        $consultaJogador = "SELECT Jogador.nome, 
	                                   Jogador.sobrenome,
	                                   Time.nome,
	                                   (select agilidade+ataque+chute+defesa+forca+passe+resistencia from habilidade where id = Jogador.habilidade) as habilidade,
	                                   Jogador.gol,
	                                   Jogador.passe,
	                                   jogador.id,
	                                   cast(jogador.passe as int) * (select agilidade+ataque+chute+defesa+forca+passe+resistencia from habilidade where id = Jogador.habilidade) as vlCompra	
	                            FROM Jogador,Time 
	                            WHERE Jogador.idTime = Time.id 
	                            and Time.id <> ? 
	                            ORDER BY Jogador.passe, Time.nome asc";

			$preparaConsultaJogador = $conn->prepare($consultaJogador);
			$preparaConsultaJogador->bindValue(1, $idTimeJogador);
     		$preparaConsultaJogador->execute();	

     		
			while ($row = $preparaConsultaJogador->fetch()) {			

				echo "<tr class='active' onclick=\"location.href='javascript:redirecionar(\'$row[6]\', \'$row[7]\',\'$dinheiroTimeJogador\', \'$row[0]\', \'$row[3]\');'\" style=\"cursor:pointer;\">"; 
				echo "<td>{$row[0]}</td>";
				echo "<td>{$row[1]}</td>";
				echo "<td>{$row[2]}</td>";
				echo "<td>{$row[3]}</td>";
				echo "<td>{$row[4]}</td>";
				echo "<td>{$row[7]}</td>";
				echo '</a></tr>';
			}
		?>
		
	  </tbody>
	 </table>
	</div>
	<div>
        <a href="viewJogador.php" class="btn btn-default" id="btn_Voltar">Voltar</a>
    </div>
	
</body>

</html>