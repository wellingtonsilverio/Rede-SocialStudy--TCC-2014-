<?php 
if(isset($_GET['perExcluir'])){
	$pid = $_GET['perExcluir'];
	
	//excluir cada resposta dessa pergunta, tirando os pontos de exp e medalha
	$selectResponder = Conect::getConn()->prepare("select * from `responder` where `res_perg` = ?");
	$selectResponder->execute(array($pid));
	while($verResp = $selectResponder->FETCH(PDO::FETCH_ASSOC)){
		$respUserID = $verResp['res_usr'];
		$deletResponder = Conect::getConn()->prepare("DELETE FROM `responder` WHERE `res_id` = ?");
		if($deletResponder->execute(array($verResp['res_id']))){
			$obgATT->remATT("Respondeu no grupo ".$infoGrupP['grp_titulo'],4,$respUserID);
			$obgMedalha->ponto($respUserID, 'usr_mdl_resp', -2);
		}
	}
	
	//excluir pergunta e tirar pontos de exp e medalha
	$selectPergunta = Conect::getConn()->prepare("select * from `pergunta` where `pgt_id` = ?");
	$selectPergunta->execute(array($pid));
	$verPergunta = $selectPergunta->FETCH(PDO::FETCH_ASSOC);
	
	$pergUserID = $verPergunta['pgt_usr'];
	
	$deletPergunta = Conect::getConn()->prepare("delete from `pergunta` where `pgt_id` = ?");
	if($deletPergunta->execute(array($pid))){
		
		$obgATT->remATT("Perguntou no grupo ".$infoGrupP['grp_titulo']." sobre:",3,$pergUserID);
		$obgMedalha->ponto($pergUserID, 'usr_mdl_perg', -5);
			
		echo '<script type="text/javascript" language="javascript">alert("Pergunta excluida.");</script>';
		$url = "?p=grupo&gid=".$_GET['gid'];
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php".$url."'>";
	}else{
		echo '<script type="text/javascript" language="javascript">alert("Erro.");</script>';
		$url = "?p=grupo&gid=".$_GET['gid'];
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php".$url."'>";
	}
		
}
?>