<?php
 
	//Inclusão dos arquivos model
	include_once '../_model/modelClassCampeonato.php';
	session_start();

	Class controllerClassCarregamento{

		public function carregamentoJogo(){
			
			$campeonatosSalvos = array();
			$campeonato = new modelClassCampeonato();
			$campeonatosSalvos = $campeonato->consultaTodosNomeCarregamento($_SESSION['idDono']);
			
			return $campeonatosSalvos;
		} 
		
	}
	
?>