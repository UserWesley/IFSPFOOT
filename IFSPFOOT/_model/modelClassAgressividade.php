<?php 

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassAgressividade {
		
		private $id;
		private $nome;
		
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
		
		public function cadastrarAgressividade($agressividade){
		
			$conn = Database::conexao();
		
			$nome = $this->getNome();
		
			$insercaoNovaAgressividade = "INSERT INTO Agressevidade VALUES (DEFAULT,'$nome')";
			$conn->exec($insercaoNovaAgressividade);
		
		}
		
		public function consultaAgressividade(){
		
			$agressividadesDisponiveis = array();
		
			$conn = Database::conexao();
		
			$consultaAgressividade = 'SELECT id,nome FROM Agressividade;';
			$preparaConsultaAgressividade= $conn->query($consultaAgressividade);
			$preparaConsultaAgressividade->execute();
		
			$result = $preparaConsultaAgressividade->setFetchMode(PDO::FETCH_NUM);
		
			while ($row = $preparaConsultaAgressividade->fetch()) {
		
				$agressividadesDisponiveis[] = $row[0];
				$agressividadesDisponiveis[] = $row[1];
		
			}
		
			return $agressividadesDisponiveis;
		
		}
		
	}


?>