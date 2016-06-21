<?php
	session_start();

	$idTime = $_SESSION['idDono'];

	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';

	class controllerClassProduto{
		
		private $id_produto;
		private $nome;
		private $valor;
		private $quantidade;
		private $idEstadio;

		public function getId_produto(){
			return $this->id;
		}
		
		public function setId_produto($id){
			$this->id = $id;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getValor(){
			return $this->valor;
		}
		
		public function setValor($valor){
			$this->valor = $valor;
		}

		public function getQuantidade(){
			return $this->quantidade;
		}
		
		public function setQuantidade($quantidade){
			$this->quantidade = $quantidade;
		}
		
		public function getIdEstadio(){
			return $this->IdEstadio;
		}
		
		public function setIdEstadio($IdEstadio){
			$this->IdEstadio = $IdEstadio;
		}
				
		public function cadastrarProduto($Produtos){
			
			$conn = Database::conexao();
			
			$id = $this->getId();
			$nome = $this->getNome();
			$valor = $this->getValor();
			
			
			$insercaoNovoProduto = "INSERT INTO Produtos 
									VALUES ('$id','$nome','$valor')";
			$conn->exec($insercaoNovoProduto);
			
		}

		public function buscarProduto(){


			$arrayProduto = array();

			$conn = Database::conexao();

			$buscarProduto = "SELECT id
									,nome 
									,preco
							  FROM Produtos";

		   	$preparaBuscarProduto= $conn->prepare($buscarProduto);
		   	$preparaBuscarProduto->execute();
		   	
		   	$result = $preparaBuscarProduto->setFetchMode(PDO::FETCH_ASSOC);
		   	
		   	while ($row = $preparaBuscarProduto->fetch()) {
				$arrayProduto[] = $row;
			}

			return $arrayProduto; 				  
		}


		public function buscarDinheiroDoClub(){

			$idTime = $_SESSION['idDono'];
			$idCampeonato = $_SESSION['IdCampeonato'];

			$conn = Database::conexao();

			$arrayDinheiro = array();

			$buscarDinheiroDoClub = "SELECT cast(time.dinheiro as float)
									 FROM time
									 WHERE id = ? and campeonato = ?";

			$preparaBuscarDinheiro = $conn->prepare($buscarDinheiroDoClub);
			$preparaBuscarDinheiro->bindValue(1,$idTime); 
			$preparaBuscarDinheiro->bindValue(2,$idCampeonato);
			$preparaBuscarDinheiro->execute();


			$result = $preparaBuscarDinheiro->setFetchMode(PDO::FETCH_ASSOC);

			while ($row = $preparaBuscarDinheiro->fetch()) {
				$arrayDinheiro[] = $row;
			}

			return $arrayDinheiro;

		}

		public function acharIdDoEstadioPorCampeonato(){
			$conn = Database::conexao();
			
			$idTime = $_SESSION['idDono'];
			$idCampeonato = $_SESSION['IdCampeonato'];
				
			
			$buscarEstadioCampeonato = "SELECT estadio.id
										FROM estadio as estadio
    								        ,time as time
										WHERE time.id = estadio.id
										AND time.id = ( SELECT time.id 
														FROM time as time, 
															 campeonato as campeonato 
													    WHERE time.dono = '$idTime' and time.campeonato = '$idCampeonato'
													    AND time.campeonato = campeonato.id)";
			$preparaBuscarEstadioCampeonato = $conn->prepare($buscarEstadioCampeonato);
			//$preparaBuscarEstadioCampeonato->bindValue(1,$idTime);
			$preparaBuscarEstadioCampeonato->execute();

			$result = $preparaBuscarEstadioCampeonato->setFetchMode(PDO::FETCH_NUM);

			$idEstadio = array();

			while ($row = $preparaBuscarEstadioCampeonato->fetch()) {
				$idEstadio = $row[0];
			}

			return $idEstadio;
		}

		
		
		public function buscarIdtime(){

			$conn = Database::conexao();

			$idTime = $_SESSION['idDono'];
			$idCampeonato = $_SESSION['IdCampeonato'];

			$buscarIdtimePorCampeonato = "SELECT id
							 			  FROM time 
							 			  WHERE dono = '$idTime'
							 			  AND time.campeonato = '$idCampeonato';";
			$preparaBuscarIdTime = $conn->prepare($buscarIdtimePorCampeonato);
			$preparaBuscarIdTime->execute();

			$result = $preparaBuscarIdTime->setFetchMode(PDO::FETCH_NUM);
			
			$idTimeCampeonato = array();

			while($row - $preparaBuscarIdTime->fetch()){

				$idTimeCampeonato = $row[0];

			}

			return $idTimeCampeonato;
		}



		public function atualizarCapacidadeDoEstadio($atualizarCapacidadeDoEstadio){

			$conn = Database::conexao();

			$idEstadio  = $this->getIdEstadio();
			$qtdProduto = $this->getQuantidade();
			$debitar    = $this->getValor();

			$atualizarCapacidadeEstadio = "UPDATE estadio
										   SET capacidade = ? + (SELECT capacidade 
										   					 	 FROM estadio
										   					     WHERE id = ?)
										   WHERE id = ?";
		   $preparaAtualizarCapacidadeEstadio = $conn->prepare($atualizarCapacidadeEstadio);					   
		   $preparaAtualizarCapacidadeEstadio->bindValue(1,$idEstadio);
		   $preparaAtualizarCapacidadeEstadio->bindValue(2,$idEstadio);
		   $preparaAtualizarCapacidadeEstadio->bindValue(3, $idTime);
		   $preparaAtualizarCapacidadeEstadio->execute();
		}


		public function compraProduto($Produto){
			$Estadio = $this->getIdEstadio();
			$id = $this->getId();

			$conn = Database::conexao();
            error_log('Compra Produto:');
			error_log($time);
			error_log($id);

	        $compraProduto = 'UPDATE Estadio SET id = ? WHERE id = ? ';
	     	$preparaConsultaEstadio = $conn->prepare($compraProduto);
	     	$preparaConsultaEstadio->bindValue(1,$time);
	     	$preparaConsultaEstadio->bindValue(2,$id);	     	
	     	$preparaConsultaEstadio->execute();


			}

			public function buscarProdutoCarrinho($id){
				$conn = Database::conexao();
				$buscarProdutoCarrinho ="SELECT p.id, t.dinheiro 
                    				 FROM produtos as p
                                         ,time as t 
                                     WHERE p.id = '$id'";

            	$preparaBuscarProdutoCarrinho = $conn->prepare($buscarProdutoCarrinho);
            	$preparaBuscarProdutoCarrinho->execute();

            	$result = $preparaBuscarProdutoCarrinho->setFetchMode(PDO::FETCH_ASSOC);

				$idProduto = array();

					while ($row = $preparaBuscarProdutoCarrinho->fetch()) {
							$idProduto[] = $row;
						}

				return $idProduto;
		}

		
	}
?>