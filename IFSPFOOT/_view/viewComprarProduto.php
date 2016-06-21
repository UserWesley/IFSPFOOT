<?php 
	
	/*
		tela para compra de produtos
	*/
	
	//Inclusão do arquivo para conexão com o banco de dados PDO

    include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

    include_once '../_controller/controllerClassProdutos.php';

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

	<!-- Função Para Confirmar Comprar -->
	<script>


	</script>	
	
	
</head>

<body>
	


	<h1 class="text-center">Comprar Melhoria Estadio</h1>
	
	<div class="table-responsive">
	<table class="table">
      <thead>
        <tr class="info">
          <th>Dinheiro Disponivel</th>
        </tr> 
      </thead>
      <tbody>
		<?php 
			
			$exibirDinheiroDoClub = new controllerClassProduto();

			$exibirDinheiro = array();

			$exibirDinheiro = $exibirDinheiroDoClub->buscarDinheiroDoClub();

			foreach ($exibirDinheiro as $linhas ) {
                                
				$dinheiroDoClub = $linhas['dinheiro'];
					
				$dinheiroFormatadoDoClub = number_format($linhas['dinheiro'],2,',','.');

				echo'<tr>';
		    	echo'<td> IF$: '.$dinheiroFormatadoDoClub.'</td>';
		    	echo'</tr>';

			}
		   
		 ?>
		
	  </tbody>
	 </table>
	</div>

	<div class="table-responsive">
	<table class="table">
      <thead>
        <tr class="info">
          <th>Nome</th>
          <th>Valor</th>
        </tr> 
      </thead>
      <tbody>
     
		<?php 
			//$conn = Database::conexao();
		    //Consulta na tabela time, para recolher o id do Estadio
			$exibirProduto = new controllerClassProduto();
			
			$exibir = array();

			$exibir = $exibirProduto->buscarProduto();


		    foreach($exibir as $linha){


		    	$preco = number_format($linha["preco"], 2, ',', '.');

		    	$nomeProduto = $linha["nome"];

		    	echo '<tr>';
				echo '<td>'.'<a href="viewCarrinho.php?acao=add&id='.$linha['id'].'">'.$nomeProduto.'</a>'.'</td>';
				echo '<td> IF$: '.$preco.'</td>';
				echo '<r/tr>';
				

			 	/*echo '<a href="viewCarrinho.php?acao=add&id='.$linha['id'].'"><img src="../../../_view/_imagens/	arquibancadas_1.jpg" 
                 			alt="Mercado" style="width:150px;height:150px;border:1"></a> <br />';*/

                

			
		    }

		 ?>
	  
	</table>
	</div>


	
	<div>
	    <a href="viewEstadio.php" class="btn btn-default" id="btn_Voltar">Voltar</a>
    </div>
	
</body>

</html>