<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassNomePessoal{
	
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
	
		public function cadastrarNomePessoal($nomePessoal){
			
			$nome = $this->getNome();
				
			$conn = Database::conexao();
		
			$insercaoNovoNomePessoal = "INSERT INTO NomePessoal VALUES (DEFAULT,'$nome')";
			$conn->exec($insercaoNovoNomePessoal);
				
				
		}
		public function consultaNomePessoal(){
				
			$nomesPessoais = array();
			
			$conn = Database::conexao();
			
			$consultaNomePessoal = 'SELECT id FROM NomePessoal';
			$preparaConsultaNomePessoal = $conn->query($consultaNomePessoal);
			$preparaConsultaNomePessoal->execute();
			
			$result = $preparaConsultaNomePessoal->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaNomePessoal->fetch()) {
			
				$nomesPessoais[]= $row[0];
			
			}
				
			return $nomesPessoais;
			
		}
		public function sortearNomePessoal($nomesPessoais){

			do{
				$nome = array_rand($nomesPessoais,1);
			}while ($nome ==0);
				
			return $nome;
		}
	}