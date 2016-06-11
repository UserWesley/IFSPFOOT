<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassHabilidade{
		
		private $id;
		private $agilidade;
		private $ataque;
		private $chute;
		private $defesa;
		private $forca;
		private $passe;
		private $resistencia;
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getAgilidade(){
			return $this->agilidade;
		}
		
		public function setAgilidade($agilidade){
			$this->agilidade = $agilidade;
		}
		
		public function getAtaque(){
			return $this->ataque;
		}
		
		public function setAtaque($ataque){
			$this->ataque = $ataque;
		}
		
		public function getChute(){
			return $this->chute;
		}
		
		public function setChute($chute){
			$this->chute = $chute;
		}
		
		public function getDefesa(){
			return $this->defesa;
		}
		
		public function setDefesa($defesa){
			$this->defesa = $defesa;
		}
		
		public function getForca(){
			return $this->forca;
		}
		
		public function setForca($forca){
			$this->forca = $forca;
		}
		
		public function getPasse(){
			return $this->passe;
		}
		
		public function setPasse($passe){
			$this->passe = $passe;
		}
		
		public function getResistencia(){
			return $this->resistencia;
		}
		
		public function setResistencia($resistencia){
			$this->resistencia = $resistencia;
		}
		
		public function cadastrarHabilidade(){
			
			$conn = Database::conexao();
				
			$agilidade= $this->getAgilidade();
			$ataque = $this->getAtaque();
			$chute = $this->getChute();
			$defesa = $this->getDefesa();
			$forca = $this->getForca();
			$passe = $this->getPasse();
			$resistencia = $this->getResistencia();
				
			//Cadastro de habilidade
			$insercaoNovoCampeonato = "INSERT INTO Habilidade VALUES (DEFAULT,'$agilidade','$ataque'
			, '$chute','$defesa','$forca','$passe','$resistencia')";
			$conn->exec($insercaoNovoCampeonato);
			
		}
		
		public function recolheUltimoIdHabilidade(){
			
			$conn = Database::conexao();
				
			$consultaUltimoId = 'SELECT MAX(id) FROM Habilidade;';
			$preparaConsultaUltimoId = $conn->query($consultaUltimoId);
			$preparaConsultaUltimoId->execute();
				
			$result = $preparaConsultaUltimoId->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaUltimoId->fetch()) {
				$id = $row[0];
			}
				
			return $id;
				
		}
	}

?>