<?php
class Login extends Conect{
	public function logar($usuario,$senha){
		if(strlen($usuario) < 8){
			echo 'Usuario Invalido';
			return false;
		}elseif(strlen($usuario) < 8){
			echo 'Senha Invalida';
			return false;
		}else{
			$vUsuario = Conect::vSQLusers("`usr_email`=?",$usuario);
			if($usuario != $vUsuario['usr_email']){
				echo 'Usuario não existe.';
				return false;
			}else{
				$veriSenha = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_email`=? AND `usr_senha`=?");
				$veriSenha->execute(array($usuario,$senha));
				$vSenha = $veriSenha->fetch(PDO::FETCH_ASSOC);
				if($vSenha['usr_senha'] != $senha){
					echo 'Senha incorreta.';
					return false;
				}elseif($vSenha['usr_senha'] == "" || $senha = "" ||$vSenha['usr_senha'] == null || $senha = null){
					echo 'Senha em branco.';
					return false;
				}else{
					if(!isset($_SESSION)){
						session_start();
					}
					$_SESSION['usr_email'] = $vUsuario['usr_email'];
					$_SESSION['usr_senha'] = $vSenha['usr_senha'];
					$_SESSION['usr_logado'] = true;
					return true;
				}
			}
		}
	}
	public function logoff(){
		foreach($_SESSION as $k => $v) {
		    if($k != 'logado') {
		        unset($_SESSION[$k]);
		    }
			if($k != 'usr_email') {
		        unset($_SESSION[$k]);
		    }
			if($k != 'usr_senha') {
		        unset($_SESSION[$k]);
		    }
		}
	}
}
class veri{
	function veris($usuario,$senha){
		if($senha == null || $senha == ""){
		}else{
			$veriSQL = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_email`=? AND `usr_senha`= ?");
			$veriSQL->execute(array($usuario,$senha));
			$vSQLs = $veriSQL->fetch(PDO::FETCH_ASSOC);
			return $vSQLs;
		}
		function ifNone($vsql,$mensagemNone){
			if($vsql == ""){
				echo $mensagemNone;
			}else{
				echo $vsql;
			}
		}
	}
	
	
}
?>