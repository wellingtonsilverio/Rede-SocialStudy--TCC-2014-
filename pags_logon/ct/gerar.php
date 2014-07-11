<?php
//Verificar se esta logado
if(!isset($_SESSION['usr_logado'])){
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=login.php'>";
}
if($vSQL['usr_nivel'] < 9) echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
?>
<?php
if(isset($_POST['num'])){
	$num = $_POST['num'];
	$tipo = $_POST['tipo'];
	
	function gerarNum($idUser, $tipoG){
		$codigo = rand(100000,999999);
		
		try{
			$inserirCod = Conect::getConn()->prepare("INSERT INTO `rss`.`indicacao` (`idc_id`, `idc_usr`, `idc_poronde`, `idc_status`) VALUES (?, ?, ?, '1')");
			$inserirCod->execute(array($codigo, $idUser, $tipoG));
			echo '<div style="width:500px; height:250px; margin:10px; background-image:url(imagens/cartao.jpg);"><div style="padding-top:183px; padding-left:50px; width:230px; height:50px; font-size:48px; font-weight:bold;">'.$codigo.'</div></div>';
		}catch(PDOException $e){
			gerarNum($idUser, $tipoG);
		}
	}
	
	for($i = 0; $i < $num;$i++) gerarNum($vSQL['usr_id'], $tipo);
	
}
?>
<h1>Olá, Quantos cupom deseja gerar, e de que tipo ?</h1>
<div><input type="number" value="1" id="num" name="num" /> <select id="tipo" name="tipo" style="width:auto;"><option>Cartão</option><option>Voucher</option></select> <input type="submit" value="GERAR" /></div>