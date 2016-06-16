<?php
 
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	class modelClassJogo{

		private $id;
		private $golCasa;
		private $golVisitante;
		private $data;
		private $campeonato;
		private $rodada;
		private $timeCasa;
		private $timeVisitante;	
		private $clima;
        
		//Getter e setters

		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getTimeCasa(){
			return $this->timeCasa;
		}
		
		public function setTimeCasa($timeCasa){
			$this->timeCasa = $timeCasa;	
		}
		
		public function getTimeVisitante(){
			return $this->timeVisitante;
		}
		
		public function setTimeVisitante($timeVisitante){
			$this->timeVisitante = $timeVisitante;
		}
		
		public function getGolCasa(){
			return $this->golCasa;
		}
		
		public function setGolCasa($golCasa){
			$this->golCasa = $golCasa;
		}
		
		public function getGolVisitante(){
			return $this->golVisitante;
		}
		
		public function setGolVisitante($golVisitante){
			$this->golVisitante = $golVisitante;
		}
		
		public function getRodada(){
			return $this->rodada;
		}
		
		public function setRodada($rodada){
			$this->rodada = $rodada;
		}
		
		public function getData(){
			return $this->data;
		}
		
		public function setData($data){
			$this->data = $data;
		}
		
		public function getCampeonato(){
			return $this->campeonato;
		}
		public function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}
		
		public function getClima(){
			return $this->clima;
		}
		
		public function setClima($clima){
			$this->clima = $clima;
		}
		
		public function insirirJogo(){
			
			$conn = Database::conexao();
			$atualizaPlacarJogo = 'UPDATE Jogo SET golCasa = ?, golVisitante = ? WHERE timeCasa = ? and timeVisitante= ? ';
			
		}
		
		public function atualizaPlacar($jogo){
			
			$conn = Database::conexao();
			
			$atualizaPlacarJogo = 'UPDATE Jogo SET golCasa = ?, golVisitante = ? WHERE timeCasa = ? and timeVisitante= ? ';
			$preparaAtualizaPlacarJogo = $conn->prepare($atualizaPlacarJogo);
			$preparaAtualizaPlacarJogo->bindValue(1,$jogo->getGolCasa());
			$preparaAtualizaPlacarJogo->bindValue(2,$jogo->getGolVisitante());
			$preparaAtualizaPlacarJogo->bindValue(3,$jogo->getTimeCasa());
			$preparaAtualizaPlacarJogo->bindValue(4,$jogo->getTimeVisitante());
			$preparaAtualizaPlacarJogo->execute();
			
	   }

	   public function mostraPlacar(){
	   	
		   echo $this->getGolCasa();
		   echo $this->getGolVisitante();
		   echo $this->getTimeCasa();
		   echo $this->getTimeVisitante();
	   		
	   }
	   
	   public function cadastrarJogo($jogo){
	   	
	   		$conn = Database::conexao();
	   		
	   	    $data = $this->getData();
	   		$timeCasa = $this->getTimeCasa();
	   		$timeVisitante = $this->getTimeVisitante();
	   		$campeonato = $this->getCampeonato();
	   		$rodada = $this->getRodada();
	   		$clima = $this->getClima();
	   
	   		//Cadastro do campeonato inicial
	   		$insercaoNovoJogo = "INSERT INTO Jogo VALUES (DEFAULT,NULL,NULL,'$data',
	   		'$campeonato','$rodada','$timeCasa','$timeVisitante','$clima')";
	   		$conn->exec($insercaoNovoJogo);
	   	
	   }
	   
	   public function consultaJogoRodada($jogo){
		
	   		$conn = Database::conexao();
	   		$rodadaAtual = $this->getRodada();
	   		$campeonato = $this->getCampeonato();
	   		
	   				
	   		$times = array();
	   	
		   	$consultaRodada = 'SELECT timeCasa, timeVisitante FROM Jogo WHERE rodada = ? and campeonato = ?';
		   	$preparaConsultaRodada = $conn->prepare($consultaRodada);
		   	$preparaConsultaRodada->bindValue(1,$rodadaAtual);
		   	$preparaConsultaRodada->bindValue(2,$campeonato);
		   	$preparaConsultaRodada->execute();
		   	
		   	$result = $preparaConsultaRodada->setFetchMode(PDO::FETCH_NUM);
		   	while ($row = $preparaConsultaRodada->fetch()) {
		   	
		   		$times[]= $row[0];
		   		$times[]= $row[1];
		   	
		   	}
		   	return $times;
	   }
	   
	   public function verificaPlacar($golCasa,$golVisitante){
	   		
		   	if($golCasa > $golVisitante){
		   	
		   		return 1;  
		   				   	
		   	}
		   	
		   	elseif ($golVisitante > $golCasa){
		   			
		   		return 2;
		   			
		   	}
		   	
		   	else{
		   		
		   		return 3;
		   	}
	   }
 
	   public function consultaJogos($jogo){
	   	
			$campeonato = $this->getCampeonato();
	   		
			$conn = Database::conexao();
	   		
	   		$jogos = array();
	   		
	   		$consultaJogo = 'select time1.nome,jogo.placarCasa,jogo.placarVisitante, time2.nome, Jogo.data from jogo, time as time1 ,time as time2 where jogo.campeonato = ? and time1.id = jogo.timeCasa
	   		and time2.id = jogo.timeVisitante';
	   		
	   		$preparaConsultaJogo = $conn->prepare($consultaJogo);
			$preparaConsultaJogo->bindValue(1, $campeonato);
			$preparaConsultaJogo->execute();
			
			$result = $preparaConsultaJogo->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaJogo->fetch()) {
		
				$jogos[] = $row[0];	
				$jogos[] = $row[1];
				$jogos[] = $row[2];
				$jogos[] = $row[3];
				$jogos[] = $row[4];

			}
	   	
			return $jogos;
	   }
	   
	   public function visualizaJogos($jogos){
	   	
	   		$colunas = 5;
	   		for($i=0; $i < count($jogos); $i++) {
	   			
	   		echo "<td>".$jogos[$i]."</td>";
	   		if((($i+1) % $colunas) == 0 )
	   			echo "</tr><tr>";
	   		}
	   }
	   
	}
?>