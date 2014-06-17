<?php
include('../../class/conect.class.php');
include('../../class/login.class.php');
include('../../class/att.class.php');
include('../../class/medalha.class.php');

$objLogin = new Login;
$obgATT = new Att;
$obgMedalha = new Medalha;

$inserirAmg = Conect::getConn()->prepare("INSERT INTO `usr_usr` (
`flw_id` ,
`flw_de` ,
`flw_quem`
)
VALUES (
NULL , ?, ?
);");

if($inserirAmg->execute(array($_GET['myid'],$_GET['uid']))){
	//pegar Infos
	$infoA = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=?");
	$infoA->execute(array($_GET['uid']));
	$infoAm = $infoA->fetch(PDO::FETCH_ASSOC);
	
	echo '<script type="text/javascript">alert("a");</script>';
	$obgMedalha->ponto($infoAm['usr_id'], 'usr_mdl_seg', 10);
	
	//Criar ATT
	$obgATT->addATT($_GET['myid'],1,"esta seguindo ".$infoAm['usr_nome']." ".$infoAm['usr_sobrenome']);
}
?><script type="text/javascript">history.back(-1000);
</script>