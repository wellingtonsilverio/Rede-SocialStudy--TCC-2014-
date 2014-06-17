<?php 
$sairGrupo = Conect::getConn()->prepare("INSERT INTO `grp_usr` (`gu_id`, `gu_usr`, `gu_grp`) VALUES (NULL, ?, ?)");
if($sairGrupo->execute(array($usrID,$_GET['gid']))){
	//Criar ATT
	$obgATT->addATT($usrID,2,"Entrou no grupo: ".$infoGrupP['grp_titulo']);
	?><head><meta HTTP-EQUIV="refresh" CONTENT="0"></head><?php
}else{
	echo "<p><h1>Erro, Contate um Administador</h1></p>";
}
?>