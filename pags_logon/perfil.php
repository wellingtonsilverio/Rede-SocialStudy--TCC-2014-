<?php
//Funçao Sair
if(isset($_GET['sair'])){
	$objLogin->logoff();
	header("Location: index.php");
}
?>
</div>
<?php 
//selecionar usuario
$usrID = $vSQL['usr_id'];
if(!isset($_GET['uid']) || $_GET['uid'] == $usrID){
	
}else{
	$vSQLP = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=? ORDER BY `usr_id` DESC LIMIT 1");
	$vSQLP->execute(array($_GET['uid']));
	$vSQL = $vSQLP->fetch(PDO::FETCH_ASSOC);
	 
}
//seguir usuario
if(isset($_POST['seguir'])){

$inserirAmg = Conect::getConn()->prepare("INSERT INTO `usr_usr` (
`flw_id` ,
`flw_de` ,
`flw_quem`
)
VALUES (
NULL , ?, ?
);");

if($inserirAmg->execute(array($usrID,$_GET['uid']))){
	//pegar Infos
	$infoA = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=?");
	$infoA->execute(array($_GET['uid']));
	$infoAm = $infoA->fetch(PDO::FETCH_ASSOC);
	
	$obgMedalha->ponto($infoAm['usr_id'], 'usr_mdl_seg', 10);
	
	//Criar ATT
	$obgATT->addATT($usrID,1,"esta seguindo ".$infoAm['usr_nome']." ".$infoAm['usr_sobrenome']);
}
}

//Remover Amigo
if(isset($_POST['noseguir'])){
	


$inserirAmg = Conect::getConn()->prepare("DELETE FROM `usr_usr` WHERE `flw_de`=? AND `flw_quem`=?");



if($inserirAmg->execute(array($usrID,$_GET['uid']))){
	//pegar Infos
	$infoA = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=?");
	$infoA->execute(array($_GET['uid']));
	$infoAm = $infoA->fetch(PDO::FETCH_ASSOC);
	
	$obgMedalha->ponto($infoAm['usr_id'], 'usr_mdl_seg', -10);
	
	//Remover ATT
	$obgATT->remATT("esta seguindo ".$infoAm['usr_nome']." ".$infoAm['usr_sobrenome'],1,$usrID);
}

}
?>

<!----menu topo------>
<?php 
		if(isset($_GET['uid']) && $_GET['uid'] != $usrID){
			$linkHome = 'index.php?uid='.$vSQL['usr_id'];
			$linkGrup = 'index.php?p=grupo&uid='.$vSQL['usr_id'];
			$linkAmigos = 'index.php?p=amigos&uid='.$vSQL['usr_id'];
		}else{
			$linkHome = 'index.php';
			$linkGrup = 'index.php?p=grupo';
			$linkAmigos = 'index.php?p=amigos';
		}
		?>
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<div id="menutop">
<input type="text" name="q" id="procurar" maxlength="135" size="30" placeholder="Pesquisa" autocomplete="off" value="">
<div id="iconprocurar"><img src="imagens/partes/buscar.png" /></div>
<div id="menuperfil">
<a href="?sair=true"><img id="config" src= "imagens/partes/config.png" title="Sair"
onMouseOver="document.getElementById(this.id).src='imagens/partes/config1.png'"
onMouseOut="document.getElementById(this.id).src='imagens/partes/config.png'">
</a>

<a href="<?php echo $linkGrup;?>"><img id="seguidores" src="imagens/partes/grupo.png"
title="Grupos"
onMouseOver="document.getElementById(this.id).src='imagens/partes/grupo1.png'"
onMouseOut="document.getElementById(this.id).src='imagens/partes/grupo.png'">
</a>

<a href="<?php echo $linkAmigos;?>"><img id="grupo" src="imagens/partes/seguidores.png"
title="Seguidores"
onMouseOver="document.getElementById(this.id).src='imagens/partes/seguidores1.png'"
onMouseOut="document.getElementById(this.id).src='imagens/partes/seguidores.png'"></a>

<a href="<?php echo $linkHome;?>"><img id="perfil" src="imagens/partes/perfil.png"
title="Perfil"
onMouseOver="document.getElementById(this.id).src='imagens/partes/perfil1.png'"
onMouseOut="document.getElementById(this.id).src='imagens/partes/perfil.png'"></a>

</div></div>

<div id="logss"><a href="index.php"><img src="imagens/partes/logo.png"/></a></div>

<!----fim menu topo------>

