<?php 

	Class modelClassRodada{
		
		private $id;
		private $numero;
		private $campeonato;
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getNumero(){
			return $this->numero;
		}
		
		public function setNumero($numero){
			$this->numero = $numero;
		}
		
		public function getCampeonato(){
			return $this->campeonato;	
		}
		
		public function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}
		
		//Ira cadastrar Rodada
		public function cadastrarRodada($rodada){
			
			$conn = Database::conexao();
			
			$numero = $this->getNumero();
			$campeonato = $this->getCampeonato();

			$insercaoNovaRodada = "INSERT INTO Rodada VALUES (DEFAULT,'$numero','$campeonato');";
			$conn->exec($insercaoNovaRodada);
			
		}
		
		//Irá recolher ultima cadastrada
		public function recolheNumeroRodada($idCampeonato){
				
			$conn = Database::conexao();
				
			$consultaNumeroRodada = 'SELECT COUNT(id) FROM Rodada WHERE campeonato = ?';
			$preparaConsultaNumeroRodada = $conn->prepare($consultaNumeroRodada);
			$preparaConsultaNumeroRodada->bindValue(1,$idCampeonato);
			$preparaConsultaNumeroRodada->execute();
				
			$result = $preparaConsultaNumeroRodada->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaNumeroRodada->fetch()) {
				$numeroRodada = $row[0];
			}
				
			return $numeroRodada;
			
		}
		
		//Consulta dado da rodada selecionada
		public function consultaRodada($rodada){
				
			$numeroRodada = $this->getNumero();
			$campeonato = $this->getCampeonato();
				
			$rodadaConsultada = array();
				
			$conn = Database::conexao();
			//Consulta para visualizar jogos da rodada assim como o placar
			$consultaRodada = 'select timeCasa.nome, Jogo.placarCasa, Jogo.placarVisitante, timeVisitante.nome,
			Jogo.data from Jogo, time as timeCasa, time as timeVisitante
			where Jogo.rodada = ? and Jogo.campeonato = ? and Jogo.timeCasa = timeCasa.id
			and Jogo.timeVisitante = timeVisitante.id';
		
			$preparaConsultaRodada = $conn->prepare($consultaRodada);
			$preparaConsultaRodada->bindValue(1,$numeroRodada);
			$preparaConsultaRodada->bindValue(2,$campeonato);
			$preparaConsultaRodada->execute();
		
			$result = $preparaConsultaRodada->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaRodada->fetch()) {
		
				$rodadaConsultada[] = $row[0];
				$rodadaConsultada[] = $row[1];
				$rodadaConsultada[] = $row[2];
				$rodadaConsultada[] = $row[3];
				$rodadaConsultada[] = $row[4];
		
			}
				
			return $rodadaConsultada;
		}
		
		//Exibi rodada partir de um array
		public function exibeRodada($rodada){
		
			$colunas = 5;
			for($i=0; $i < count($rodada); $i++) {
		
				echo "<td>".$rodada[$i]."</td>";
				if((($i+1) % $colunas) == 0 )
					echo "</tr><tr>";
		
		
			}
		}
		
		//Consulta Quantidade de Rodada
		public function consultaQuantidadeRodadas($rodada){
		
			$idCampeonato = $this->getCampeonato();
				
			$conn = Database::conexao();
				
			$consultaQuantidadeRodada = 'SELECT COUNT(*) FROM rodada WHERE campeonato = ?';
				
			$preparaConsultaQuantidadeRodada = $conn->prepare($consultaQuantidadeRodada);
			$preparaConsultaQuantidadeRodada->bindValue(1,$idCampeonato);
			$preparaConsultaQuantidadeRodada->execute();
				
			$result = $preparaConsultaQuantidadeRodada->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaQuantidadeRodada->fetch()) {
					
				$quantidadeRodada = $row[0];
			}
				
			return $quantidadeRodada;
		}
		
		
	}
	
?>