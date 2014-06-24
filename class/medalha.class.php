<?php
class Medalha{
	public function ponto($quem, $qual, $quantos){
		if($qual == "usr_mdl_perg" || $qual == "usr_mdl_resp" || $qual == "usr_mdl_mrespos" || $qual == "usr_mdl_seg" || $qual == "usr_mdl_tempo" || $qual == "usr_mdl_grupativ"){
			$string = Conect::getConn()->prepare("UPDATE `users` SET `".$qual."` = `".$qual."` + ? WHERE `usr_id` = ?");
			$string->execute(array($quantos, $quem));
		}
	}
	
	public function mostrar($quem, $qual){
		if($qual == "usr_mdl_perg" || $qual == "usr_mdl_resp" || $qual == "usr_mdl_mrespos" || $qual == "usr_mdl_seg" || $qual == "usr_mdl_tempo" || $qual == "usr_mdl_grupativ"){
			//informações de Quem
			$infoUsr = Conect::getConn()->prepare("select * from users where usr_id = ?");
			$infoUsr->execute(array($quem));
			$infosUsr = $infoUsr->FETCH(PDO::FETCH_ASSOC);
			
			//nome para a medalha
			if($qual == "usr_mdl_perg"){
				$nomeMedalha = "quantidade de perguntas";
			}else if($qual == "usr_mdl_resp"){
				$nomeMedalha = "quantidade de respostas";
			}else if($qual == "usr_mdl_mrespos"){
				$nomeMedalha = "melhores respostas";
			}else if($qual == "usr_mdl_seg"){
				$nomeMedalha = "maior numero de seguidores";
			}else if($qual == "usr_mdl_tempo"){
				$nomeMedalha = "maior tempo na rede";
			}else if($qual == "usr_mdl_grupativ"){
				$nomeMedalha = "maior tempo ativo em grupos";
			}
			
			//Verificar qual medalha
			if($infosUsr[$qual] < 1) return "";
			else if($infosUsr[$qual] < 100)	return "<img src='medalha/11.png' title='medalhão de bronze em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 100 && $infosUsr[$qual] < 300) return "<img src='medalha/12.png' title='medalhão de prata em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 300 && $infosUsr[$qual] < 800) return "<img src='medalha/13.png' title='medalhão de ouro em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 800 && $infosUsr[$qual] < 1000) return "<img src='medalha/21.png' title='medalhão condecorado de bronze em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 1000 && $infosUsr[$qual] < 2000) return "<img src='medalha/22.png' title='medalhão condecorado de prata em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 2000 && $infosUsr[$qual] < 5000) return "<img src='medalha/23.png' title='medalhão condecorado de ouro em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 5000 && $infosUsr[$qual] < 10000) return "<img src='medalha/31.png' title='medalha de bronze em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 10000 && $infosUsr[$qual] < 30000) return "<img src='medalha/32.png' title='medalha de prata em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 30000 && $infosUsr[$qual] < 50000) return "<img src='medalha/33.png' title='medalha de ouro em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 50000 && $infosUsr[$qual] < 80000) return "<img src='medalha/41.png' title='troféu de bronze em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 80000 && $infosUsr[$qual] < 150000) return "<img src='medalha/42.png' title='troféu de prata em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else if($infosUsr[$qual] >= 150000) return "<img src='medalha/43.png' title='troféu de ouro em ".$nomeMedalha." com ".$infosUsr[$qual]." pontos.' id='imgMedalha' />";
			else ;
		}
		
	}
	
}
?>