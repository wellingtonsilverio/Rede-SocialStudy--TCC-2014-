<?php 
$sairGrupo = Conect::getConn()->prepare("DELETE FROM `grp_usr` WHERE `gu_grp` = ? AND `gu_usr` = ?");
if($sairGrupo->execute(array($_GET['gid'],$usrID))){
	$obgATT->remATT("Entrou no grupo: ".$infoGrupP['grp_titulo'],2);
	?><head><meta HTTP-EQUIV="refresh" CONTENT="0"></head><?php
}else{
	echo "<p><h1>Erro, Contate um Administador</h1></p>";
}
?>