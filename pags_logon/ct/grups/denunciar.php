<?php 
if(isset($_GET['dpid'])){
	$pid = $_GET['dpid'];
	$uid = $vSQL['usr_id'];
	$val = 0;
	$den = $_GET['denunciar'];
	
	$inserirD = Conect::getConn()->prepare("INSERT INTO `rss`.`denuncia` (`dnc_id`, `dnc_de`, `dnc_oque`, `dnc_v`, `dnc_onde`) VALUES (NULL, ?, ?, ?, ?)");
	if($inserirD->execute(array($uid,$pid,$val,$den))){
		?><script type="text/javascript" language="javascript">alert("Avisaremos em seu e-mail a resposta da equipe.");</script><?php
		
	}else{
		?><script type="text/javascript" language="javascript">alert("Erro.");</script><?php
		
	}
		
}
?>