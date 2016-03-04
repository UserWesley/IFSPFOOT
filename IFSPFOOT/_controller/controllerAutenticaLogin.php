<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Iniciando sessãoo
	session_start();
	
	//Variaveis do index.php
	$usuario = $_GET['textUsuario'];
	$senha = $_GET['passwordSenha'];
	
	//Consulta a Tabela Login, para autenticar usuário
	$sql = 'SELECT id,usuario,senha FROM Login WHERE usuario = ? AND senha = ?';
	$stm = $conn->prepare($sql);
	$stm->bindValue(1, $usuario);
	$stm->bindValue(2, $senha);
	$stm->execute();
	$dados = $stm->fetch(PDO::FETCH_OBJ);
	

	//Se o resultado da consulta for diferente de vazio, então registra sessão e chama o cabecalho
	if(!empty($dados)){
		
		//Registra na sessão id do usuario
		$consultaId = 'SELECT id FROM Login WHERE usuario = ?';
		$preparaConsultaId = $conn->prepare($consultaId);
		$preparaConsultaId->bindValue(1, $usuario);
		$preparaConsultaId->execute();
		$idDono = $preparaConsultaId->fetchColumn(0);
	
		$_SESSION['usuario']= $usuario;
		$_SESSION['senha']= $senha;
		$_SESSION['idDono']= $idDono;
		
		header("Location: ../_view/viewInicial.php");
	 
	}
	else {

		echo "Usuário ou Senha inexistentes !";

	}
	
	//Fecha conexão
	$conn = null;

?>