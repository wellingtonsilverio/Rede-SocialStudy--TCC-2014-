<?php
//Verificar se esta logado
if(!isset($_SESSION['usr_logado'])){
	header("Location: login.php");
}
?>
<div id="att" align="left">
	<h1>&emsp;Atualizações</h1>
    <p>
    
<?php

//if se estiver no meu perfil: meuid ! id do usuario.
if(isset($_GET['uid']) && $_GET['uid'] != $usrID){
	$idAmigos = $_GET['uid'];
}else{
	$idAmigos = $vSQL['usr_id'];
}

if(!isset($_GET['uid'])){
	$veriRefesh = Conect::getConn()->prepare("SELECT *
FROM usr_usr
INNER JOIN refesh ON usr_usr.flw_quem = refesh.user_id WHERE usr_usr.flw_de = ? ORDER BY refesh.att_id DESC LIMIT 0,10");
	$veriRefesh->execute(array($idAmigos));
}else{
	$veriRefesh = Conect::getConn()->prepare("SELECT *
FROM refesh WHERE user_id = ? ORDER BY att_id DESC LIMIT 0,10");
	$veriRefesh->execute(array($idAmigos));
}

while($veriRefeshs = $veriRefesh->fetch(PDO::FETCH_NUM)){
	if(!isset($_GET['uid'])){
		$add = 0;
		$addU = 2;
	}else{
		$addU = -1;
		$add = -3;
	}
	$veriUser = Conect::getConn()->prepare("SELECT *
FROM `users`
WHERE usr_id = ?");
	$veriUser->execute(array($veriRefeshs['2'+$addU]));
	$veriUsers = $veriUser->FETCH(PDO::FETCH_ASSOC);
	
?>
   	<ul class="replies">
    	<li class="bg-color-<?php if($veriRefeshs['5'+$add] == 1){
			echo "blue";
		}else if($veriRefeshs['5'+$add] == 9){
			echo "red";
		}else{
			echo "orange";
		}?>">
        <b class="sticker sticker-left sticker-color-<?php if($veriRefeshs['5'+$add] == 1){
			echo "blue";
		}else if($veriRefeshs['5'+$add] == 9){
			echo "red";
		}else{
			echo "orange";
		}?>"></b>
        <a href="index.php?uid=<?php echo $veriUsers['usr_id']; ?>"><div class="avatar"><img src="./pags_logon/img/<?php echo $veriUsers['usr_image'];?>"></div>
        <div class="reply">
        <div class="date"><?php echo $veriRefeshs['7'+$add]; ?></div>
        <div class="author">de: <?php echo $veriUsers['usr_nome']; ?></div>
        <div class="text"><?php echo $veriRefeshs['6'+$add]; ?></div>
        </div></a>
        </li>
    </ul>
    <?php
}
if(!$veriRefesh->rowCount()){
	?>
   	<ul class="replies">
    	<li class="bg-color-red">
        <b class="sticker sticker-left sticker-color-red"></b>
        <div class="avatar"><img src="./pags_logon/img/admin.jpg"></div>
        <div class="reply">
        <div class="date"><strong>AGORA</strong></div>
        <div class="author">de: Admin: Wellington</div>
        <div class="text"> Seja bem vindo! aqui um link para uma vídeo-aula gratuita de como usar a SocialStudy.<br />
          Qualquer duvida entre e contato em wellington.silverio@etec.sp.gov.br        </div>
        </div>
        </li>
    </ul>
    <?php
}
	?>
    
    
    
        </p>
  </div>