<div style="width:900px;">
<?php
//Pagina Restrita kkkk
if(isset($_GET['res'])){
	if(isset($_POST['resSenha']) && $_POST['resSenha'] == "NaoVouFalaraSenha"){
		?>
        <form action="" method="post" name="inserirG">
        <p>
        <br />
        <input name="nome" type="text" id="nome" placeholder="Coloque o nome do GRUPO" size="35" />
        </p>
        <p>
        <br />
        <input name="cat" type="text" id="cat" placeholder="Categoria" size="5" />
        </p>
        <p>
        <br />
        <textarea name="des" type="text" id="des" placeholder="Coloque o Descrição do GRUPO" size="5"></textarea>
        </p>
        <p>
        <br />
        <input name="resSenha" type="password" id="resSenha" placeholder="Coloque a Senha do Admin" size="25" />
        </p>
        <input type="submit" value="Criar" />
        </form>
        <?php
		if(isset($_POST['nome'])){
			$inserirG = Conect::getConn()->prepare("INSERT INTO `grups` (`grp_id`, `grp_titulo`, `grp_cat`, `grp_des`) VALUES (NULL, ?, ?, ?)");
			if($inserirG->execute(array($_POST['nome'],$_POST['cat'],$_POST['des']))){
				header("Location: index.php?p=grupo");
			}
		}
	}else{
		?>
		<form action="" method="post" name="resSenha">
        <p>
        <br />
        <input name="resSenha" type="password" id="resSenha" placeholder="Coloque a Senha do Admin" size="25" />
        </p>
        </form>
		<?php
	}
}
?>
<?php 
//Esta em uma pagina de grupo
if(isset($_GET['gid'])){
	
	$obgMedalha->ponto($vSQL['usr_id'], 'usr_mdl_grupativ', 2);
	
	//Info Grupo pelo GID
	$infoG = Conect::getConn()->prepare("SELECT * FROM `grups` WHERE `grp_id`=?");
	$infoG->execute(array($_GET['gid']));
	$infoGru = $infoG->fetch(PDO::FETCH_ASSOC);
	
	//info da Categoria do grupo
	$infoCG = Conect::getConn()->prepare("SELECT * FROM `catery` WHERE `cat_id`=?");
	$infoCG->execute(array($infoGru['grp_cat']));
	$infoCGru = $infoCG->fetch(PDO::FETCH_ASSOC);
	?>
<div>
    	<table border="0" cellspacing="0" cellpadding="0" id="tabela">
    	  <tr>
    	    <td><table border="0" align="left" cellpadding="0" cellspacing="0" id="tabela">
    	      <tr>
    	        <td width="20"></td>
    	        <td><table border="0" align="center" cellpadding="0" cellspacing="0">
    	          <tr>
    	            <td align="center"><h1><?php echo $infoGru['grp_titulo'];?></h1></td>
  	            </tr>
    	          <tr>
    	            <td align="center"><div id="catGrupo"><?php echo $infoCGru['cat_titulo']?></div></td>
  	            </tr>
  	          </table></td>
    	        <td><div id="menuGrupo">
    	          <form id="form2" name="form2" method="post" action="">
    	            <input type="submit" name="perg" id="perg" value="Perguntas" />
    	            <input type="submit" name="part" id="part" value="Participantes" />
    	            <input type="submit" name="opcao" id="opcao" value="Opcões" />
                    <?php 
					$veriS = Conect::getConn()->prepare("SELECT * FROM `grp_usr` WHERE `gu_grp`=? AND `gu_usr`=? LIMIT 1");
					$veriS->execute(array($infoGru['grp_id'],$vSQL['usr_id']));
					
					if($veriS->rowCount() == 1){
						?><input type="submit" name="noparticipa" id="noparticipa" value="Sair do Grupo" style="background-color:#C00" />
                        <?php
					}else{
						?><input type="submit" name="participa" id="participa" value="Participar" style="background-color:#C00" />
                        <?php } 
						
						$grupo = Conect::getConn()->prepare("SELECT * FROM `grups` WHERE `grp_id`=?");
						$grupo->execute(array($_GET['gid']));
						$infoGrupP = $grupo->fetch(PDO::FETCH_ASSOC);
						?>
  	            </form>
  	          </div></td>
  	        </tr>
  	      </table></td>
  	    </tr>
    	  <tr>
    	    <td><div id="apresentacaoGrupo" align="justify">
        	<div id="imageGrupo" align="center" style="margin:10px;"><img src="pags_logon/img-grups/<?php echo $infoGrupP['grp_image']; ?>" style="height:300px;" align="left"/>
            </div><div>
<?php echo $infoGrupP['grp_des'];?>
</div>
  </div></td>
  	    </tr>
    	  <tr>
    	    <td>
            
            <?php if(isset($_POST['part'])){
				include('grups/part.php');
				}elseif(isset($_POST['opcao'])){
					include('grups/opcao.php');
				}elseif(isset($_POST['noparticipa'])){
					include('grups/nopart.php');
				}elseif(isset($_POST['participa'])){
					include('grups/pedir.php');
				}else{
					include('grups/perg.php');
				}?>
            
            </td>
  	    </tr>
      </table>
    	
        <!-- Pagina sem GET gid-->
        <?php
	
//Não esta em uma pagina de grupo	
}else{
	?>
    <div id="att" align="left">
	<h1>&emsp;Grupos</h1>
    <?php if(isset($_POST['proc'])){
		?>
	  <p>
  <h2>&emsp;&emsp;Procura de Grupos</h2>
        <p>
<?php
$infoGrup = Conect::getConn()->prepare("SELECT * FROM `grups` WHERE `grp_titulo` LIKE ? OR `grp_des` LIKE ?");
$infoGrup->execute(array('%'.$_POST['proc']. '%', '%' . $_POST['proc'] . '%'));
while($infoGrupP = $infoGrup->fetch(PDO::FETCH_ASSOC)){
	//$infoGrup = Conect::getConn()->prepare("SELECT * FROM `grups` WHERE `grp_id`=?");
	//$infoGrup->execute(array($grupoP['gu_grp']));
	//$infoGrupP = $infoGrup->fetch(PDO::FETCH_ASSOC);
	?>
	<a href="index.php?p=grupo&gid=<?php echo $infoGrupP['grp_id']?>"><div id="divGrupo" align="center">
    <img src="pags_logon/img-grups/<?php echo $infoGrupP['grp_image']; ?>" width="140" height="120"/>
    <h3><?php echo $infoGrupP['grp_titulo']; ?></h3>
    <h4>(0 não lidas)</h4>
    </div></a>
	<?php
}
if(!$infoGrup->rowCount()){
	echo "&nbsp;&nbsp; Não a grupo nenhum com esse nome.";
}
?>        	
        </p>
        <?php
		
		
	}else{
		?>
	  <p>
  <h2>&emsp;&emsp;Meus Grupos</h2>
        <p>
<?php
$grupo = Conect::getConn()->prepare("SELECT * FROM `grp_usr` WHERE `gu_usr`=?");
$grupo->execute(array($vSQL['usr_id']));
while($grupoP = $grupo->fetch(PDO::FETCH_ASSOC)){
	$infoGrup = Conect::getConn()->prepare("SELECT * FROM `grups` WHERE `grp_id`=?");
	$infoGrup->execute(array($grupoP['gu_grp']));
	$infoGrupP = $infoGrup->fetch(PDO::FETCH_ASSOC);
	?>
	<a href="index.php?p=grupo&gid=<?php echo $infoGrupP['grp_id']?>"><div id="divGrupo" align="center">
    <img src="pags_logon/img-grups/<?php echo $infoGrupP['grp_image']; ?>" width="140" height="120"/>
    <h3><?php echo $infoGrupP['grp_titulo']; ?></h3>
    <h4>(0 não lidas)</h4>
    </div></a>
	<?php
}
if($grupoP){
	echo "Você não faz parte de nenhum grupo.";
}
?>        	
        </p>
		<?php
	}?><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  <h2>&emsp;&emsp;Procurar Grupos</h2>
        <form action="" method="post" enctype="multipart/form-data">
          <input name="proc" type="text" id="proc" placeholder="Nome do Grupo, materia ou escola." size="32" />
          <input type="submit" name="button" id="button" value="Pesquisar" />
        </form>
        <p>
        	

        </p>
    </p>
</div>
<?php
}
	?>
	</div>
