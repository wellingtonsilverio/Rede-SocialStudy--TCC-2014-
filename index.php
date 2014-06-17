
<?php
include('class/conect.class.php');
include('class/login.class.php');
include('class/att.class.php');
include('class/medalha.class.php');

$objLogin = new Login;
$objConect = new Conect;
$obgATT = new Att;
$obgMedalha = new Medalha;

//Verificar se esta logado
if(!isset($_SESSION['usr_logado'])){
	header("Location: login.php");
	break;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>SocialStudy - Rede social para estudos.</title>
	<meta charset="UTF-8">
	<link href="css/modern.css" rel="stylesheet">
	<link href="css/padrao.css" rel="stylesheet" type="text/css">
    <script type='text/javascript' src="javascript/jquery.js"></script>
    <script type='text/javascript' src="javascript/jquery.simplemodal.js"></script>
    <script type='text/javascript' src="javascript/basic.js"></script>
    <script type='text/javascript' src="javascript/slider.js"></script>
    <script type='text/javascript' src="javascript/dropdown.js"></script>
    <script type="text/javascript"
	>
	function carregarDIV(pag){
		
		return false;
	}
	</script>
</head>
<body>
<?php
if(isset($_SESSION['usr_logado'])){
	$vLogin = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_email` = ? AND `usr_senha` = ?");
	$vLogin->execute(array($_SESSION['usr_email'],$_SESSION['usr_senha']));
	if($vSQL = $vLogin->fetch(PDO::FETCH_ASSOC)){
		$obgMedalha->ponto($vSQL['usr_id'], 'usr_mdl_tempo', 1);
		include('pags_logon/perfil.php');
		include('footer.php');
	}else{
		header("Location: login.php");
		break;
	}
}

//Opcoes
if(isset($_GET['opcao'])){
	if($_GET['opcao'] == 'att'){
		$prefix = 'rss_';
		extract($_POST);
		$data = $datay."-".$datam."-".$datad." 00:00:00";
		$att = Conect::getConn()->prepare("UPDATE `users` SET `usr_nome`=?, `usr_sobrenome`=?, `usr_data_n`=?, `usr_escola`=?, `usr_serie`=?, `usr_local`=?, `usr_genero`=? WHERE `usr_id`=?");
		if($att->execute(array($nome,$sobrenome,$data,$escola,$serie,$local,$genero,$vSQL['usr_id']))){
			header("Location: index.php");
			echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=index.php'>";
			exit();
		}
	}
	if($_GET['opcao'] == 'foto'){
		$foto = $_FILES['foto'];
		$caminho = "pags_logon/img/";
		$filename = rand(100,999).$foto['name'];
		$caminho = $caminho.$filename;
		
		if(move_uploaded_file($foto['tmp_name'], $caminho)){
			$sql = Conect::getConn()->prepare("UPDATE `users` SET `usr_image` = ? WHERE `usr_id` = ?");
			$upSQL = $sql->execute(array($filename, $vSQL['usr_id']));
			
			if($upSQL){
				header('Location: index.php');
				echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=index.php'>";
			}else{
				echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=index.php'>";
			}
		}else{
			//erro
		}
	}
	
}
?>

</body>
</html>