<?php
include('../class/conect.class.php');

$objConect = new Conect;

if(isset($_POST['hash'])){
	$hid = $_POST['hash'];
	$hash = Conect::getConn()->prepare("select * from indicacao where idc_id = ? AND idc_status = '1'");
	$hash->execute(array($hid));
	if($hashs = $hash->FETCH(PDO::FETCH_ASSOC)){
		echo '<meta http-equiv="refresh" content="0;url=http://localhost/rss/cadastro/infcadastro.php?iid='.$hashs['idc_id'].'&amp;uid='.$hashs['idc_usr'].'">';
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro - SocialStudy</title>
</head>
<h1>Cadastro</h1>
<h2>coloque o codigo de acesso.</h2>
<form method="post">
<div>#<input type="text" id="hash" name="hash" /></div>
<input type="submit" id="sbm" name="sbm" />
</form>
<body>
</body>
</html>