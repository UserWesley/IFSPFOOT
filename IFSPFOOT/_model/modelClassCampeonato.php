<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassCampeonato{
		
		//Variáveis
		private $id;
		private $nome;
		private $rodadaAtual;
		private $temporada;
		private $nomeCarregamento;
		private $usuario;
		
		//Getters e setters
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}

		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getRodadaAtual(){
			return $this->rodadaAtual;
		}
		
		public function setRodadaAtual($rodadaAtual){	
			$this->rodadaAtual = $rodadaAtual;	
		}
		
		public function getTemporada(){
			return $this->temporada;
		}
		
		public function setTemporada($temporada){
			$this->temporada = $temporada;
		}
		
		public function getNomeCarregamento(){
			return $this->nomeCarregamento;
		}
		
		public function setNomeCarregamento($nomeCarregamento){
			$this->nomeCarregamento = $nomeCarregamento;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		
		//Cadastro do campeonato inicial
		public function cadastrarCampeonato($campeonato){
			
			$conn = Database::conexao();
			
			$nome= $this->getNome();
			$rodadaAtual = $this->getRodadaAtual();
			$temporada = $this->getTemporada();
			$nomeCarregamento= $this->getNomeCarregamento();
			$usuario= $this->getUsuario();	
			
			$insercaoNovoCampeonato = "INSERT INTO Campeonato VALUES (DEFAULT,'$nome','$rodadaAtual'
			, '$temporada','$nomeCarregamento','$usuario')";
			$conn->exec($insercaoNovoCampeonato);
			
		}
		
		//O certo era recolher pelo pg_lastid, ou na sequence ou retorno
		public function recolherUltimoIdCampeonato($campeonato){
			
			$usuario = $this->getUsuario();
			$nomeCarregamento = $this->getNomeCarregamento();
		
			$conn = Database::conexao();
			
			$consultaUltimoId = ("SELECT MAX(id) FROM Campeonato WHERE usuario = ? and nomeCarregamento = ?;");
			$preparaConsultaUltimoId = $conn->prepare($consultaUltimoId);
			$preparaConsultaUltimoId->bindValue(1, $usuario);
			$preparaConsultaUltimoId->bindValue(2, $nomeCarregamento);
			$preparaConsultaUltimoId->execute();
			
			$result = $preparaConsultaUltimoId->setFetchMode(PDO::FETCH_NUM);
				
			while ($row = $preparaConsultaUltimoId->fetch()) {
				$id = $row[0];
			}
			
			return $id;

		}
		
		//Recolhe rodada atual do campeonato
		public function rodadaAtual($campeonato){
			
			$idCampeonato = $this->getId();
			$conn = Database::conexao();

			$consultaCampeonatoRodadaAtual = ("SELECT rodadaAtual FROM Campeonato where id = ?;");
			$preparaConsultaCampeonatoRodadaAtual = $conn->prepare($consultaCampeonatoRodadaAtual);
			$preparaConsultaCampeonatoRodadaAtual->bindValue(1,$idCampeonato);
			$preparaConsultaCampeonatoRodadaAtual->execute();
			
			$result = $preparaConsultaCampeonatoRodadaAtual->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaCampeonatoRodadaAtual->fetch()) {
				$rodada = $row[0];
			}
			
			return $rodada;
		}
		
		public function avancaRodada($rodada){
			
			$campeonato = $this->getId();
			$rodada = $this->getRodadaAtual();
			
			$rodada++;
			
			$conn = Database::conexao();
			
			$atualizaCampeonatoRodadaAtual = 'UPDATE Campeonato SET rodadaAtual = ? WHERE id = ?';
			$preparaAtualizaCampeonatoRodadaAtual = $conn->prepare($atualizaCampeonatoRodadaAtual);
			$preparaAtualizaCampeonatoRodadaAtual->bindValue(1,$rodada);
			$preparaAtualizaCampeonatoRodadaAtual->bindValue(2,$campeonato);
			$preparaAtualizaCampeonatoRodadaAtual->execute();
			
		}
		
		public function consultaNomeCarregamento($campeonato){
			
			$nomeCarregamento = $this->getNomeCarregamento();
			$idUsuario = $this->getUsuario();
			
			$conn = Database::conexao();
				
			$resultado = NULL;
				
			$consultaNomeCarregamento = 'SELECT nomeCarregamento FROM Campeonato WHERE nomeCarregamento = ? and usuario = ? ';
			$preparaConsultaNomeCarregamento = $conn->prepare($consultaNomeCarregamento);
			$preparaConsultaNomeCarregamento->bindValue(1, $nomeCarregamento);
			$preparaConsultaNomeCarregamento->bindValue(2, $idUsuario);
			$preparaConsultaNomeCarregamento->execute();
			
			$result = $preparaConsultaNomeCarregamento->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaNomeCarregamento->fetch()) {
					
				$resultado = $row[0];
					
			}
			//Retorna null caso seja válido, e retorno o nomeCarregamento caso já tenha
			return $resultado;
				
		}
		
		public function consultaTodosNomeCarregamento($usuario){
			
			$conn = Database::conexao();
			
			$resultado = array();
			
			$consultaNomeCarregamento = 'SELECT nomeCarregamento FROM Campeonato WHERE usuario = ? ';
			$preparaConsultaNomeCarregamento = $conn->prepare($consultaNomeCarregamento);
			$preparaConsultaNomeCarregamento->bindValue(1, $usuario);
			$preparaConsultaNomeCarregamento->execute();
				
			$result = $preparaConsultaNomeCarregamento->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaNomeCarregamento->fetch()) {
					
				$resultado[] = $row[0];
					
			}
			//Retorna null caso seja válido, e retorno o nomeCarregamento caso já tenha
			return $resultado;
			
		}
		
		public function consultaIdCampeonato($campeonato){
			
			$nomeCarregamento = $this->getNomeCarregamento();
			$usuario = $this->getUsuario();
			
			$conn = Database::conexao();
			
			$consultaIdCampeonato = 'SELECT id FROM Campeonato WHERE nomeCarregamento = ? and usuario = ?';
			$preparaConsultaIdCampeonato = $conn->prepare($consultaIdCampeonato);
			$preparaConsultaIdCampeonato->bindValue(1, $nomeCarregamento);
			$preparaConsultaIdCampeonato->bindValue(2, $usuario);
			$preparaConsultaIdCampeonato->execute();
			
			$result = $preparaConsultaIdCampeonato->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaIdCampeonato->fetch()) {
					
				$id = $row[0];
					
			}
			
			return $id;
			
		}
	}