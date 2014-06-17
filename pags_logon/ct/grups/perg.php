<?php
if(isset($_POST['pergunta']) && $_POST['pergunta'] != ''){
	$postar = Conect::getConn()->prepare("INSERT INTO `pergunta` (`pgt_usr`, `pgt_perg`, `pgt_grp`) VALUES (?, ?, ?)");
	$perg = $_POST['pergunta'];
	$gid = $_GET['gid'];
	if($postar->execute(array($usrID,$perg,$gid))){
		//Criar ATT
		$obgATT->addATT($usrID,3,"Perguntou no grupo ".$infoGrupP['grp_titulo']." sobre:".$_POST['pergunta']);
		$obgMedalha->ponto($vSQL['usr_id'], 'usr_mdl_perg', 5);
		
		$server = $_SERVER['SERVER_NAME'];
		$endereco = $_SERVER['REQUEST_URI'];

		$site = "http://" . $server . $endereco;
		echo "<meta http-equiv='refresh' content='0;URL=".$site."'>";
	}else{
		echo "<br />ERRO.";
	}
}

$gid = $_GET['gid'];
if(isset($_POST['mdesc'])){
	//mudar a descrição do grupo
	$desc = $_POST['mdesc'];
	$update = Conect::getConn()->prepare("UPDATE `grups` SET grp_des = ? WHERE grp_id = ?");
	if($update->execute(array($desc,$gid))){
		echo '<script language="javascript" type="text/javascript">window.location = "index.php?p=grupo&gid='.$gid.'";</script>';
	}
}
if(isset($_POST['mdnome'])){
	//mudar nome do grupo
	$nome = $_POST['mdnome'];
	$update = Conect::getConn()->prepare("UPDATE `grups` SET grp_titulo = ? WHERE grp_id = ?");
	if($update->execute(array($nome,$gid))){
		echo '<script language="javascript" type="text/javascript">window.location = "index.php?p=grupo&gid='.$gid.'";</script>';
	}
}
if(isset($_FILES['mdfoto'])){
	//mudar foto do grupo
	$image = rand(111,999)."_".$_FILES['mdfoto']['name'];
	move_uploaded_file($_FILES['mdfoto']['tmp_name'], "pags_logon/img-grups/".$image);
	$update = Conect::getConn()->prepare("UPDATE `grups` SET grp_image = ? WHERE grp_id = ?");
	if($update->execute(array($image,$gid))){
		echo '<script language="javascript" type="text/javascript">window.location = "index.php?p=grupo&gid='.$gid.'";</script>';
	}
}
?>
<div id="Perg" align="center">
<br />
	<div id="Perguntar" style="width:750px;">
    	<form id="form1" name="form1" method="post" action="">
		<textarea name="pergunta" type="text" id="pergunta" placeholder="Perguntar..." class="perguntar" onclick="this.style='height:130px'"></textarea>
        <input name="Submit" type="submit" class="submit" value="Perguntar" style="margin-right:3px;" />
		</form>

    </div>
    <div id="resp" style="margin-top:10px;">
      <table border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top">          
        	<?php
            $pergunta = Conect::getConn()->prepare("SELECT * FROM `pergunta` WHERE `pgt_grp` = ? ORDER BY `pgt_id` DESC LIMIT 0,4");
			$pergunta->execute(array($_GET['gid']));
			while($pVez = $pergunta->fetch(PDO::FETCH_ASSOC)){
				$user = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=?");
				$user->execute(array($pVez['pgt_usr']));
				$uVer = $user->fetch(PDO::FETCH_ASSOC);
				
			?>
        	<a href="?p=grupo&gid=<?php echo $_GET['gid'];?>&pid=<?php echo $pVez['pgt_id'];?>#SavePoint"><table border="0" cellpadding="0" cellspacing="0">
        	  <tr>
        	    <td width="60" height="60" align="center" valign="middle">
                <div class="tile double bg-color-green">
               
                        <div class="tile-content"><img class="icon" src="pags_logon/img/<?php echo $uVer['usr_image'];?>" width="50" height="50"> 
                            <h2><?php echo $uVer['usr_nome'];?></h2>
                            <h5><?php echo $uVer['usr_sobrenome'];?></h5>
                            <p>
                                <?php echo $pVez['pgt_perg'];?>
                            </p>
                        </div>
                        <div class="brand">
                            <div class="badge"><?php 
				
				$resP = Conect::getConn()->prepare("SELECT * FROM `responder` WHERE `res_perg` = ?");
			$resP->execute(array($pVez['pgt_id']));
				
				
							echo $resP->rowCount(); ?></div>
                          <div align="left"><a href="<?php $server = $_SERVER['SERVER_NAME'];
$endereco = $_SERVER ['REQUEST_URI'];

echo "http://" . $server . $endereco;?>&amp;denunciar=perg&amp;dpid=<?php echo $pVez['pgt_id'];?>#SavePoint">&emsp;Denunciar</a></div>
                        </div></div>  
        	</tr>
      	  </table></a>
        	
            
          <?php }?>
          </td><td valign="top">
          <div id="resp-respo" name="resp-respo"><a name="SavePoint"></a><?php 
		  	if(isset($_GET['denunciar'])){
				include('/denunciar.php'); 
		  	}else if(isset($_GET['resExcluir'])){
				include('/resexcluir.php'); 
		  	}else if(isset($_GET['pid'])){
				include('/perga.php');  
			}else{
			}
			  ?></div></td>
        </tr>
      </table>
    
</div>