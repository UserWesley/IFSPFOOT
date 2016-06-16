<?php 
	
	session_start();
	
	include_once '../_model/modelClassTime.php';

	Class controllerSelecionarTime{
		
		public function __construct(){
			
			$this->selecionarTime();
			$this->direcionarPagina();
			
		}
		
		public function selecionarTime(){
			
			$time = new modelClassTime();
			
			$_SESSION['time'];
			$_SESSION['idDono'];
			$time->setId($_SESSION['time']);
			$time->setDono($_SESSION['idDono']);
			
			$time->selecionarTime($time);
		
		}
		public function direcionarPagina(){
			
			//Após configurações chama tela de gerenciamento seu time
			header("Location: ../_view/viewTelaTime.php");
		
		}
		
	}
	
	$selecionarTime = new controllerSelecionarTime();

?>