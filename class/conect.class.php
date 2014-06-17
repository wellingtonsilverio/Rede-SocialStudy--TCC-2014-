<?php
if(!isset($_SESSION)){
	session_start();
}


class Conect{
	private static $conn;
	static function getConn(){
		if(is_null(self::$conn)){
			self::$conn = new PDO('mysql:host=localhost;dbname=rss','root','');
		}
		return self::$conn;
	}
	function vSQLusers($verificacao,$array){
		$veri = Conect::getConn()->prepare("SELECT * FROM `users` WHERE ".$verificacao."");
		$veri->execute(array($array));
		$veriAll = $veri->fetch(PDO::FETCH_ASSOC);
		return $veriAll;
	}
}
?>