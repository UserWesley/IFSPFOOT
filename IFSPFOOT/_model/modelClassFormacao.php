<?php 
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassFormacao {
		
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
		
		public function cadastrarFormacao($formacao){
		
			$conn = Database::conexao();
		
			$nome = $this->getNome();
		
			$insercaoNovaFormacao = "INSERT INTO Formacao VALUES (DEFAULT,'$nome')";
			$conn->exec($insercaoNovaFormacao);
		
		}
	}

?>