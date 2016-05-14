<?php
	
	/*Recebi o valor do time selecionado assim como o id do usuário e salva no banco
	 */
	
	session_start();

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	$time = $_SESSION['time'];
	$usuario = $_SESSION['idDono'];
	
	//Atualiza a tabela time, com o id do usuário sendo dono
	$atualizaDefinirseuTime = 'UPDATE Time SET dono = ? WHERE id = ?';
	$preparaAtualizaDefinirseuTime = $conn->prepare($atualizaDefinirseuTime);
	$preparaAtualizaDefinirseuTime->bindValue(1,$usuario);
	$preparaAtualizaDefinirseuTime->bindValue(2,$time);
	$preparaAtualizaDefinirseuTime->execute();
	
	//Após configurações chama tela de gerenciamento seu time
	header("Location: ../_view/viewTelaTime.php");

?>