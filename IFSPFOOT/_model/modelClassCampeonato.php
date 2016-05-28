<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados1.php';

	Class modelClassCampeonato{
		
		private $id;
		private $nome;
		private $rodadaAtual;
		private $temporada;
		private $vencedor;
		private $usuario;
	
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
		
		public function getVencedor(){
			return $this->vencedor;
		}
		
		public function setVencedor($vencedor){
			$this->vencedor = $vencedor;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		
		public function cadastrarCampeonato($campeonato){
			
			$conn = Database::conexao();
			
			$id = $this->getId();
			$nome= $this->getNome();
			$rodadaAtual = $this->getRodadaAtual();
			$temporada = $this->getTemporada();
			$vencedor= $this->getVencedor();
			$usuario= $this->getUsuario();
			
			//Cadastro do campeonato inicial
			$insercaoNovoCampeonato = "INSERT INTO Campeonato VALUES ('$id','$nome','$rodadaAtual'
			, '$temporada','$vencedor','$usuario')";
			$conn->exec($insercaoNovoCampeonato);
		
		}
		
		public function rodadaAtual(){
			
			$conn = Database::conexao();
			
			$consultaCampeonatoRodadaAtual = 'SELECT rodadaAtual FROM Campeonato;';
			$preparaConsultaCampeonatoRodadaAtual = $conn->query($consultaCampeonatoRodadaAtual);
			$preparaConsultaCampeonatoRodadaAtual->execute();
			
			$result = $preparaConsultaCampeonatoRodadaAtual->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaCampeonatoRodadaAtual->fetch()) {
				$rodada = $row[0];
			}
			
			return $rodada;
		}
		
		public function avancaRodada($rodada){
			
			$rodada++;
			
			$conn = Database::conexao();
			
			$atualizaCampeonatoRodadaAtual = 'UPDATE Campeonato SET rodadaAtual = ? WHERE id = 1';
			$preparaAtualizaCampeonatoRodadaAtual = $conn->prepare($atualizaCampeonatoRodadaAtual);
			$preparaAtualizaCampeonatoRodadaAtual->bindValue(1,$rodada);
			$preparaAtualizaCampeonatoRodadaAtual->execute();
			
		}
		
	}
	
?>