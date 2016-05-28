<?php 

	include_once '../_model/modelClassTime.php';
	include_once '../_model/modelClassJogador.php';

	Class controllerVerificaTime{
		
		public function visualizaTime(){
				
			$time = new modelClassTime();
				
			$todosTimes = array();
				
			$todosTimes = $time->consultaTodosTime();
				
			return $todosTimes;
		
		}

		public function consultaJogador($idTime){
			
			$jogador = new modelClassJogador();
			
			$jogadores = array();
			
			$jogadores = $jogador->consultaJogadorTime($idTime);
			
			return $jogadores;
		}
		
	}

?>