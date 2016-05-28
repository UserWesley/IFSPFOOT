<?php 

	Class modelClassJogador{
		
		private $id;
		private $titular;
		private $nome;
		private $sobrenome;
		private $posicao;
		private $nacionalidade;
		private $habilidade;
		private $idade;
		private $forca;
		private $idTime;
		private $estamina;
		private $nivel;
		private $gol;
		
		public function __destruct(){
			
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getTitular(){
			return $this->titular;
		}
		
		public function setTitular($titular){
			$this->titular = $titular;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getSobrenome(){
			return $this->sobrenome;
		}
		
		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
		
		public function getPosicao(){
			return $this->posicao;
		}
		
		public function setPosicao($posicao){
			$this->posicao = $posicao;
		}
		
		public function getNacionalidade(){
			return $this->nacionalidade;
		}
		
		public function setNacionalidade($nacionalidade){
			$this->nacionalidade = $nacionalidade;
		}
		
		public function getHabilidade(){
			return $this->habilidade;
			
		}
		
		public function setHabilidade($habilidade){
			$this->habilidade = $habilidade;
		}
		
		public function getIdade(){
			return $this->idade;
		}
		
		public function setIdade($idade){
			$this->idade = $idade;
		}
		
		public function getForca(){
			return $this->forca;
		}
		
		public function setForca($forca){
			$this->forca = $forca;
		}
		
		public function getIdtime(){
			return $this->idTime;
		}
		
		public function setIdtime($idTime){
			$this->idTime = $idTime;
		}

		public function getEstamina(){
			return $this->estamina;
		}
		
		public function setEstamina($estamina){
			$this->estamina = $estamina;	
		}
		
		public function getNivel(){
			return $this->nivel;
		}
		
		public function setNivel($nivel){
			$this->nivel = $nivel;
		}
		
		public function getGol(){
			return $this->gol;
		}
		
		public function setGol($gol){
			$this->gol = $gol;
		}
		
		public function cadastrarJogador($jogador){
			
			$id = $this->getId();
			$titular = $this->getTitular();
			$nome = $this->getNome();
			$sobrenome = $this->getSobrenome();
		    $posicao = $this->getPosicao();
			$nacionalidade = $this->getNacionalidade();
			$habilidade = $this->getHabilidade();
			$idade = $this->getIdade();
			$forca = $this->getForca();
			$idTime = $this->getIdtime();
			$estamina = $this->getEstamina();
			$nivel = $this->getNivel();
			$gol = $this->getGol();
			
			$conn = Database::conexao();
			
			$insercaoNovoJogador = "INSERT INTO Jogador VALUES ('$id','$titular','$nome','$sobrenome','$posicao',
			'$nacionalidade','$habilidade','$idade','$forca','$idTime','$estamina','$nivel','$gol')";
			
			$conn->exec($insercaoNovoJogador);
			
		}
		
		
		public function consultaJogador($idTime){

			$jogadoresTime = array();
			
			$conn = Database::conexao();
			
			$consultaJogador = 'SELECT id FROM Jogador WHERE idTime = ?';
			$preparaConsultaJogador = $conn->prepare($consultaJogador);
			$preparaConsultaJogador->bindValue(1, $idTime);
			$preparaConsultaJogador->execute();
			
			$result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaJogador->fetch()) {
					
				$jogadoresTime[] = $row[0];
			
			}
			
			return $jogadoresTime;
			
		}
		
		public function sorteiaJogador($jogadores){
			
			$recebeIndexArrayJogadorTime = array_rand($jogadores, 1);
			$quemFezGolTime = $jogadores[$recebeIndexArrayJogadorTime];

			return $quemFezGolTime;
			
		}
		public function consultaGol($jogador){
			
			$conn = Database::conexao();
			
			$consultaGolJogador = 'SELECT gol FROM Jogador WHERE id = ?';
			$preparaConsultaGolJogador = $conn->prepare($consultaGolJogador);
			$preparaConsultaGolJogador->bindValue(1, $jogador);
			$preparaConsultaGolJogador->execute();
			
			$result = $preparaConsultaGolJogador->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaGolJogador->fetch()) {
					
				$quantidadeGolJogador = $row[0];
					
			}
			
			return $quantidadeGolJogador;
			
		}
		
		public function inseriGol($quantidadeGolJogador,$jogadorTime){
			
			$quantidadeGolJogador++;
			
			$conn = Database::conexao();
			
			$atualizaGolJogador = 'UPDATE Jogador SET gol= ? WHERE id = ?';
			$preparaAtualizaGolJogador = $conn->prepare($atualizaGolJogador);
			$preparaAtualizaGolJogador->bindValue(1,$quantidadeGolJogador);
			$preparaAtualizaGolJogador->bindValue(2,$jogadorTime);
			$preparaAtualizaGolJogador->execute();
			
		}
		
		public function consultaArtilheiria(){
			
			$jogadoresArtilharia = array();
			
			$conn = Database::conexao();
			
			$consultaJogador = 'SELECT Jogador.nome, Jogador.sobrenome,Time.nome,Jogador.gol FROM Jogador,Time WHERE Jogador.idTime = Time.id ORDER BY Jogador.gol DESC';
			$preparaConsultaJogador = $conn->query($consultaJogador);
			$preparaConsultaJogador->execute();	
				
			while ($row = $preparaConsultaJogador->fetch()) {
					
				$jogadoresArtilharia[] = $row[0];
				$jogadoresArtilharia[] = $row[1];
				$jogadoresArtilharia[] = $row[2];
				$jogadoresArtilharia[] = $row[3];
			}
				
			return $jogadoresArtilharia;
				
		}
		
		public function consultaJogadorTime($idTime){
			
			$jogadorTime = array();
			
			$conn = Database::conexao();
			
			$consultaJogador = 'SELECT titular,nome ,sobrenome,posicao,nacionalidade,habilidade ,idade ,forca ,estamina ,nivel,gol FROM Jogador WHERE idTime = ? ';
			$preparaConsultaJogador = $conn->prepare($consultaJogador);
			$preparaConsultaJogador->bindValue(1, $idTime);
			$preparaConsultaJogador->execute();
			
			$result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaJogador->fetch()) {
				
				$jogadorTime[] = $row[0];
				$jogadorTime[] = $row[1];
				$jogadorTime[] = $row[2];
				$jogadorTime[] = $row[3];
				$jogadorTime[] = $row[4];
				$jogadorTime[] = $row[5];
				$jogadorTime[] = $row[6];
				$jogadorTime[] = $row[7];
				$jogadorTime[] = $row[8];
				$jogadorTime[] = $row[9];
				$jogadorTime[] = $row[10];
				
			}
			
			return $jogadorTime;
		}
	}

?>