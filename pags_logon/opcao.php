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
	<link href="../css/modern.css" rel="stylesheet">
    <link href="../css/padrao.css" rel="stylesheet" type="text/css">
    <script type='text/javascript' src="../javascript/jquery.js"></script>
    <script type='text/javascript' src="../javascript/jquery.simplemodal.js"></script>
    <script type='text/javascript' src="../javascript/basic.js"></script>
    <script type='text/javascript' src="../javascript/slider.js"></script>
</head>
<body>
<i class='icon-wrench' style="font-size:36px"> Alterar Informações:</i>
<p>
	<div id="alterInfos">
		<form action="?opcao=att" method="post" enctype="multipart/form-data" name="Info-user"><div class="input-control text">
          </p>
    <div class="input-control text">
    <input name="nome" type="text" class="with-helper" id="nome" placeholder="Coloque seu Nome" value="<?php 
	if($vSQL['usr_nome'] == ''){
	}else{
		echo $vSQL['usr_nome'];
	}?>" />
    
    
    <div class="input-control text">
    <input name="sobrenome" type="text" class="with-helper" id="sobrenome" placeholder="Coloque seu Sobrenome" value="<?php 
	if($vSQL['usr_sobrenome'] == ''){
	}else{
		echo $vSQL['usr_sobrenome'];
	}?>" />
    
    
    <div class="input-control text">
    <?php 
	//configurar a data
	$ano = $vSQL['usr_data_n'][0].$vSQL['usr_data_n'][1].$vSQL['usr_data_n'][2].$vSQL['usr_data_n'][3];
	$mes = $vSQL['usr_data_n'][5].$vSQL['usr_data_n'][6];
	$dia = $vSQL['usr_data_n'][8].$vSQL['usr_data_n'][9];
	?>
    <select name="datad" class="with-helper" id="datad" style="width:80px;">
        <option <?php if($dia == "01") echo "selected";?> >01</option>
        <option <?php if($dia == "02") echo "selected";?> >02</option>
        <option <?php if($dia == "03") echo "selected";?> >03</option>
        <option <?php if($dia == "04") echo "selected";?> >04</option>
        <option <?php if($dia == "05") echo "selected";?> >05</option>
        <option <?php if($dia == "06") echo "selected";?> >06</option>
        <option <?php if($dia == "07") echo "selected";?> >07</option>
        <option <?php if($dia == "08") echo "selected";?> >08</option>
        <option <?php if($dia == "09") echo "selected";?> >09</option>
        <option <?php if($dia == "10") echo "selected";?> >10</option>
        <option <?php if($dia == "11") echo "selected";?> >11</option>
        <option <?php if($dia == "12") echo "selected";?> >12</option>
        <option <?php if($dia == "13") echo "selected";?> >13</option>
        <option <?php if($dia == "14") echo "selected";?> >14</option>
        <option <?php if($dia == "15") echo "selected";?> >15</option>
        <option <?php if($dia == "16") echo "selected";?> >16</option>
        <option <?php if($dia == "17") echo "selected";?> >17</option>
        <option <?php if($dia == "18") echo "selected";?> >18</option>
        <option <?php if($dia == "19") echo "selected";?> >19</option>
        <option <?php if($dia == "20") echo "selected";?> >20</option>
        <option <?php if($dia == "21") echo "selected";?> >21</option>
        <option <?php if($dia == "22") echo "selected";?> >22</option>
        <option <?php if($dia == "23") echo "selected";?> >23</option>
        <option <?php if($dia == "24") echo "selected";?> >24</option>
        <option <?php if($dia == "25") echo "selected";?> >25</option>
        <option <?php if($dia == "26") echo "selected";?> >26</option>
        <option <?php if($dia == "27") echo "selected";?> >27</option>
        <option <?php if($dia == "28") echo "selected";?> >28</option>
        <option <?php if($dia == "29") echo "selected";?> >29</option>
        <option <?php if($dia == "30") echo "selected";?> >30</option>
        <option <?php if($dia == "31") echo "selected";?> >31</option>
    </select>
    
    <select name="datam" class="with-helper" id="datam" style="width:80px;">
        <option <?php if($mes == "01") echo "selected";?> >01</option>
        <option <?php if($mes == "02") echo "selected";?> >02</option>
        <option <?php if($mes == "03") echo "selected";?> >03</option>
        <option <?php if($mes == "04") echo "selected";?> >04</option>
        <option <?php if($mes == "05") echo "selected";?> >05</option>
        <option <?php if($mes == "06") echo "selected";?> >06</option>
        <option <?php if($mes == "07") echo "selected";?> >07</option>
        <option <?php if($mes == "08") echo "selected";?> >08</option>
        <option <?php if($mes == "09") echo "selected";?> >09</option>
        <option <?php if($mes == "10") echo "selected";?> >10</option>
        <option <?php if($mes == "11") echo "selected";?> >11</option>
        <option <?php if($mes == "12") echo "selected";?> >12</option>
    </select>
    
    <select name="datay" class="with-helper" id="datay" style="width:120px;">
        <option <?php if($ano == "1950") echo "selected";?> >1950</option>
        <option <?php if($ano == "1951") echo "selected";?> >1951</option>
        <option <?php if($ano == "1952") echo "selected";?> >1952</option>
        <option <?php if($ano == "1953") echo "selected";?> >1953</option>
        <option <?php if($ano == "1954") echo "selected";?> >1954</option>
        <option <?php if($ano == "1955") echo "selected";?> >1955</option>
        <option <?php if($ano == "1956") echo "selected";?> >1956</option>
        <option <?php if($ano == "1957") echo "selected";?> >1957</option>
        <option <?php if($ano == "1958") echo "selected";?> >1958</option>
        <option <?php if($ano == "1959") echo "selected";?> >1959</option>
        <option <?php if($ano == "1960") echo "selected";?> >1960</option>
        <option <?php if($ano == "1961") echo "selected";?> >1961</option>
        <option <?php if($ano == "1962") echo "selected";?> >1962</option>
        <option <?php if($ano == "1963") echo "selected";?> >1963</option>
        <option <?php if($ano == "1964") echo "selected";?> >1964</option>
        <option <?php if($ano == "1965") echo "selected";?> >1965</option>
        <option <?php if($ano == "1966") echo "selected";?> >1966</option>
        <option <?php if($ano == "1967") echo "selected";?> >1967</option>
        <option <?php if($ano == "1968") echo "selected";?> >1968</option>
        <option <?php if($ano == "1969") echo "selected";?> >1969</option>
        <option <?php if($ano == "1970") echo "selected";?> >1970</option>
        <option <?php if($ano == "1971") echo "selected";?> >1971</option>
        <option <?php if($ano == "1972") echo "selected";?> >1972</option>
        <option <?php if($ano == "1973") echo "selected";?> >1973</option>
        <option <?php if($ano == "1974") echo "selected";?> >1974</option>
        <option <?php if($ano == "1975") echo "selected";?> >1975</option>
        <option <?php if($ano == "1976") echo "selected";?> >1976</option>
        <option <?php if($ano == "1977") echo "selected";?> >1977</option>
        <option <?php if($ano == "1978") echo "selected";?> >1978</option>
        <option <?php if($ano == "1979") echo "selected";?> >1979</option>
        <option <?php if($ano == "1980") echo "selected";?> >1980</option>
        <option <?php if($ano == "1981") echo "selected";?> >1981</option>
        <option <?php if($ano == "1982") echo "selected";?> >1982</option>
        <option <?php if($ano == "1983") echo "selected";?> >1983</option>
        <option <?php if($ano == "1984") echo "selected";?> >1984</option>
        <option <?php if($ano == "1985") echo "selected";?> >1985</option>
        <option <?php if($ano == "1986") echo "selected";?> >1986</option>
        <option <?php if($ano == "1987") echo "selected";?> >1987</option>
        <option <?php if($ano == "1988") echo "selected";?> >1988</option>
        <option <?php if($ano == "1989") echo "selected";?> >1989</option>
        <option <?php if($ano == "1990") echo "selected";?> >1990</option>
        <option <?php if($ano == "1991") echo "selected";?> >1991</option>
        <option <?php if($ano == "1992") echo "selected";?> >1992</option>
        <option <?php if($ano == "1993") echo "selected";?> >1993</option>
        <option <?php if($ano == "1994") echo "selected";?> >1994</option>
        <option <?php if($ano == "1995") echo "selected";?> >1995</option>
        <option <?php if($ano == "1996") echo "selected";?> >1996</option>
        <option <?php if($ano == "1997") echo "selected";?> >1997</option>
        <option <?php if($ano == "1998") echo "selected";?> >1998</option>
        <option <?php if($ano == "1999") echo "selected";?> >1999</option>
        <option <?php if($ano == "2000") echo "selected";?> >2000</option>
        <option <?php if($ano == "2001") echo "selected";?> >2001</option>
        <option <?php if($ano == "2002") echo "selected";?> >2002</option>
        <option <?php if($ano == "2003") echo "selected";?> >2003</option>
        <option <?php if($ano == "2004") echo "selected";?> >2004</option>
        <option <?php if($ano == "2005") echo "selected";?> >2005</option>
        <option <?php if($ano == "2006") echo "selected";?> >2006</option>
        <option <?php if($ano == "2007") echo "selected";?> >2007</option>
        <option <?php if($ano == "2008") echo "selected";?> >2008</option>
        <option <?php if($ano == "2009") echo "selected";?> >2009</option>
        <option <?php if($ano == "2010") echo "selected";?> >2010</option>
        <option <?php if($ano == "2011") echo "selected";?> >2011</option>
        <option <?php if($ano == "2012") echo "selected";?> >2012</option>
        <option <?php if($ano == "2013") echo "selected";?> >2013</option>
        <option <?php if($ano == "2014") echo "selected";?> >2014</option>
        <option <?php if($ano == "2015") echo "selected";?> >2015</option>
        <option <?php if($ano == "2016") echo "selected";?> >2016</option>
        <option <?php if($ano == "2017") echo "selected";?> >2017</option>
        <option <?php if($ano == "2018") echo "selected";?> >2018</option>
        <option <?php if($ano == "2019") echo "selected";?> >2019</option>
    </select>
    
    
    <div class="input-control text">
    <input name="escola" type="text" class="with-helper" id="escola" placeholder="Coloque a escola onde estuda ou o local onde trabalha" value="<?php 
	if($vSQL['usr_escola'] == ''){
	}else{
		echo $vSQL['usr_escola'];
	}?>" />
    
    
    <div class="input-control text">
    <input name="serie" type="text" class="with-helper" id="serie" placeholder="Coloque sua série ou área de trabalho" value="<?php 
	if($vSQL['usr_serie'] == ''){
	}else{
		echo $vSQL['usr_serie'];
	}?>" />
    
    
    <div class="input-control text">
    <input name="local" type="text" class="with-helper" id="local" placeholder="Coloque local onde reside" value="<?php 
	if($vSQL['usr_local'] == ''){
	}else{
		echo $vSQL['usr_local'];
	}?>" />
    
    
    <div class="input-control text">
    <select name="genero" class="with-helper" id="genero"><?php 
	if($vSQL['usr_genero'] == ''){
		echo '<option>Masculino</option>';
		echo '<option>Feminino</option>';
	}else{
		if($vSQL['usr_genero'] == "Masculino") echo "<option selected>Masculino</option><option>Feminino</option>";
		else echo "<option>Masculino</option><option selected>Feminino</option>";
	}?></select>
    </div>
      <br>
            &emsp;<input type="submit" value="Atualizar"/>
            <input type="reset"  value="Reset"/>
          </div>
		</form>
    </div>
</p>
</body>
</html>