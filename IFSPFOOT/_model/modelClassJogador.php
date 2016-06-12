<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassJogador{
		
		private $id;
		private $titular;
		private $nome;
		private $sobrenome;
		private $nacionalidade;
		private $idade;
		private $estamina;
		private $nivel;
		private $gol;
		private $passe;
		private $salario;
		private $idTime;
		private $posicao;
		private $habilidade;
		private $temperamento;
		private $estilo;
		private $campeonato;
		
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
		
		public function getNacionalidade(){
			return $this->nacionalidade;
		}
		
		public function setNacionalidade($nacionalidade){
			$this->nacionalidade = $nacionalidade;
		}
		
		public function getIdade(){
			return $this->idade;
		}
		
		public function setIdade($idade){
			$this->idade = $idade;
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
		
		public function getPasse(){
			return $this->passe;
		}
		
		public function setPasse($passe){
			$this->passe = $passe;
		}
		
		public function getSalario(){
			return $this->salario;
		}
		
		public function setSalario($salario){
			$this->salario = $salario;
		}
		
		public function getIdTime(){
			return $this->idTime;
		}
		
		public function setIdTime($idTime){
			$this->idTime = $idTime;
		}
		
		public function getPosicao(){
			return $this->posicao;
		}
		
		public function setPosicao($posicao){
			$this->posicao = $posicao;
		}
		
		public function getHabilidade(){
			return $this->habilidade;
		}
		
		public function setHabilidade($habilidade){
			$this->habilidade = $habilidade;
		}
		
		public function getTemperamento(){
			return $this->temperamento;
		}
		
		public function setTemperamento($temperamento){
			$this->temperamento = $temperamento;
		}
		
		public function getEstilo(){
			return $this->estilo;
		}
		
		public function setEstilo($estilo){
			$this->estilo = $estilo;
		}
		
		public function getCampeonato(){
			return $this->campeonato;
		}
		
		public function setCampeonato($campeonato){
			$this->campeonato = $campeonato;
		}
		
		public function cadastrarJogador($jogador){
			
			$titular = $this->getTitular();
			$nome = $this->getNome();
			$sobrenome = $this->getSobrenome();
			$nacionalidade = $this->getNacionalidade();
			$idade = $this->getIdade();
			$estamina = $this->getEstamina();
			$nivel = $this->getNivel();
			$gol = $this->getGol();
			$passe = $this->getPasse();
			$salario = $this->getSalario();
			$idTime = $this->getIdTime();
			$posicao = $this->getPosicao();
			$habilidade = $this->getHabilidade();
			$temperamento = $this->getTemperamento();
			$estilo = $this->getEstilo();
			$campeonato = $this->getCampeonato();
			
			$conn = Database::conexao();
			
			$insercaoNovoJogador = "INSERT INTO Jogador VALUES (DEFAULT,'$titular','$nome','$sobrenome','$nacionalidade',
			'$idade','$estamina','$nivel','$gol','$passe','$salario','$idTime','$posicao','$habilidade','$temperamento','$estilo','$campeonato');";
			
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
		
		public function visualizaJogador($jogadores){
			
			$colunas = 11;
			 
			for($i=0; $i < count($jogadores); $i++) {
				echo "<td>".$jogadores[$i]."</td>";
				if((($i+1) % $colunas) == 0 )
					echo "</tr><tr>";
			}
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
		
		public function visualizaArtilharia($jogadoresArtilharia){
			
			$colunas = 4;
			
			for($i=0; $i < count($jogadoresArtilharia); $i++) {
				echo "<td>".$jogadoresArtilharia[$i]."</td>";
				if((($i+1) % $colunas) == 0 )
					echo "</tr><tr>";
			}
		}
		
		//Esta função consulta jogadores do time selecionado e retorna em forma array
		public function consultaJogadorTime($idTime){
			
			$jogadorTime = array();
			
			$conn = Database::conexao();
			
			$consultaJogador = 'SELECT Jogador.titular, Jogador.nome, Jogador.sobrenome, Jogador.nacionalidade, Jogador.idade,
			 Jogador.estamina, Jogador.nivel, Jogador.gol, Jogador.passe, Jogador.salario, posicao.nome FROM Jogador,posicao WHERE idTime = ? and  jogador.posicao = posicao.id ';
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
		
		public function visualizaJogadorTime($jogadoresTime){
			
			$colunas = 11;
			 
			for($i=0; $i < count($jogadoresTime); $i++) {
				echo "<td>".$jogadoresTime[$i]."</td>";
				if((($i+1) % $colunas) == 0 )
					echo "</tr><tr>";
			}
		}
	}
?>
