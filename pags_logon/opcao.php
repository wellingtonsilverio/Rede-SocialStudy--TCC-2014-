<?php
include('../class/conect.class.php');
include('../class/login.class.php');
include('../class/verificar.class.php');

if(!isset($_SESSION)){
	session_start();
}

$objVeri = new veri;
$vSQL = $objVeri->veris($_SESSION['usr_email'],$_SESSION['usr_senha']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>SocialStudy - Rede social para estudos.</title>
	<meta charset="UTF-8">
    <link href="../css/padrao.css" rel="stylesheet" type="text/css">
	<link href="../css/modern.css" rel="stylesheet">
    <script type='text/javascript' src="../javascript/jquery.js"></script>
    <script type='text/javascript' src="../javascript/jquery.simplemodal.js"></script>
    <script type='text/javascript' src="../javascript/basic.js"></script>
    <script type='text/javascript' src="../javascript/slider.js"></script>
</head>
<body>
<i class='icon-wrench' style="font-size:36px"> Alterar Informações:</i>
<p>
	<div>
		<form action="?opcao=att" method="post" enctype="multipart/form-data" name="Info-user"><div class="input-control text">
          </p>
    <div class="input-control text">
    <input name="nome" type="text" class="with-helper" id="nome" value="<?php 
	if($vSQL['usr_nome'] == ''){
		echo 'Coloque seu Nome;';
	}else{
		echo $vSQL['usr_nome'];
	}?>" />
    <button class="helper"></button>
    
    
    <div class="input-control text">
    <input name="sobrenome" type="text" class="with-helper" id="sobrenome" value="<?php 
	if($vSQL['usr_sobrenome'] == ''){
		echo 'Coloque seu Sobrenome;';
	}else{
		echo $vSQL['usr_sobrenome'];
	}?>" />
    <button class="helper"></button>
    
    
    <div class="input-control text">
    <input name="data" type="text" class="with-helper" id="data" value="<?php 
	if($vSQL['usr_data_n'] == ''){
		echo 'Coloque sua data de nacimento;';
	}else{
		echo $vSQL['usr_data_n'];
	}?>" />
    <button class="helper"></button>
    
    
    <div class="input-control text">
    <input name="escola" type="text" class="with-helper" id="escola" value="<?php 
	if($vSQL['usr_escola'] == ''){
		echo 'Coloque a escola onde estuda ou o local onde trabalha;';
	}else{
		echo $vSQL['usr_escola'];
	}?>" />
    <button class="helper"></button>
    
    
    <div class="input-control text">
    <input name="serie" type="text" class="with-helper" id="serie" value="<?php 
	if($vSQL['usr_serie'] == ''){
		echo 'Coloque sua série ou área de trabalho;';
	}else{
		echo $vSQL['usr_serie'];
	}?>" />
    <button class="helper"></button>
    
    
    <div class="input-control text">
    <input name="local" type="text" class="with-helper" id="local" value="<?php 
	if($vSQL['usr_local'] == ''){
		echo 'Coloque local onde reside;';
	}else{
		echo $vSQL['usr_local'];
	}?>" />
    <button class="helper"></button>
    
    
    <div class="input-control text">
    <input name="genero" type="text" class="with-helper" id="genero" value="<?php 
	if($vSQL['usr_genero'] == ''){
		echo 'Masculino/Feminino;';
	}else{
		echo $vSQL['usr_genero'];
	}?>" />
    <button class="helper"></button>
    </div>
      <p><br>
            &emsp;<input type="submit" value="Atualizar"/>
            <input type="reset"  value="Reset"/>
          </div>
		</form>
    </div>
</p>
</body>
</html>