<?php
    session_start();
	include_once('../_model/modelClassjogador.php'); 
	include_once('../_model/modelClassTime.php'); 

    $dadosResposta = $_POST;

	$_SESSION['idJogador'] = $_POST["idJogador"];
	$_SESSION['vlAtualizar'] = $_POST["vlAtualizar"];

	Class controllerClassCompraJogador{
		
		function __construct(){
			
			$this->comprarJogador();
			$this->atualizaDinheiroTime();
		}

	
		public function comprarJogador(){
			$Jogador = new modelClassJogador();
			$Jogador->setId($_SESSION['idJogador']);
	    	$Jogador->setIdtime($_SESSION['idTimeJogador']);
			$Jogador->compraJogador($Jogador);
		

		}
		public function atualizaDinheiroTime(){
			$Time = new modelClassTime();
			$Time->setId($_SESSION['idTimeJogador']);
			$Time->setDinheiro($_SESSION['vlAtualizar']);
			$Time->atualizaDinheiroTime($Time);		

		}		
	}
	

    $controllerClassCompraJogador = new controllerClassCompraJogador();


    $dadosResposta["resposta"] = "sucesso";
 	echo json_encode($dadosResposta);
?>