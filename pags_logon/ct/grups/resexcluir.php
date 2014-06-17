<?php 
if(isset($_GET['resExcluir'])){
	$rid = $_GET['resExcluir'];
	
	//retirar experiencia, att e Pontos
	$selectResp = Conect::getConn()->prepare("select * from `responder` WHERE `res_id` = ?");
	$selectResp->execute(array($rid));
	$infoResp = $selectResp->FETCH(PDO::FETCH_ASSOC);
	
	$obgATT->remATT("Respondeu no grupo ".$infoGrupP['grp_titulo'],4,$infoResp['res_usr']);
	$obgMedalha->ponto($infoResp['res_usr'], 'usr_mdl_resp', -2);
	
	$deletResp = Conect::getConn()->prepare("DELETE FROM `responder` WHERE `res_id` = ?");
	if($deletResp->execute(array($rid))){		
		echo '<script type="text/javascript" language="javascript">alert("Resposta excluida.");</script>';
		$url = "?p=grupo&gid=".$_GET['gid'];
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php".$url."'>";
	}else{
		echo '<script type="text/javascript" language="javascript">alert("Erro.");</script>';
		$url = "?p=grupo&gid=".$_GET['gid'];
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php".$url."'>";
	}
		
}
?>