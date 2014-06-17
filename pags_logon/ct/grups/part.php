<?php 
			$partG = Conect::getConn()->prepare("SELECT * FROM `grp_usr` WHERE `gu_grp`=?");
			$partG->execute(array($infoGru['grp_id']));
			?>
			<div id="ParticipantesGrupo">
            <?php 
			while($partGRUPO = $partG->fetch(PDO::FETCH_ASSOC)){
				$partU = Conect::getConn()->prepare("SELECT * FROM `users` WHERE `usr_id`=?");
			$partU->execute(array($partGRUPO['gu_usr']));
			$partUsr = $partU->fetch(PDO::FETCH_ASSOC);
			
			
			?>
			<div id="amigos"><ul>
	    <li><a href="index.php?uid=<?php echo $partUsr['usr_id']; ?>"><div id="caixaAmigo" align="center" style="background-color:<?php if($partUsr['usr_genero'] == "Masculino"){
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
        </div>
			<?php
		?>