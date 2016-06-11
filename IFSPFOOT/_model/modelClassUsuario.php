<?php 
	
	//Inclusão do arquivo para conexão com o banco de dados PDO
	include_once '../_model/_bancodedados/modelBancodeDadosConexao.php';
	
	Class modelClassUsuario{
		
		//Váriaveis
		private $id;
		private $nome;
		private $sobrenome;
		private $login;
		private $senha;
		private $email;
		private $celular;		
		
		//Getters e Setters
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
		
		//Criptografa a senha com MD5
		public function setSenha($senha){
			$this->senha = md5($senha);
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
		
		//Consulta o banco de dados com o login e senha na tabela usuário e verifica se esta cadastrado no sistema
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
			//Caso esteja cadastrado retorna o Id do usuario para passar por sessão, caso não esteja retorna NULL
			return $dados;

		}
		
		//Função para cadastrar novo usuário
		public function cadastraUsuario($usuario){
			
			$conn = Database::conexao();
			
			$login = $this->getLogin();
			$senha = $this->getSenha();
			$nome = $this->getNome();
			$sobrenome = $this->getSobrenome();
			$email = $this->getEmail();
			$celular = $this->getCelular();
			
			$insercaoNovoUsuario = "INSERT INTO Usuario VALUES (DEFAULT,'$login','$senha','$nome','$sobrenome','$email'
			,'$celular')";
			$conn->exec($insercaoNovoUsuario);
			
		}
		
		//Função que verifica se as senhas batem e retorna verdadeiro caso sim, e falso caso sejam diferentes
		public function verificaSenha($senha,$confirmaSenha){
			
			if($senha != $confirmaSenha){
				return false;
			}
			else {
				return true;
			}
			
		}
		
		//Função que verifica se o login ja é existe, poís ele tem que ser único
		public function verificaLogin($login){
			
			$conn = Database::conexao();
			
			$resultado = NULL;
			
			$consultaLogin = 'SELECT login FROM Usuario WHERE login = ? ';
			$preparaConsultaLogin = $conn->prepare($consultaLogin);
			$preparaConsultaLogin->bindValue(1, $login);
			$preparaConsultaLogin->execute();
				
			$result = $preparaConsultaLogin->setFetchMode(PDO::FETCH_NUM);
			while ($row = $preparaConsultaLogin->fetch()) {
					
				$resultado = $row[0];
					
			}
			//Retorna null caso seja válido, e retorno o login caso já tenha	
			return $resultado;
			
		}
		
		
	}

?>