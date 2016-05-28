<?php 

	Class modelClassEstrategia{
		
		private $id;
		private $formacao;
		private $estilo;
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getFormacao(){
			return $this->formacao;
		}
		
		public function setFormacao($formacao){
			$this->formacao = $formacao;
		}
		
		public function getEstilo(){
			return $this->estilo;
		}
		
		public function setEstilo($estilo){
			$this->estilo = $estilo;
		}
	}

?>