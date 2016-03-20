<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/style.css" />
	 <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
      <script type="text/javascript">	  
        $(document).ready(function(){
			$("#calcular").click(function(){
				$.post("_view/viewCrudListarCampeonato.php", {"": $("#").val()},
					function(data){
						$("#resultado").html(data);
					}
				);
			});
		});
	  </script>	  
</head>
<body>
<center>
<h1>CRUD</h1>
<table>

    <thead>
        <tr>
          <th><h4>CADASTROS</h4></th>
          <th><h4>CONSULTAS</h4></th>
        </tr> 
	</thead>
    <tbody>		
	<tr>
	<td><center><a  href="_view/viewCrudCadastrarCampeonato.php">CADASTRAR CAPEONATO</center></a></td>
	<td><center><a  href="_view/viewCrudListarCampeonato.php">CONSULTAR CAMPEONATOS</center></a></td>
	</tr>
	<td><center><a href="_view/viewCrudCadastrarRodada.php">CADASTRAR RODADA</center></a></td>
	<td><center><a href="_view/viewCrudListarRodada.php">CONSULTAR RODADAS</center></a></td>
	</tr>
	<td><center><a href="_view/viewCrudCadastrarTime.php">CADASTRAR TIME</center></a></td>
	<td><center><a href="_view/viewCrudListarTime.php">CONSULTAR TIMES</center></a></td>
	</tr>		
	<td><center><a href="_view/viewCrudCadastrarJogador.php">CADASTRAR JOGADOR</center></a></td>
	<td><center><a href="_view/viewCrudListarJogador.php">CONSULTAR JOGADORES</center></a></td>	
	</tr>	
	<td><center><a href="_view/viewCrudCadastrarJogo.php">CADASTRAR JOGO</center></a></td>
	<td><center><a href="_view/viewCrudListarJogo.php">CONSULTAR JOGOS</center></a></td>	
	</tbody>
</table>
<div id="resultado"></div>
</center>
</body>
</html>