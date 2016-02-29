<?php
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Variaveis da viewNovoJogo.php
	$nomeTime    = $_GET['textNomeTime'];
	$mascote  = $_GET['textNomeMascote'];
	$cor = $_GET['selectCor'];
	$nomeEstadio = $_GET['textNomeEstadio'];
	
	//Inicio de Sessão para pegar usuario logado, usuário é único
	session_start();
	$usuario = $_SESSION['usuario'];
	
	//Consulta na Tabela Login para pegar id do usuário logado,assim inserimos ele como dono
	$consultaDono = 'SELECT id FROM Login WHERE usuario = ?';
	$prepraraDono = $conn->prepare($consultaDono);
	$prepraraDono->bindValue(1, $usuario);
	$prepraraDono->execute();
	$dono = $prepraraDono->fetchColumn(0);
	
	//Consulta Tabela time para pegar último id do time cadastrado, campo de autoincremento
	$consultaUltimoIdTime = 'SELECT id FROM Time ORDER BY id DESC';
	$preparaIdTime = $conn->query($consultaUltimoIdTime);
	$ultimoIdTime = $preparaIdTime->fetchColumn(0);
	
	//Pegando último time cadastrado para incrementar 1
    $idInseriTime = $ultimoIdTime + 1;
    
    //Regra do Jogo
    $dinheiroInicial = "10,00";
    $torcidaInicial = "10";
    $capacidade = "10";
	
?>

<!DOCTYPE html>

<html>
  
  <head>

  	  <title>Cadastrar</title>
	  <meta charset="utf-8">
  
  </head>
  
  <body>
  
  	<?php

  		//Inserção do um novo time
  		$insercaoNovoTime = "INSERT INTO Time VALUES ($idInseriTime,'$nomeTime','$mascote','$cor','$dono','$dinheiroInicial','$torcidaInicial','$nomeEstadio','$capacidade')";
  		$conn->exec($insercaoNovoTime);
		
  		session_start();
		$_SESSION['idDono']= $dono;
  		
		header("LOCATION: ../_view/viewTelaTime.php");
	
  	?>
  
  </body>
  
</html>