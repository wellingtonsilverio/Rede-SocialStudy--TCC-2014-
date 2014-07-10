<?php
include('../class/conect.class.php');

$objConect = new Conect;

$menErro = "";

if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
	$iid = $_GET['iid'];
	$userIndicador = Conect::getConn()->prepare("select * from users where usr_id = ?");
	$userIndicador->execute(array($uid));
	$fUserInd = $userIndicador->FETCH(PDO::FETCH_ASSOC);
}

if(isset($_POST['email'])){
	if($_POST['senha'] != "" & $_POST['ssrsenha'] != "" & $_POST['nome'] != "" & $_POST['sobrenome'] != "" & $_POST['escola'] != "" & $_POST['serie'] != "" & $_POST['local'] != ""){
		if($_POST['senha'] == $_POST['ssrsenha']){
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$nome = $_POST['nome'];
			$sobrenome = $_POST['sobrenome'];
			$escola = $_POST['escola'];
			$serie = $_POST['serie'];
			$local = $_POST['local'];
			$data = $_POST['ano']."-".$_POST['mes']."-".$_POST['dia']." 03:00:00";
			$genero = $_POST['genero'];
			$ref = $_GET['uid'];
			$cadastro = Conect::getConn()->prepare("INSERT INTO `users` (`usr_nome`, `usr_sobrenome`, `usr_email`, `usr_senha`, `usr_data_n`, `usr_escola`, `usr_serie`, `usr_local`, `usr_genero`, `usr_level`, `usr_image`, `usr_capa`, `usr_ref`, `usr_nivel`, `usr_mdl_perg`, `usr_mdl_resp`, `usr_mdl_mrespos`, `usr_mdl_seg`, `usr_mdl_tempo`, `usr_mdl_grupativ`) VALUES (?, ?, ?, ?, ?, ?, ? , ?, ?, '1', 'padrao.jpg', 'padrao.jpg', ?, '1', '1', '1', '1', '1', '1', '1')");
			if($cadastro->execute(array($nome,$sobrenome,$email,$senha,$data,$escola,$serie,$local,$genero,$ref))){
				$updateIndicado = Conect::getConn()->prepare("UPDATE `indicacao` SET `idc_status` = '0' WHERE `idc_id` = ?");
				if($updateIndicado->execute(array($iid))){
					$deleteInd = Conect::getConn()->prepare("DELETE FROM `indicacao` WHERE `idc_id` = ?");
					echo '<meta http-equiv="refresh" content="0;url=http://localhost/rss/cadastro/parabens.php">';
				}
				//ir para a pagina de parabens !
			}
		}else{
			$menErro .= " Senha de confirmação errada! ";
		}
	}else{
		$menErro .= " Preencha todos os campos! ";
	}
	if($menErro != ""){
		echo "<script type='text/javascript'>alert('".$menErro."');</script>";
	}
}

?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro - SocialStudy</title>
</head>

<body>
<h1>Cadastro</h1>
<h2>Indicado por: <?php echo $fUserInd['usr_nome']." ".$fUserInd['usr_sobrenome']?>.</h2>
<form method="post">
<div id="informacoesConta">
<div>e-mail: <input type="text" name="email" id="email" /></div>
<div>senha: <input name="senha" type="password" id="senha" /></div>
<div>repetir senha: <input type="password" name="ssrsenha" id="ssrsenha" /></div>
<div>nome: <input type="text" name="nome" id="nome" /> sobrenome: <input type="text" name="sobrenome" id="sobrenome" /></div>
<div>data de nacimento: <select id="dia" name="dia">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
</select><select id="mes" name="mes">
  <option value="01">Janeiro</option>
</select><select id="ano" name="ano">
  <option value="2014">2014</option>
  <option value="2013">2013</option>
  <option value="2012">2012</option>
  <option value="2011">2011</option>
  <option value="2010">2010</option>
  <option value="2009">2009</option>
  <option value="2008">2008</option>
  <option value="2007">2007</option>
  <option value="2006">2006</option>
  <option value="2005">2005</option>
  <option value="2004">2004</option>
  <option value="2003">2003</option>
  <option value="2002">2002</option>
  <option value="2001">2001</option>
  <option value="2000">2000</option>
  <option value="1999">1999</option>
  <option value="1998">1998</option>
  <option value="1997">1997</option>
  <option value="1996">1996</option>
  <option value="1995">1995</option>
  <option value="1994">1994</option>
  <option value="1993">1993</option>
  <option value="1992">1992</option>
  <option value="1991">1991</option>
  <option value="1990">1990</option>
  <option value="1989">1989</option>
  <option value="1988">1988</option>
  <option value="1987">1987</option>
  <option value="1986">1986</option>
  <option value="1985">1985</option>
  <option value="1984">1984</option>
  <option value="1983">1983</option>
  <option value="1982">1982</option>
  <option value="1981">1981</option>
  <option value="1980">1980</option>
  <option value="1979">1979</option>
  <option value="1978">1978</option>
  <option value="1977">1977</option>
  <option value="1976">1976</option>
  <option value="1975">1975</option>
  <option value="1974">1974</option>
  <option value="1973">1973</option>
  <option value="1972">1972</option>
  <option value="1971">1971</option>
  <option value="1970">1970</option>
  <option value="1969">1969</option>
  <option value="1968">1968</option>
  <option value="1967">1967</option>
  <option value="1966">1966</option>
  <option value="1965">1965</option>
  <option value="1964">1964</option>
  <option value="1963">1963</option>
  <option value="1962">1962</option>
  <option value="1961">1961</option>
  <option value="1960">1960</option>
</select> 
genero: <select id="genero" name="genero">
  <option value="Masculino">Masculino</option>
  <option value="Feminino">Feminino</option>
</select></div>
</div>
<div id="informacoesPessoas">
<div>escola/trabalho: <input type="text" id="escola" name="escola" /> serie/setor: <input type="text" id="serie" name="serie" /></div>
<div>local de nacimento: <input type="text" id="local" name="local" /></div>
</div>
<input type="submit" id="sbm" name="sbm" value="Terminar Cadastro" />
</form>
</body>
</html>