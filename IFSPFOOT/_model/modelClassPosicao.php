<?php

	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassPosicao{
	
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
	
		//Consulta Posicao
		public function consultaPosicao(){
	
			$posicoesDisponiveis = array();
	
			$conn = Database::conexao();
	
			$consultaPosicao = 'SELECT id FROM Posicao';
			$preparaConsultaPosicao= $conn->query($consultaPosicao);
			$preparaConsultaPosicao->execute();
	
			$result = $preparaConsultaPosicao->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaPosicao->fetch()) {
					
				$posicoesDisponiveis[]= $row[0];
					
			}
	
			return $posicoesDisponiveis;
	
		}
		//Sortea um posicao
		public function sortearPosicao($posicoesDisponiveis){
	
			$valorMaximo = count($posicoesDisponiveis);
			$nome = rand(1,$valorMaximo);
	
			return $nome;
		}
	
	}