<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	session_start();
	$time = $_SESSION['time'];
	$usuario = $_SESSION['idDono'];
	
	$atualizaDefinirseuTime = 'UPDATE Time SET dono = ? WHERE id = ?';
	$preparaAtualizaDefinirseuTime = $conn->prepare($atualizaDefinirseuTime);
	$preparaAtualizaDefinirseuTime->bindValue(1,$usuario);
	$preparaAtualizaDefinirseuTime->bindValue(2,$time);
	$preparaAtualizaDefinirseuTime->execute();
	
	
	header("Location: ../_view/viewTelaTime.php");

?>