<?php
	/* Este arquivo chamará os arquivos responsáveis por iniciar um novo jogo*/

	//Zerar tabelas novo jogo
	include_once '../_model/modelZerarTabela.php';
	//Chama arquivo que irá cadastro Campeonato Automatico
	include_once '../_model/modelCadastrarCampeonatoAutomatico.php';
	//Chama arquivo que irá gerar times
	include_once '../_model/modelCadastrarTimesAutomatico.php';
	//Chama arquivo que irá gerar jogadores
	include_once '../_model/modelCadastrarJogadoresAutomatico.php';
	//Chama arquivo que irá gerar Rodadas
	include_once '../_model/modelCadastrarRodadasAutomaticas.php';
	//Chama arquivo que irá gerar jogos
	include_once '../_model/modelCadastroAutomaticoJogos.php';
	
	//Chamando o arquivo para iniciar um jogo
	header("LOCATION: ../_view/viewNovoJogo.php");	

?>