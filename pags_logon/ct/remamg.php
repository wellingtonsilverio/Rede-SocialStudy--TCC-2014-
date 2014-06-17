<?php
include('../../class/conect.class.php');
include('../../class/login.class.php');
include('../../class/att.class.php');
include('../../class/medalha.class.php');

$objLogin = new Login;
$obgATT = new Att;
$obgMedalha = new Medalha;


$inserirAmg = Conect::getConn()->prepare("DELETE FROM `usr_usr` WHERE `flw_de`=? AND `flw_quem`=?");



if($inserirAmg->execute(array($_GET['myid'],$_GET['uid']))){
	//pegar Infos
	$infoA = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=?");
	$infoA->execute(array($_GET['uid']));
	$infoAm = $infoA->fetch(PDO::FETCH_ASSOC);
	
	//Criar ATT
	$obgATT->remATT("esta seguindo ".$infoAm['usr_nome']." ".$infoAm['usr_sobrenome'],1);
	//$obgMedalha->ponto($infoAm['usr_id'], 'usr_mdl_seg', -10);
}


?><script type="text/javascript">history.back(-1000);
</script>