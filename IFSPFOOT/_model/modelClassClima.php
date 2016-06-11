<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	Class modelClassClima {
		
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
		
		
		public function cadastrarClima($clima){
		
			$conn = Database::conexao();
		
			$clima = $this->getNome();
		
			$insercaoNovoClima = "INSERT INTO Clima VALUES (DEFAULT,'$nome')";
			$conn->exec($insercaoNovoClima);
		
		}
		public function recolheClimas(){
			
			$conn = Database::conexao();
			
			$climas = array();
				
			$consultaClimas = 'SELECT id FROM Clima';
			$preparaConsultaClima = $conn->query($consultaClimas);
			$preparaConsultaClima->execute();
				
			$result = $preparaConsultaClima->setFetchMode(PDO::FETCH_NUM);
			
			while ($row = $preparaConsultaClima->fetch()) {
				$climas[] = $row[0];
			}
				
			return $climas;
			
		}
		
		public function sorteioClima($climasDisponiveis){
			
			$clima = array_rand($climasDisponiveis,1);
			
			return $climasDisponiveis[$clima];
		}
	}