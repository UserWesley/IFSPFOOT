<?php 

	include_once '../_model/modelClassTime.php';
	include_once '../_model/modelClassJogador.php';
	
	//session_start();
	
	Class controllerClassVerificaTime{
		
		public function visualizaTime(){
				
			$time = new modelClassTime();
				
			$todosTimes = array();

			$time->setCampeonato($_SESSION['IdCampeonato']);
			$todosTimes = $time->consultaTodosTime($time);
				
			return $todosTimes;
		
		}

		public function consultaJogador($idTime){
			
			$jogador = new modelClassJogador();
			
			$jogadores = array();
			
			$jogadores = $jogador->consultaJogadorTime($idTime);

			return $jogador->visualizaJogador($jogadores);
		}
		
	}

?>