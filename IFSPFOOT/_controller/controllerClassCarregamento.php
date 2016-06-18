<?php
 
	//Esta classe controla a consulta de verificação de nome de jogos salvos
	
	session_start();
	//Inclusão dos arquivos model
	include_once '../_model/modelClassCampeonato.php';
	
	
	
	Class controllerClassCarregamento{

		public function carregamentoJogo(){
			
			$campeonatosSalvos = array();
			$campeonato = new modelClassCampeonato();
			$campeonatosSalvos = $campeonato->consultaTodosNomeCarregamento($_SESSION['idDono']);
			
			return $campeonatosSalvos;
		} 
		
	}
	
?>