<div align="center" id="central" style="background:url(pags_logon/img-capa/<?php echo $vSQL['usr_capa'];?>) center;">
  <div align="left" id="alinhar">
	  <div align="right" id="infos">
		<div align="right" id="info">
            <h2><?php echo $vSQL['usr_nome'];?></h2><?php echo $vSQL['usr_sobrenome'];?><br><br>Level: <?php 
			//Dividir Leveis
			if($vSQL['usr_level'] < 100){
				echo 1;
				$valorinicio = 0;
				$valorfim = 100;
				$tituloR = "Iniciante";
			}
			else if(($vSQL['usr_level'] >= 100) && ($vSQL['usr_level'] < 500)){
				echo 2;
				$valorinicio = 100;
				$valorfim = 500;
				$tituloR = "Novato";
			}
			else if(($vSQL['usr_level'] >= 500) && ($vSQL['usr_level'] < 1500)){
				echo 3;
				$valorinicio = 500;
				$valorfim = 1500;
				$tituloR = "SocialStudy";
			}
			else{
				echo 3;
				$valorinicio = 1500;
				$valorfim = 999999999999;
				$tituloR = "Expert";
			}
			?><br><?php 
			//Porcentagem;
			$valoratual = $vSQL['usr_level'];
			$porcentagem = ($valoratual/($valorfim-$valorinicio))*100;
			
			?>
          <div class="slider" data-role="slider" data-param-init-value="<?php echo $porcentagem; ?>" align="left"><div style="left: 0px;" class="marker"></div></div>
     		<?php echo $vSQL['usr_escola'];?><br>
            
            
            

    <span data-role="dropdown">
    Mais Informáções<ul class="dropdown-menu">
    <font color="#000000">
    <table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php 
	
	echo $vSQL['usr_data_n'][8].$vSQL['usr_data_n'][9]." do ".$vSQL['usr_data_n'][5].$vSQL['usr_data_n'][6]." de ".$vSQL['usr_data_n'][0].$vSQL['usr_data_n'][1].$vSQL['usr_data_n'][2].$vSQL['usr_data_n'][3];
	
	?></td>
  </tr>
  <tr>
    <td><?php echo $vSQL['usr_genero'];?></td>
  </tr>
  <tr>
    <td><?php echo $vSQL['usr_escola'];?></td>
  </tr>
  <tr>
    <td><?php echo $vSQL['usr_serie'];?></td>
  </tr>
  <?php if($vSQL['usr_nivel'] == 9){
		echo '<tr>
    <td>Administrador</td>
  </tr>';
	}else{
		echo '<tr>
    <td>'.$tituloR.'</td>
  </tr>';
	}?>
    </table>
    </font>
    </ul>
    </span>
            <?php 
			if(!isset($_GET['uid'])){
				echo "<a href='#' id='basic-opcao'><i class='icon-cog'></i></a>";
			}
			
			?>
		</div>
			<div><a <?php if(!isset($_GET['uid']) || $_GET['uid'] == $usrID){?>href="" id='basic-foto' title="Mudar imagem de perfil" <?php }?>><img src="pags_logon/img/<?php echo $vSQL['usr_image'];?>" height="180" width="180" /></a>
            <!--style="background-image:url(pags_logon/img/<?php //echo $vSQL['usr_image'];?>);"
            -->

			</div>
	  </div>
	  <form id="form1" name="form1" method="post" action="">
      
	  <?php
        if(isset($_GET['uid']) && $_GET['uid'] != $usrID ){
			///se é amigo ou não
			$idMeu = $vSQL['usr_id'];
			$usrID = $usrID;
			$veriSQL = Conect::getConn()->prepare("SELECT * FROM `usr_usr` WHERE `flw_quem`=? AND `flw_de`=?");
		$veriSQL->execute(array($idMeu,$usrID));
			if(!$veriSQL->FETCH(PDO::FETCH_NUM)){
				?>
	  <div id="botaoS"><input type="submit" name="seguir" id="seguir" value="Seguir" /></div>
	  <?php
			}else{
			?>
            <div id="botaoS"><input type="submit" name="noseguir" id="noseguir" value="Deixar de Seguir" /></div>
			<?php
		}
		?></form>
		<div style="margin:-7px"></div><?php
		}else{
			?>
			<div style="margin:40px"></div>
			<?php
		}?>
        <div align="left" id="medalha">
        	<?php 
			echo $obgMedalha->mostrar($vSQL['usr_id'], 'usr_mdl_perg');
			echo $obgMedalha->mostrar($vSQL['usr_id'], 'usr_mdl_resp');
			echo $obgMedalha->mostrar($vSQL['usr_id'], 'usr_mdl_mrespos');
			echo $obgMedalha->mostrar($vSQL['usr_id'], 'usr_mdl_seg');
			echo $obgMedalha->mostrar($vSQL['usr_id'], 'usr_mdl_tempo');
			echo $obgMedalha->mostrar($vSQL['usr_id'], 'usr_mdl_grupativ');
			 ?>
        </div>
        <div align="right" id="menu">
        
        
        <?php if(isset($_GET['uid'])){
			?><a href='index.php' class="button default">Meu Perfil</a><?php
		}else{
			?>
            <a id="espacoMenu"></a>
			<?php
		}?></div>
	</div>
</div>
	
<div align="center">

<?php
if(isset($_GET['p'])){
	$pag = $_GET['p'];
}else{
	$pag = "home";
}
?><div id="divCentro"><?php
include('ct/'.$pag.'.php');
?>
</div>
</div>