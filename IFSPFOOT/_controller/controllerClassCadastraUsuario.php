<?php 

	
	include_once '../_model/modelClassUsuario.php';
	session_start();
	
	class controllerClassCadastraUsuario{
		
		public function __construct(){
			
			$this->verificaDados();
			$this->cadastrarUsuario();
		}
		
		public function verificaDados(){
			
			$usuario = new modelClassUsuario();
			
			$verificaUsuario = $usuario->verificaLogin($_POST['form-login']);
			$verificaSenha = $usuario->verificaSenha($_POST['form-senha'], $_POST['form-repitasenha']);
			
			if($verificaUsuario != NULL){
				
				$_SESSION['cadastroLogin'] = "Login Sendo Utilizado !";
				header("Location: ../_view/viewCadastroNovoUsuario.php");
				
			}
			
			if($verificaSenha == false){
				
				$_SESSION['cadastroSenha'] = "Senha Invalida";
				header("Location: ../_view/viewCadastroNovoUsuario.php");
			}
		}
		public function cadastrarUsuario(){
			
			$usuario = new modelClassUsuario();
				
			$usuario->setLogin($_POST['form-login']);
			$usuario->setSenha($_POST['form-senha']);
			$usuario->setNome($_POST['form-nome']);
			$usuario->setSobrenome($_POST['form-sobrenome']);
			$usuario->setEmail($_POST['form-email']);
			$usuario->setCelular($_POST['form-celular']);
			$usuario->cadastraUsuario($usuario);
			
				
		}
	}
	
	$user = new controllerClassCadastraUsuario();

	
?>