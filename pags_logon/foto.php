<?php
include('../class/conect.class.php');
include('../class/login.class.php');

if(!isset($_SESSION)){
	session_start();
}

$objVeri = new veri;
$vSQL = $objVeri->veris($_SESSION['usr_email'],$_SESSION['usr_senha']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>SocialStudy - Rede social para estudos.</title>
	<meta charset="UTF-8">
    <link href="../css/padrao.css" rel="stylesheet" type="text/css">
	<link href="../css/modern.css" rel="stylesheet">
    <script type='text/javascript' src="../javascript/jquery.js"></script>
    <script type='text/javascript' src="../javascript/jquery.simplemodal.js"></script>
    <script type='text/javascript' src="../javascript/basic.js"></script>
    <script type='text/javascript' src="../javascript/slider.js"></script>
</head>
<body>
<i class='icon-wrench' style="font-size:36px"> Alterar foto:</i>
<p>
	<div>
		<form action="?opcao=foto" method="post" enctype="multipart/form-data" name="Info-user"><div class="input-control text">
          </p>
          <input name="foto" type="file" id="foto" size="55">
          <p><br>
            &emsp;<input type="submit" value="Atualizar"/>
          </div>
		</form>
    </div>
</p>
</body>
</html>