<?php 
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassTabela {
		
		//Variáveis
		private $id;
		private $vitoria;
		private $empate;
		private $derrota;
		private $ponto;
		private $campeonato;
		
		//Getters e Setters
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getVitoria(){
			return $this->vitoria;
		}
		
		public function setVitoria($vitoria){
			$this->vitoria = $vitoria;
		}
		
		public function getEmpate(){
			return $this->empate;
		}
		
		public function setEmpate($empate){
			$this->empate = $empate;
		}
		
		public function getDerrota(){
			return $this->derrota;
		}
		
		public function setDerrota($derrota){
			$this->derrota = $derrota;
		}
		
		public function getPonto(){
			return $this->ponto;
		}
		
		public function setPonto($ponto){
			$this->ponto = $ponto;
		}
		
		public function getCampeonato(){
			return $this->campeonato;
		}
		
		public function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}
		
		//Função que cadastra campeonato
		public function cadastrarTabela($tabela){
		
			$conn = Database::conexao();
		
			$vitoria = $this->getVitoria();
			$empate = $this->getEmpate();
			$derrota = $this->getDerrota();
			$ponto = $this->getPonto();
			$campeonato = $this->getCampeonato();
		
			$insercaoNovaTabela = "INSERT INTO Tabela VALUES (DEFAULT,'$vitoria','$empate','$derrota','$ponto','$campeonato');";
			$conn->exec($insercaoNovaTabela);
			
		
		}
		
		//Recolhe ultimo id de tabela do campeonato
		public function recolherUltimoIdTabela($campeonato){
			
			$idCampeonato = $this->getCampeonato();
			
			$conn = Database::conexao();
				
			$consultaUltimoId = 'SELECT MAX(id) FROM Tabela WHERE campeonato = ?;';
			$preparaConsultaUltimoId = $conn->prepare($consultaUltimoId);
			$preparaConsultaUltimoId->bindValue(1, $idCampeonato);
			$preparaConsultaUltimoId->execute();
				
			$result = $preparaConsultaUltimoId->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaUltimoId->fetch()) {
				$id = $row[0];
			}
				
			return $id;
				
		}
		
		//Consulta a tabela do campeonato
		public function consultaTabelaCampeonato($tabela){
			$idCampeonato = $this->getCampeonato();
			$tabelaCampeonato = array();
		
			//Listando times ordenado por número de pontos
			$conn = Database::conexao();
		
			$consultaTabela = 'SELECT Time.nome, Tabela.vitoria, Tabela.derrota, Tabela.empate, Tabela.pontos FROM Tabela,Time 
			WHERE Tabela.campeonato = ? and Time.tabela = tabela.id ORDER BY pontos DESC';
			$preparaConsultaTabela = $conn->prepare($consultaTabela);
			$preparaConsultaTabela->bindValue(1, $idCampeonato);
			$preparaConsultaTabela->execute();
		
			$result = $preparaConsultaTabela->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTabela->fetch()) {
				$tabelaCampeonato[] = $row[0];
				$tabelaCampeonato[] = $row[1];
				$tabelaCampeonato[] = $row[2];
				$tabelaCampeonato[] = $row[3];
				$tabelaCampeonato[] = $row[4];
			}
			return $tabelaCampeonato;
		}
		
		//Exibi tabela do array passado
		public function visualizaTabelaCampeonato($tabela){
		
			$colunas = 5;
		
			for($i=0; $i < count($tabela); $i++) {
				echo "<td>".$tabela[$i]."</td>";
				if((($i+1) % $colunas) == 0 )
					echo "</tr><tr>";
			}
		
		}
		
		//Atualiza dados do time vencedor
		public function atualizaTimeVencedorTabela($time){
		
			$id = $time[0];
			$vitoria = $time[1] + 1;
			$pontos = $time[4]+3;
		
			$conn = Database::conexao();
		
			$atualizaTimeVencedor = 'UPDATE Tabela SET  vitoria = ?, pontos = ? WHERE id = ?';
			$preparaAtualizaTimeVencedor = $conn->prepare($atualizaTimeVencedor);
			$preparaAtualizaTimeVencedor->bindValue(1,$vitoria);
			$preparaAtualizaTimeVencedor->bindValue(2,$pontos);
			$preparaAtualizaTimeVencedor->bindValue(3,$id);
			$preparaAtualizaTimeVencedor->execute();
		
		}
		
		//Atualiza os dados do time perdedor
		public function atualizaTimePerdedorTabela($time){
			$id = $time[0];
			$derrota = $time[2]+1;
		
			$conn = Database::conexao();
		
			$atualizaTimePerdedor = 'UPDATE Tabela SET  derrota = ? WHERE id = ?';
			$preparaAtualizaTimePerdedor = $conn->prepare($atualizaTimePerdedor);
			$preparaAtualizaTimePerdedor->bindValue(1,$derrota);
			$preparaAtualizaTimePerdedor->bindValue(2,$id);
			$preparaAtualizaTimePerdedor->execute();
		}
		
		//Atualiza os daod dos times que empatarem
		public function empateTabela($time){
		
			$empate = $time[3]+1;
			$pontos = $time[4]+1;
			$id = $time[0];
		
			$conn = Database::conexao();
			$atualizaTimeEmpate = 'UPDATE Tabela SET  empate = ?, pontos = ? WHERE id = ?';
			$preparaAtualizaTimeEmpate = $conn->prepare($atualizaTimeEmpate);
			$preparaAtualizaTimeEmpate->bindValue(1,$empate);
			$preparaAtualizaTimeEmpate->bindValue(2,$pontos);
			$preparaAtualizaTimeEmpate->bindValue(3,$id);
			$preparaAtualizaTimeEmpate->execute();
		
		}
		
		//Consulta dados da tabela do time selecionado
		public function consultaTabela($tabelaTime){
			
			$timeTabela = array();

			
			$conn = Database::conexao();
		
			$consultaTabelaTime = 'SELECT id,vitoria,derrota,empate,pontos FROM Tabela WHERE id = ?';
			$preparaConsultaTabelaTime = $conn->prepare($consultaTabelaTime);
			$preparaConsultaTabelaTime->bindValue(1, $tabelaTime);
			$preparaConsultaTabelaTime->execute();
		
			$result = $preparaConsultaTabelaTime->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTabelaTime->fetch()) {
					
				$timeTabela[] = $row[0];
				$timeTabela[] = $row[1];
				$timeTabela[] = $row[2];
				$timeTabela[] = $row[3];
				$timeTabela[] = $row[4];
					
			}
		
			return $timeTabela;
		
		}
		
		//COnsulta para obter o time que mais tem pontos em determinado campeonato
		public function consultaTimeCampeao($tabela){
		
			$idCampeonato = $this->getCampeonato();
			
			$conn = Database::conexao();
		
			$consultaTabelaCampeao = 'SELECT MAX(pontos) FROM Tabela WHERE campeonato = ?';
			$preparaConsultaTabelaCampeao = $conn->prepare($consultaTabelaCampeao);
			$preparaConsultaTabelaCampeao->bindValue(1, $idCampeonato);
			$preparaConsultaTabelaCampeao->execute();
		
			$result = $preparaConsultaTabelaCampeao->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaTabelaCampeao->fetch()) {
					
				$idTabelaTimeCampeao = $row[0];		
			}
		
			return $idTabelaTimeCampeao;
		
		}
		
		
	}

?>