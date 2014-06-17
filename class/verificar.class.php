<?php
class verificacaoLogin extends Login{
	function verificarL(){
		if(logado()){
			include('../login.php');
			exit;
		}else{
			//cria variavel com "ID" e "Level"
		}
	}
	
	
	public $prefix;
	public $idEs;
	public function mostrarMyInfos($prefix){
		//relacao MySQL de vetrificacao.
		
		//colocar prefixo
	}
	
	
	
	public function mostrarInfos($prefix){
		//relacao MySQL de vetrificacao.
		
		//colocar prefixo
	}
}