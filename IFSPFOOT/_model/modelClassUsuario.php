<?php 
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDados1.php';
	
	Class modelClassUsuario{
		
		private $id;
		private $nome;
		private $sobrenome;
		private $login;
		private $senha;
		private $email;
		private $celular;		
		
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
		
		public function getSobrenome(){
			return $this->sobrenome;
		}
		
		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
		
		public function getLogin(){
			return $this->login;
		}
		
		public function setLogin($login){
			$this->login = $login;
		}
		
		public function getSenha(){
			return $this->senha;
		}
		
		public function setSenha($senha){
			$this->senha = $senha;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		
		public function getCelular(){
			return $this->celular;
		}
		
		public function setCelular($celular){
			$this->celular = $celular;
		}
		
		public function consultaUsuario($usuario){
			
			$conn = Database::conexao();

			$dados = null;
			
			$consultaLogin = 'SELECT id FROM Usuario WHERE login = ? AND senha = ?';
			$preparaConsultaLogin = $conn->prepare($consultaLogin);
			$preparaConsultaLogin->bindValue(1, $this->getLogin());
			$preparaConsultaLogin->bindValue(2, $this->getSenha());
			$preparaConsultaLogin->execute();
			
			while($row = $preparaConsultaLogin->fetch(PDO::FETCH_OBJ)){
				$dados = $row->id;
			}
			
			return $dados;

		}
		
		
	}

?>