<?php
if(isset($_GET['addadm'])){
	$gid = $_GET['gid'];
	$uid = $_GET['addadm'];
	$verificarExiste = Conect::getConn()->prepare("select * from `grp_adm` where `gadm_grp` = ? AND `gadm_usr` = ?");
	$verificarExiste->execute(array($gid, $uid));
	if($ve = $verificarExiste->FETCH(PDO::FETCH_ASSOC));
	else{
		$addAdmin = Conect::getConn()->prepare("INSERT INTO `grp_adm` (`gadm_id`, `gadm_grp`, `gadm_usr`) VALUES (NULL, ?, ?)");
		$addAdmin->execute(array($gid, $uid));
	}
	//header("location: index.php?p=grupo&amp;gid=".$_GET['gid']);
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=grupo&amp;gid=".$_GET['gid']."'>";
	//exit();
}
if(isset($_GET['remadm'])){
	$gid = $_GET['gid'];
	$uid = $_GET['remadm'];
	$delete = Conect::getConn()->prepare("DELETE FROM `grp_adm` where `gadm_grp` = ? AND `gadm_usr` = ?");
	$delete->execute(array($gid, $uid));
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=grupo&amp;gid=".$_GET['gid']."'>";
	
}
if(isset($_POST['seleCateg'])){
	$gid = $_GET['gid'];
	$cid = $_POST['seleCateg'];
	$update = Conect::getConn()->prepare("UPDATE `grups` SET `grp_cat` = ? where `grp_id` = ?");
	$update->execute(array($cid, $gid));
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php?p=grupo&amp;gid=".$_GET['gid']."'>";
	
}
?>
<?php
//Verificar se esta logado
if(!isset($_SESSION['usr_logado'])){
	header("Location: login.php");
}
?>