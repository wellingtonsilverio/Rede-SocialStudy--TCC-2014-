<div style="margin:10px;">
<?php if(isset($_GET['pid'])){
	$idPost = $_GET['pid'];
	$pergunta = Conect::getConn()->prepare("SELECT * FROM `pergunta` WHERE `pgt_id` = ?");
			$pergunta->execute(array($idPost));
			$pAgora = $pergunta->fetch(PDO::FETCH_ASSOC);
			///
if(isset($_POST['perguntar'])){
	$resp = $_POST['perguntar'];
	$perg = $_GET['pid'];
	$usr = $usrID;
	
	$regR = Conect::getConn()->prepare("INSERT INTO `responder` (`res_id`, `res_perg`, `res_usr`, `res_resp`) VALUES (NULL, ?, ?, ?)");
	if($regR->execute(array($perg,$usr,$resp))){
		$obgATT->addATT($usrID,4,"Respondeu no grupo ".$infoGrupP['grp_titulo']." sobre: ".$resp);
		$obgMedalha->ponto($vSQL['usr_id'], 'usr_mdl_resp', 2);
	}
	
}

		///
			
			$user = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=?");
				$user->execute(array($pAgora['pgt_usr']));
				$uVer = $user->fetch(PDO::FETCH_ASSOC);
?>
    <ul class="replies" style="float:left;">
    <li class="bg-color-green">
    <b class="sticker sticker-left sticker-color-green"></b>
    <a href="index.php?uid=<?php echo $uVer['usr_id']; ?>"><div class="avatar"><img src="pags_logon/img/<?php echo $uVer['usr_image'];?>" /></div>
    <div class="reply">
    <div class="date"><?php echo $pAgora['pgt_date'];?></div>
    <div class="author"><?php echo $uVer['usr_nome'];?></div>
    <div class="text"><?php echo $pAgora['pgt_perg'];?>
            </div>
    </div>
    </li></a>
    </ul>

<!-- Antigo -->
<ul class="replies" style="float:right;">
              <?php 
			$res = Conect::getConn()->prepare("SELECT * FROM `responder` WHERE `res_perg` = ?");
			$res->execute(array($idPost));
			while($respostas = $res->fetch(PDO::FETCH_ASSOC)){
				?>
                <?php $Rauser = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=?");
				$Rauser->execute(array($respostas['res_usr']));
				$uRR = $Rauser->fetch(PDO::FETCH_ASSOC);?>
                    
    <li class="bg-color-blue">
    <b class="sticker sticker-right sticker-color-blue"></b>
    <a href="index.php?uid=<?php echo $uRR['usr_id']; ?>"><div class="avatar"><img src="pags_logon/img/<?php echo $uRR['usr_image'];?>" /></div>
    <div class="reply">
    <div class="date">RESPOSTA</div>
    <div class="author"><?php echo $uRR['usr_nome'];;?></div>
    <div class="text"><?php echo $respostas['res_resp'];?>
            </div>
            <?php
            if(($respostas['res_usr'] == $usrID) || ($eAdmin = $selectGrupoAdmin->FETCH(PDO::FETCH_ASSOC))){
				$server = $_SERVER['SERVER_NAME'];
				$endereco = $_SERVER ['REQUEST_URI'];
				echo '<div align="right"><a href="http://'.$server.$endereco.'&amp;resExcluir='.$respostas['res_id'].'#SavePoint" style="color:#FFFFFF; font-size:12px;">&emsp;Excluir</a></div>';
			}
			
			?>
            
<div align="right"><a href="<?php $server = $_SERVER['SERVER_NAME'];
$endereco = $_SERVER ['REQUEST_URI'];

echo "http://" . $server . $endereco;?>&amp;denunciar=resp<?php echo $_GET['pid'];?>&amp;dpid=<?php echo $respostas['res_id'];?>#SavePoint" style="color:#FFFFFF; font-size:12px;">&emsp;Denunciar</a></div>
    </div></a>
    </li>
                
				
				<?php
			}
			?>
    </ul>
            </p>
</div>
            <div id="responder" style="float:left; margin:20px;">
            <br />
            <h2>Responder:</h2>
              <form id="form2" name="form2" method="post" action="">
                <label for="perguntar"></label>
                <textarea name="perguntar" cols="50" id="responder" class="responder" onclick="this.style='height:160px'"></textarea> <input name="Submit" type="submit" class="submit" value="Responder" style="left:64px;" />
                
              </form></div>
<?php }else{
	
}?>
</div>