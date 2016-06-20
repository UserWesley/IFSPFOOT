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
		
		//Atualiza Placar do jogo
		public function atualizaPlacar($jogo){
			
			$placarCasa = $this->getGolCasa();
			$placarVisitante = $this->getGolVisitante();
			$timeCasa = $this->getTimeCasa();
			$timeVisitante = $this->getTimeVisitante();
			$idCampeonato = $this->getCampeonato();
			$rodada = $this->getRodada();
			
			$conn = Database::conexao();
			
			$atualizaPlacarJogo = 'UPDATE Jogo SET placarCasa = ?, placarVisitante = ? WHERE timeCasa = ? and timeVisitante= ? and campeonato = ? and rodada = ?';
			$preparaAtualizaPlacarJogo = $conn->prepare($atualizaPlacarJogo);
			$preparaAtualizaPlacarJogo->bindValue(1,$placarCasa);
			$preparaAtualizaPlacarJogo->bindValue(2,$placarVisitante);
			$preparaAtualizaPlacarJogo->bindValue(3,$timeCasa);
			$preparaAtualizaPlacarJogo->bindValue(4,$timeVisitante);
			$preparaAtualizaPlacarJogo->bindValue(5,$idCampeonato);
			$preparaAtualizaPlacarJogo->bindValue(6,$rodada);
			$preparaAtualizaPlacarJogo->execute();
			
	   }

	   public function mostraPlacar(){
	   	
		   echo $this->getGolCasa();
		   echo $this->getGolVisitante();
		   echo $this->getTimeCasa();
		   echo $this->getTimeVisitante();
	   		
	   }
	   
	   //Cadastra Jogo
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
	   
	   //Consulta jogos da rodada
	   public function consultaJogoRodada($jogo){
		
	   	    $conn = Database::conexao();
	   		$rodadaAtual = $this->getRodada();
	   		$campeonato = $this->getCampeonato();
	   		
	   				
	   		$times = array();
	   	
		   	$consultaRodada = 'SELECT TimeCasa.nome, TimeVisitante.nome FROM Jogo,Time as TimeCasa, Time as TimeVisitante 
		   	WHERE Jogo.rodada = ? and Jogo.campeonato = ? and Jogo.timeCasa = TimeCasa.id and Jogo.TimeVisitante = TimeVisitante.id';
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
	   
	   //Verificar Vencedor do jogo
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
 		
	   //Consulta jogos do campeonato
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
	   
	   //Visualização dos jogos do campeonato
	   public function visualizaJogos($jogos){
	   	
	   		$colunas = 5;
	   		for($i=0; $i < count($jogos); $i++) {
	   			
	   		echo "<td>".$jogos[$i]."</td>";
	   		if((($i+1) % $colunas) == 0 )
	   			echo "</tr><tr>";
	   		}
	   }
	   
	   public function verificarDataJogo($rodada){
	   	
	    switch ($rodada){
	    	
	    	case 1: $data = '2016-01-01'; return $data; 
		    	break;

		    case 2: $data = '2016-01-10'; return $data;
		    	break;
		    
		    case 3: $data = '2016-01-20'; return $data;
		    	break;
		    
		    case 4: $data = '2016-01-30'; return $data;
		    	break;
		   	
		    case 5: $data = '2016-02-01'; return $data;
		    	break;
		   	
		    case 6: $data = '2016-02-10'; return $data;
		    	break;
		   	
		    case 7: $data = '2016-02-20'; return $data;
		    	break;
		   	
		    case 8: $data = '2016-02-28'; return $data;
		    	break;
	    	
		    case 9: $data = '2016-03-01'; return $data;
		    	break;
		    	
		    case 10: $data = '2016-03-10'; return $data;
		    	break;	
		    	
		    case 11: $data = '2016-03-20'; return $data;
		    	break;
		    	
		    case 12: $data = '2016-03-30'; return $data;
		    	break;
		    	
		   	case 13: $data = '2016-04-01'; return $data;
		    	break;
		    	
		   	case 14: $data = '2016-04-10'; return $data;
		    	break;
		    	
		    case 15: $data = '2016-04-20'; return $data;
		    	break;
		    
		    case 16: $data = '2016-04-30'; return $data;
		    	break;
		    
		    case 17: $data = '2016-05-01'; return $data;
		    	break;
		    	
		    case 18: $data = '2016-05-10'; return $data;
		    	break;
		    	
		    case 19: $data = '2016-05-20'; return $data;
		    	break;
		    	
		    case 20: $data = '2016-05-30'; return $data;
		    	break;
		    	
		    case 21: $data = '2016-06-10'; return $data;
		   		break;
		    
		    case 22: $data = '2016-06-20'; return $data;
		    	break;
		    
		    case 23: $data = '2016-06-30'; return $data;
		    	break;
		    
		    case 24: $data = '2016-07-10'; return $data;
		    	break;
		    
		    case 25: $data = '2016-07-20'; return $data;
		    	break;
		    
		    case 26: $data = '2016-07-30'; return $data;
		    	break;
		    
		    case 27: $data = '2016-08-01'; return $data;
		    	break;
		    
		    case 28: $data = '2016-08-10'; return $data;
		    	break;
		    
		    case 29: $data = '2016-08-20'; return $data;
		    	break;
		     
		    case 30: $data = '2016-08-30'; return $data;
		    	break;
		     
		    case 31: $data = '2016-09-01'; return $data;
		    	break;
		     
		    case 32: $data = '2016-09-10'; return $data;
		    	break;
		     
		    case 33: $data = '2016-09-20'; return $data;
		    	break;
		     
		    case 34: $data = '2016-09-30'; return $data;
		    	break;
		     
		    case 35: $data = '2016-10-01'; return $data;
		    	break;
		     
		    case 36: $data = '2016-10-10'; return $data;
		    	break;
		     
		    case 37: $data = '2016-10-20'; return $data;
		    	break;
		     
		    case 38: $data = '2016-10-30'; return $data;
		    	break;
		    	
		    	
	    }
	    
	   }
	   
	}
?>