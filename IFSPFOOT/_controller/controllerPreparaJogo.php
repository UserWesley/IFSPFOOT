<?php
 
	/*ESte arquivo será responsável por chamar o arquivo que recolher os dados antes do jogo, ou seja, qualquer
	 arquivo que prepare a configurações dos times para iniciar uma nova rodada
	 */

	//Inclusão do arquivo para recolher dados do jogos da rodada
	include_once '../_model/modelRecolherDadosJogosRodada.php';

	
	//include_once '../_model/modelRecolherDadosTimeRodada.php';
	header("Location: ../_view/viewJogo.php");
	
?>
