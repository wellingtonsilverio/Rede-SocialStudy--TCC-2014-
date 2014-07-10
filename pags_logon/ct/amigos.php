<?php
//Verificar se esta logado
if(!isset($_SESSION['usr_logado'])){
	header("Location: login.php");
}
?>
<?php
//se for meu perfil mostar meus amigos, se for perfil de um amigo, mostar amigos dele e amigos em comum.
$idMeu = $vSQL['usr_id'];
$veriAmigo = Conect::getConn()->prepare("SELECT * FROM `usr_usr` WHERE `flw_de`=?");
$veriAmigo->execute(array($idMeu));
$veriAmigoQ = Conect::getConn()->prepare("SELECT * FROM `usr_usr` WHERE `flw_quem`=?");
$veriAmigoQ->execute(array($idMeu));

?>
<table border="0" cellspacing="0" cellpadding="0" id="tabela" style="width:1080px; margin:0 auto;">
	<?php if($veriAmigo->rowCount() > 0){?>
  <tr>
    <td><div align="left">
<h1>&emsp;<?php echo $vSQL['usr_nome'];?> esta seguindo(<?php echo $veriAmigo->rowCount(); ?>)</h1>
<?php
while($veriAmigos = $veriAmigo->fetch(PDO::FETCH_ASSOC)){
	$veriAmigoss = $veriAmigos['flw_quem'];
	$veriUser = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=? LIMIT 1");
	$veriUser->execute(array($veriAmigoss));
	$veriUser = $veriUser->fetch(PDO::FETCH_ASSOC);
	?>
	
	  <div id="amigos"><ul>
	    <li><a href="index.php?uid=<?php echo $veriUser['usr_id']; ?>"><div id="caixaAmigo" align="center" style="background-color:<?php if($veriUser['usr_genero'] == "Masculino"){
			echo "#09F";
		}elseif($veriUser['usr_genero'] == "Feminino"){
			echo "#F3C";
		}else{
			echo "#FFF";
		}?>;"><img src="pags_logon/img/<?php echo $veriUser['usr_image']; ?>" width="140" height="140" /><br /><font color="#fff"><?php 
		$nome = $veriUser['usr_sobrenome'].", ".$veriUser['usr_nome'];
		if(strlen($nome) > 23) $nome = substr($nome,0,20) . '...';
		echo $nome;
		 ?></font>
	</div></a></li>
      </ul></div>
	<?php
}
?>
</div>
</td>
  </tr>
  <?php } else echo "<h1>Você não Segue niguem.</h1>"; ?>
  <?php if($veriAmigoQ->rowCount() > 0){?>
  <tr>
    <td><div align="left">
<h1>&emsp;Esta seguido <?php echo $vSQL['usr_nome'];?>(<?php echo $veriAmigoQ->rowCount(); ?>)</h1>
<?php
while($veriAmigosQ = $veriAmigoQ->fetch(PDO::FETCH_ASSOC)){
	$veriAmigossQ = $veriAmigosQ['flw_de'];
	$veriUserQ = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=? LIMIT 1");
	$veriUserQ->execute(array($veriAmigossQ));
	$veriUserQ = $veriUserQ->fetch(PDO::FETCH_ASSOC);
	?>
	
	  <div id="amigos"><ul>
	    <li><a href="index.php?uid=<?php echo $veriUserQ['usr_id']; ?>"><div id="caixaAmigo" align="center" style="color:#fff; background-color:<?php if($veriUserQ['usr_genero'] == "Masculino"){
			echo "#09F";
		}elseif($veriUserQ['usr_genero'] == "Feminino"){
			echo "#F3C";
		}else{
			echo "#FFF";
		}?>;"><img src="pags_logon/img/<?php echo $veriUserQ['usr_image']; ?>" width="140" height="140" /><br /><?php 
		$nome = $veriUserQ['usr_sobrenome'].", ".$veriUserQ['usr_nome'];
		if(strlen($nome) > 23) $nome = substr($nome,0,20) . '...';
		echo $nome;
		 ?>
	</div></a></li>
      </ul></div>
	<?php
}
?>
</div></td>
  </tr>
  <?php } else echo "<h1>Ninguêm segue você.</h1><br />"; ?>
</table>
