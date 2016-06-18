<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassNacionalidade{
	
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
	
		//Consulta Nacionalidade
		public function consultaNacionalidade(){
	
			$nacionalidadesDisponiveis = array();
	
			$conn = Database::conexao();
	
			$consultaNacionalidade = 'SELECT id FROM Nacionalidade';
			$preparaConsultaNacionalidade= $conn->query($consultaNacionalidade);
			$preparaConsultaNacionalidade->execute();
	
			$result = $preparaConsultaNacionalidade->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaNacionalidade->fetch()) {
					
				$nacionalidadesDisponiveis[]= $row[0];
					
			}
	
			return $nacionalidadesDisponiveis;
	
		}
		
		//Sortea uma nacionalidade
		public function sortearNacionalidade($nacionalidadesDisponiveis){
	
			$valorMaximo = count($nacionalidadesDisponiveis);
			$nome = rand(1,$valorMaximo);
	
			return $nome;
		}
	
	}