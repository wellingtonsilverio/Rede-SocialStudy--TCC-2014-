<?php
class Att{
	public function addATT($usrID,$tipo,$desc){
		//Data
		date_default_timezone_set("Brazil/East");
		$mes = date("m");
	switch($mes){
		case 1: $mes = "Janeiro"; break;
		case 2: $mes = "Fevereiro"; break;
		case 3: $mes = "Março"; break;
		case 4: $mes = "Abril"; break;
		case 5: $mes = "Maio"; break;
		case 6: $mes = "Junho"; break;
		case 7: $mes = "Julho"; break;
		case 8: $mes = "Agosto"; break;
		case 9: $mes = "Setembro"; break;
		case 10: $mes = "Outubro"; break;
		case 11: $mes = "Novembro"; break;
		case 12: $mes = "Dezembro"; break;
	}
	$date = date("j")." de ".$mes." de ".date("Y")." as ".date("h:i");
		
		//Adiciona
		$addATT = Conect::getConn()->prepare("INSERT INTO `refesh` (
`user_id` ,
`att_tipo` ,
`att_desc`,
`att_date`
)
VALUES (
? , ?, ?, ?
);");
		$addATT->execute(array($usrID,$tipo,$desc,$date));
		
		$addExp = Conect::getConn()->prepare("UPDATE `rss`.`users` SET `usr_level` = `usr_level` + '3' WHERE `users`.`usr_id` = ?");
		$addExp->execute(array($usrID));
	}
	//Remover
	public function remATT($desc,$tipo,$myID){
		$remATT = Conect::getConn()->prepare("DELETE FROM `refesh` WHERE `att_desc` LIKE ? AND `att_tipo` = ? AND `user_id`=?");
		$remATT->execute(array($desc,$tipo,$myID));
		
		$remExp = Conect::getConn()->prepare("UPDATE `rss`.`users` SET `usr_level` = `usr_level` - '3' WHERE `users`.`usr_id` = ?");
		$remExp->execute(array($myID));
	}
	
}
?>