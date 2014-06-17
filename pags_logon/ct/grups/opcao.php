<?php
$script = $_SERVER['SCRIPT_NAME'];
$parametros = $_SERVER['QUERY_STRING'];

//Restrição para Administradores
if($eAdmin = $selectGrupoAdmin->FETCH(PDO::FETCH_ASSOC)){
?><div id="opcoesG">
    <div class="divOpc" id="mdg" onClick="javascript: $('#smdaddadmg').slideToggle(300);">Adicionar Administrador do Grupo</div>
    <section id="smdaddadmg">
    	<h1>Lista de participantes:</h1>
        <!-- Lista de pessoas no grupo -->
        <?php 
			if(isset($_GET['paadm'])) $num = $_GET['paadm']; else $num = 0;
			$iniNum = 8*$num;
			$endNum = 8+$iniNum;
			$partG = Conect::getConn()->prepare("SELECT * FROM `grp_usr` WHERE `gu_grp` = ? LIMIT ".$iniNum.",".$endNum);
			$partG->execute(array($infoGru['grp_id']));
			?>
			<div id="ParticipantesGrupo" style="height:500px;">
            <?php 
			while($partGRUPO = $partG->fetch(PDO::FETCH_ASSOC)){
				$partU = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id` = ?");
			$partU->execute(array($partGRUPO['gu_usr']));
			$partUsr = $partU->fetch(PDO::FETCH_ASSOC);
			
			
			?>
			<div id="amigos"><ul>
	    <li><a href="<?php echo $script."?".$parametros."&amp;addadm=".$partUsr['usr_id']; ?>"><div id="caixaAmigo" align="center" style="background-color:<?php if($partUsr['usr_genero'] == "Masculino"){
			echo "#09F";
		}elseif($partUsr['usr_genero'] == "Feminino"){
			echo "#F3C";
		}else{
			echo "#FFF";
		}?>;"><img src="pags_logon/img/<?php echo $partUsr['usr_image']; ?>" width="140" height="140" /><br /><font color="#000000"><?php 
		
		$nome = $partUsr['usr_sobrenome'].", ".$partUsr['usr_nome'];
		if(strlen($nome) > 23) $nome = substr($nome,0,20) . '...';
		echo $nome;
		 ?></font>
	</div></a></li>
      </ul></div>
			<?php
			}
			?>
            <?php
			if(isset($_GET['paadm']) && $_GET['paadm'] > 0){
				?>
                <a href="<?php 
			isset($_GET['paadm']) ? $oanum = $_GET['paadm']-1 : $oanum = 0;
			echo $script."?".$parametros."&amp;paadm=".$oanum; ?>"><input type="submit" name="opcao" id="opcao" value="Menos Pessoas" /></a>
                <?php 
			}
			?>
            <a href="<?php 
			isset($_GET['paadm']) ? $oanum = $_GET['paadm']+1 : $oanum = 1;
			$script = $_SERVER['SCRIPT_NAME'];
			$parametros = $_SERVER['QUERY_STRING'];
			echo $script."?".$parametros."&amp;paadm=".$oanum; ?>"><input type="submit" name="opcao" id="opcao" value="Mais Pessoas" /></a>
        </div>
			<?php
		?>
    </section>
    <div class="divOpc" id="mdg" onClick="javascript: $('#smdremadmg').slideToggle(300);">Remover Administrador do Grupo</div>
    <section id="smdremadmg">
    	<h1>Lista de Administradores:</h1>
        <!-- Lista de pessoas no grupo -->
        <?php 
			if(isset($_GET['pradm'])) $num = $_GET['pradm']; else $num = 0;
			$iniNum = 8*$num;
			$endNum = 8+$iniNum;
			$partG = Conect::getConn()->prepare("SELECT * FROM `grp_adm` WHERE `gadm_grp` = ? LIMIT ".$iniNum.",".$endNum);
			$partG->execute(array($infoGru['grp_id']));
			?>
			<div id="ParticipantesGrupo" style="height:500px;">
            <?php 
			while($partGRUPO = $partG->fetch(PDO::FETCH_ASSOC)){
				$partU = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id` = ?");
			$partU->execute(array($partGRUPO['gadm_usr']));
			$partUsr = $partU->fetch(PDO::FETCH_ASSOC);
			
			
			?>
			<div id="amigos"><ul>
	    <li><a href="<?php echo $script."?".$parametros."&amp;remadm=".$partUsr['usr_id']; ?>"><div id="caixaAmigo" align="center" style="background-color:<?php if($partUsr['usr_genero'] == "Masculino"){
			echo "#09F";
		}elseif($partUsr['usr_genero'] == "Feminino"){
			echo "#F3C";
		}else{
			echo "#FFF";
		}?>;"><img src="pags_logon/img/<?php echo $partUsr['usr_image']; ?>" width="140" height="140" /><br /><font color="#000000"><?php 
		
		$nome = $partUsr['usr_sobrenome'].", ".$partUsr['usr_nome'];
		if(strlen($nome) > 23) $nome = substr($nome,0,20) . '...';
		echo $nome;
		 ?></font>
	</div></a></li>
      </ul></div>
			<?php
			}
			?>
            <?php
			if(isset($_GET['pradm']) && $_GET['pradm'] > 0){
				?>
                <a href="<?php 
			isset($_GET['pradm']) ? $oanum = $_GET['pradm']-1 : $oanum = 0;
			echo $script."?".$parametros."&amp;pradm=".$oanum; ?>"><input type="submit" name="opcao" id="opcao" value="Menos Pessoas" /></a>
                <?php 
			}
			?>
            <a href="<?php 
			isset($_GET['pradm']) ? $oanum = $_GET['pradm']+1 : $oanum = 1;
			$script = $_SERVER['SCRIPT_NAME'];
			$parametros = $_SERVER['QUERY_STRING'];
			echo $script."?".$parametros."&amp;pradm=".$oanum; ?>"><input type="submit" name="opcao" id="opcao" value="Mais Pessoas" /></a>
        </div>
			<?php
		?>
    </section>
    <div class="divOpc" id="mdg" onClick="javascript: $('#smdg').slideToggle(300);">Mudar descriçao do Grupo</div>
    <section id="smdg">
    	<h1>Descriçao:</h1>
        <form method="post">
        <textarea id="mdesc" name="mdesc"></textarea>
        <input name="Submit" type="submit" class="submit" value="Editar descriçao" style="float:right; margin-top:-37px; margin-right:5px; border-radius:5px; width:150px;" />
        </form>
    </section>
    <div class="divOpc" onClick="javascript: $('#smng').slideToggle(300);">Mudar nome do Grupo</div>
    <section id="smng">
    	<h1>Mudar nome:</h1>
        <form method="post">
        <input type="text" id="mdnome" name="mdnome" />
        <input name="Submit" type="submit" class="submit" value="Editar nome" style="float:right; margin-top:-29px; margin-right:5px; border-radius:5px; width:150px;" />
        </form>
    </section>
    <div class="divOpc" onClick="javascript: $('#smcdg').slideToggle(300);">Mudar categorias do Grupo</div>
    <section id="smcdg">
    	<h1>Mudar Categoria:</h1>
        <form method="post">
        <select id="seleCateg" name="seleCateg">
        <?php
        $selectCateg = Conect::getConn()->prepare("select * from `catery`");
		$selectCateg->execute();
		while($verCateg = $selectCateg->FETCH(PDO::FETCH_ASSOC)){
			echo "<option value='".$verCateg['cat_id']."'";
			if($verCateg['cat_id'] == $infoGru['grp_cat']) echo " selected>"; else echo ">";
			echo $verCateg['cat_titulo']."</option>";
		}
		?>
        </select>
        <input name="Submit" type="submit" class="submit" value="Mudar categoria" style="float:right; margin-top:-29px; margin-right:5px; border-radius:5px; width:150px;" />
        </form>
    </section>
    <div class="divOpc" onClick="javascript: $('#smfg').slideToggle(300);">Mudar a foto do Grupo</div>
  <section id="smfg">
    	<h1>Mudar foto:</h1>
        <form method="post" enctype="multipart/form-data">
        <input type="file" name="mdfoto" id="mdfoto">
        <input name="Submit" type="submit" class="submit" value="Editar foto" style="float:right; margin-top:-29px; margin-right:5px; border-radius:5px; width:150px;" />
    </form>
    </section>
</div>
<?php
}
else
{
	echo "<h1 style='text-align:center;'>Página restrita.</h1>";
}
?>