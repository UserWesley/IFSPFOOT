<?php 

	/*Este arquio será responsável por realizar o gerenciamento após o jogo*/

	//Inclusão do arquivo para recolher dados do jogos da rodada
	include_once '../_model/modelAvancaRodada.php';
	
	//Redireciona para tela Time
	header("LOCATION: ../_view/viewTelaTime.php");

?>