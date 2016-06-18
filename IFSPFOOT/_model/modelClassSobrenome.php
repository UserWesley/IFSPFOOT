<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassSobrenome{
	
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
	
		public function cadastrarSobrenome($sobrenome){
			
			$nome = $this->getNome();
				
			$conn = Database::conexao();
		
			$insercaoNovoSobrenome = "INSERT INTO Sobrenome VALUES (DEFAULT,'$nome')";
			$conn->exec($insercaoNovoSobrenome);
				
				
		}
		public function consultaSobrenome(){
				
			$sobrenomes = array();
			
			$conn = Database::conexao();
			
			$consultaSobrenome = 'SELECT id FROM Sobrenome';
			$preparaConsultaSobrenome = $conn->query($consultaSobrenome);
			$preparaConsultaSobrenome->execute();
			
			$result = $preparaConsultaSobrenome->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaSobrenome->fetch()) {
			
				$sobrenomes[]= $row[0];
			
			}
				
			return $sobrenomes;
			
		}
		public function sortearSobrenome($sobrenomes){
			
			do{	
				$nome = array_rand($sobrenomes,1);
			}while ($nome == 0);
			
			return $nome;
		}
	}