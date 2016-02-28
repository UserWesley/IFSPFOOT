<?php
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Variaveis da viewNovoJogo.php
	$nome    = $_GET['textNomeTime'];
	$mascote  = $_GET['textNomeMascote'];
	$cor = $_GET['selectCor'];
	
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
	$consultaUltimoIdTime = 'SELECT id FROM Time ORDER BY id';
	$preparaIdTime = $conn->query($consultaUltimoIdTime);
	$ultimoIdTime = $preparaIdTime->fetchColumn(0);
	
	//Pegando último time cadastrado para incrementar 1
    $idInseriTime = $ultimoIdTime + 1;
	
?>

<!DOCTYPE html>

<html>
  
  <head>

  	  <title>Cadastrar</title>
	  <meta charset="utf-8">
  
  </head>
  
  <body>
  
  	<?php

  		$sql = "INSERT INTO Time VALUES ($idInseriTime,'$nome','$mascote','$cor','$dono')";
  	
  		$conn->exec($sql);
  		
  		header("LOCATION: ../_view/viewTelaTime.php");
	
  	?>
  </body>
</html>