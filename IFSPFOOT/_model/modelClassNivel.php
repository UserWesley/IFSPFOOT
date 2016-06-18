<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassNivel{
	
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
	
		//Consulta Nivel
		public function consultaNivel(){
	
			$niveisDisponiveis = array();
	
			$conn = Database::conexao();
	
			$consultaNivel = 'SELECT id FROM Nivel';
			$preparaConsultaNivel= $conn->query($consultaNivel);
			$preparaConsultaNivel->execute();
	
			$result = $preparaConsultaNivel->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaNivel->fetch()) {
					
				$niveisDisponiveis[]= $row[0];
					
			}
	
			return $niveisDisponiveis;
	
		}
		//Sortea um posicao
		public function sortearNivel($niveisDisponiveis){
	
			$valorMaximo = count($niveisDisponiveis);
			$nome = rand(1,$valorMaximo);
	
			return $nome;
		}
	
	}