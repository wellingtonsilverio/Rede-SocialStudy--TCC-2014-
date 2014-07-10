<?php
include('class/conect.class.php');
include('class/login.class.php');

$obgLogin = new Login;
if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION['usr_logado'])){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Social Study, Entrar no site</title>
<link type="text/css" rel="stylesheet" href="css/padrao.css" />
</head>

<body>
<div id="cadasdra"><a href="" onClick="javascript:window.open('cadastro/cadastro.php', 'Cadastro - SocialStudy', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400, height=500,top=10,right=80');"><img src="imagens/partes/cadastro.png"/></a></div>

<div id="login">

<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="300" valign="top"><p><img src="imagens/partes/partes_16.png" width="261" height="132" style="margin-top: 10px;"></td>
    <td valign="top"><table width="384" border="0" cellspacing="0" cellpadding="0" background="imagens/partes/elementos.png">
      <tr>
        <td width="384" height="225" valign="top"><form name="form1" method="post" action="">
          
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="29" align="center" valign="middle">&nbsp;</td>
              </tr>
            <tr>
              <td height="43" align="center" valign="middle"><label for="login"></label>
                <input name="login" type="text" class="campo" placeholder="Login"></td>
              </tr>
            <tr>
              <td height="32" align="center" valign="middle">&nbsp;</td>
              </tr>
            <tr>
              <td height="42" align="center" valign="middle"><input name="senha" type="password" class="campo" placeholder="Senha"></td>
              </tr>
            <tr>
              <td height="19" align="center" valign="middle">&nbsp;</td>
              </tr>
            <tr>
              <td height="51" align="center" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="36%" height="50" align="center" valign="top"><input name="button" type="submit" class="botao" value=" "></td>
                  <td width="64%" align="center" valign="top"><font color="#FF0000"><?php 
if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
	$usuario = $_POST['login'];
	$senha = $_POST['senha'];
	if($obgLogin->logar($usuario,$senha)){
		echo 'Logado com sucesso.';
		header("Location: ./");
	}
}
				?></font><br>
                    Esqueci minha senha!</td>
                  </tr>
                </table></td>
              </tr>
            </table></form></td>
        </tr>
      </table></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</div>
<?php include('footer.php');?>
</body>

</html>