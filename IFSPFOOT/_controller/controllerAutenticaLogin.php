<?php

	/* Este arquivo receberá os dados encaminhados pelo index, e consultará o banco 
	 caso o usuário esteja cadastrado e com a senha correta será encaminhado ao menu inicial,
	 se não, será informado no index "Usuário ou senha inexistentes no banco
	 */

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados.php';
	
	//Iniciando sessãoo
	session_start();
	
	//Variaveis do index.php
	$usuario = $_POST['form-username'];
	$senha = $_POST['form-password'];
	
	//Consulta a Tabela Login, para autenticar usuário
	$consultaLogin = 'SELECT id,usuario,senha FROM Login WHERE usuario = ? AND senha = ?';
	$preparaConsultaLogin = $conn->prepare($consultaLogin);
	$preparaConsultaLogin->bindValue(1, $usuario);
	$preparaConsultaLogin->bindValue(2, $senha);
	$preparaConsultaLogin->execute();
	$dados = $preparaConsultaLogin->fetch(PDO::FETCH_OBJ);
	

	//Se o resultado da consulta for diferente de vazio, então registra sessão e chama a view Inicial
	if(!empty($dados)){
		
		//Registra na sessão id do usuario
		$consultaId = 'SELECT id FROM Login WHERE usuario = ?';
		$preparaConsultaId = $conn->prepare($consultaId);
		$preparaConsultaId->bindValue(1, $usuario);
		$preparaConsultaId->execute();
		$idDono = $preparaConsultaId->fetchColumn(0);
	
		$_SESSION['usuario']= $usuario;
		$_SESSION['senha']= $senha;
		$_SESSION['logado']= true;
		$_SESSION['idDono']= $idDono;
		
		header("Location: ../_view/viewInicial.php");
	 
	}
	else {
		$_SESSION['logado']= false;
		header("Location: ../index.php");

	}
	
	//Fecha conexão
	$conn = null;

?>