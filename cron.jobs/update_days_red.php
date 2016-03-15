<?php
	//---------------------------------------------------
	//SET THIS CRONJOB TO RUN EVERY HOUR IN YOUR SERVER
	//---------------------------------------------------
	date_default_timezone_set('UTC');
    $db = array();
    
    function Conectar($nome,$conexao) {
    	$db = array(
        		'proranking' => array(
        								'host' 		=> '127.0.0.1',
        								'nome' 		=> 'proranking',
        								'usuario' 	=> 'root',
        								'senha' 	=> 'password'
        							)
    		  );
        if(isset($conexao[$nome])){
            return $conexao[$nome];  
        }
        try {
        	$conexao[$nome] = new PDO("mysql:host={$db[$nome]['host']};dbname={$db[$nome]['nome']}",$db[$nome]['usuario'], $db[$nome]['senha'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $conexao[$nome];
        }
        catch(Exception $e){
            echo $e;
        }  
    }
    $bd = Conectar('proranking',$db);

	function trim_w($str, $what = NULL, $with = ' '){
    	if($what		=== NULL ){
    		$what		= "\\x00-\\x20";
    	}
    	return trim(preg_replace("/[".$what."]+/", $with, $str), $what);
	}

	function do_makerankold($database) {
    	$stmt4 = $database->prepare("DELETE FROM `rank_old`");
    	$stmt4->execute();
    	$stmt = $database->prepare("SELECT `rank`,`nickname`,`data`,`cat` FROM `rank_new`");
    	$stmt->execute();
   	 	$rank = $stmt->fetchAll(PDO::FETCH_OBJ);
    	foreach($rank as $rankdata){
			$stmt2 = $database->prepare("INSERT INTO `rank_old` (`rank`,`nickname`,`data`,`cat`) values('$rankdata->rank','$rankdata->nickname','$rankdata->data','$rankdata->cat')");
        	$stmt2->execute();
    	}
    	$stmt3 = $database->prepare("DELETE FROM `rank_new`");
    	$stmt3->execute();
	}

	function do_fixrankzero($database) {
    	$stmt2 = $database->prepare("UPDATE `rank_new` SET `rank` = 1 WHERE `rank` = 0");
    	$stmt2->execute();
	}

	function url_get_contents($Url) {
    	if (!function_exists('curl_init')){ 
        	die('CURL is not installed!');
    	}
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $Url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$output = curl_exec($ch);
    	curl_close($ch);
    	return $output;
	}

	function do_getrank(){ 
		$html           = url_get_contents('http://pokemon-revolution-online.net/ladder.php');
		$Format_text    = strip_tags ($html, '<table><tr><td>');
		$Format_text_1  = preg_replace('~.*?(!?Forum)|(adsbygoogle).*?~is', '', $Format_text);
		$Format_text_2  = str_replace("( = window. || []).push({});", "", $Format_text_1);
		$Format_text_3  = preg_replace('~(!?<table cellpadding="0"(.*?)>).*?~is', '', $Format_text_2);
		$Format_text_4  = trim_w($Format_text_3);
		$Format_text_5  = str_replace("Pok&#233;mon Copyright &#169; 1995 - 2016 Nintendo/Creatures Inc./GAME FREAK Inc. Pok&#233;mon And All Respective Names are Trademarks of Nintendo 1996-2016 PRO is not affiliated with Nintendo, Creatures Inc. and GAME FREAK Inc.", "", $Format_text_4);
		$Format_text_6  = str_replace(' </td> </tr> </table> <tr> <td style="width: 70px"> </td> <td>  </td> </tr> </table> ', "", $Format_text_5);
		$Format_text_7  = str_replace('</td><td class="auto-style17">', "-", $Format_text_6);
		$Format_text_8  = str_replace('</td></tr><tr><td class="auto-style17">', "|", $Format_text_7);
		$Format_text_9  = str_replace(' <table cellpadding="10" cellspacing="0" class="auto-style2"> <tr> <td class="auto-style12"> Top RED 25 Ranked Rating (No Tier Ladder) </td> </tr> <tr> <td class="auto-style17"> <table style="width: 95%" class="auto-style2" cellpadding="10" cellspacing="0"> <tr> <td class="auto-style12" style="width: 30px; height: 33px;">Rank</td> <td class="auto-style12" style="width: 400px; height: 33px;">Username</td> <td class="auto-style12" style="width: 50px; height: 33px">Rating</td> <td class="auto-style12" style="width: 50px; height: 33px">Wins</td> <td class="auto-style12" style="width: 50px; height: 33px">Losses</td> </tr> <tr><td class="auto-style17">', "", $Format_text_8);
		$Format_text_10 = str_replace('</td></tr> </table> </td> </tr> </table> <table cellpadding="10" cellspacing="0" class="auto-style2"> <tr> <td class="auto-style12"> Top RED 25 Non-Ranked Total Wins / Losses </td> </tr> <tr> <td class="auto-style17"> <table style="width: 95%" class="auto-style2" cellpadding="10" cellspacing="0"> <tr> <td class="auto-style12" style="width: 30px; height: 33px;">Rank</td> <td class="auto-style12" style="width: 400px; height: 33px;">Username</td> <td class="auto-style12" style="width: 50px; height: 33px">Wins</td> <td class="auto-style12" style="width: 50px; height: 33px">Losses</td> <td class="auto-style12" style="width: 50px; height: 33px">Disconnects</td> </tr> <tr><td class="auto-style17">', "#", $Format_text_9);
		$Format_text_11 = str_replace('</td></tr> </table> </td> </tr> </table> <table cellpadding="10" cellspacing="0" class="auto-style2"> <tr> <td class="auto-style12"> Top RED 25 Total Game Time </td> </tr> <tr> <td class="auto-style17"> <table style="width: 95%" class="auto-style2" cellpadding="10" cellspacing="0"> <tr> <td class="auto-style12" style="width: 30px;height: 33px;">Rank</td> <td class="auto-style12" style="width: 400px; height: 33px;">Username</td> <td class="auto-style12" style="width: 100px;height: 33px">Game Time</td> </tr> <tr><td class="auto-style17">', "#", $Format_text_10);
		
		$Format_text_12  = str_replace(' <table cellpadding="10" cellspacing="0" class="auto-style2"> <tr> <td class="auto-style12"> Top BLUE 25 Ranked Rating (No Tier Ladder) </td> </tr> <tr> <td class="auto-style17"> <table style="width: 95%" class="auto-style2" cellpadding="10" cellspacing="0"> <tr> <td class="auto-style12" style="width: 30px; height: 33px;">Rank</td> <td class="auto-style12" style="width: 400px; height: 33px;">Username</td> <td class="auto-style12" style="width: 50px; height: 33px">Rating</td> <td class="auto-style12" style="width: 50px; height: 33px">Wins</td> <td class="auto-style12" style="width: 50px; height: 33px">Losses</td> </tr> <tr><td class="auto-style17">', "#", $Format_text_11);
		$Format_text_13 = str_replace('</td></tr> </table> </td> </tr> </table> <table cellpadding="10" cellspacing="0" class="auto-style2"> <tr> <td class="auto-style12"> Top BLUE 25 Non-Ranked Total Wins / Losses </td> </tr> <tr> <td class="auto-style17"> <table style="width: 95%" class="auto-style2" cellpadding="10" cellspacing="0"> <tr> <td class="auto-style12" style="width: 30px; height: 33px;">Rank</td> <td class="auto-style12" style="width: 400px; height: 33px;">Username</td> <td class="auto-style12" style="width: 50px; height: 33px">Wins</td> <td class="auto-style12" style="width: 50px; height: 33px">Losses</td> <td class="auto-style12" style="width: 50px; height: 33px">Disconnects</td> </tr> <tr><td class="auto-style17">', "#", $Format_text_12);
		$Format_text_14 = str_replace('</td></tr> </table> </td> </tr> </table> <table cellpadding="10" cellspacing="0" class="auto-style2"> <tr> <td class="auto-style12"> Top BLUE 25 Total Game Time </td> </tr> <tr> <td class="auto-style17"> <table style="width: 95%" class="auto-style2" cellpadding="10" cellspacing="0"> <tr> <td class="auto-style12" style="width: 30px;height: 33px;">Rank</td> <td class="auto-style12" style="width: 400px; height: 33px;">Username</td> <td class="auto-style12" style="width: 100px;height: 33px">Game Time</td> </tr> <tr><td class="auto-style17">', "#", $Format_text_13);
		$Format_text_15 = str_replace('</td></tr> </table>', "", $Format_text_14);
		$Format_text_16 = str_replace(' Hours', "", $Format_text_15);
		return $Format_text_16;
	}

	function do_makerank($database,$type,$Format_text_16){ 
		switch($type){
			case 0:
				$Rank   = explode("#",$Format_text_16);
				$Rank_1 = explode("|",$Rank[0]);
				$i = 0;
				while($i < 25){
					$Rank_2 = explode("-",$Rank_1[$i]);
					$data_r = "".$Rank_2[2]."-".$Rank_2[3]."-".$Rank_2[4]."";
					$stmt = $database->prepare("INSERT INTO `rank_new` (`rank`,`nickname`,`data`,`cat`) values('$Rank_2[0]','$Rank_2[1]','$data_r','0')");
        			$stmt->execute();
        			$stmt2 = $database->prepare("SELECT * FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 0");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("INSERT INTO `track_new` (`nickname`,`rdata`,`rtype`) values('$Rank_2[1]','$rdata','0')");
        				$stmt3->execute();
        			}
        			else{
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("SELECT `rdata` FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 0");
        				$stmt3->execute();
        				$r3 = $stmt3->fetchColumn();
        				if(strpos($r3, $rdate) === false){
							$rdata = "!".$rdate."|".$rhour."-".$Rank_2[0]."";
							$fdata = "".$r3."".$rdata."";
        				}
        				else{
							$rdata = "#".$rhour."-".$Rank_2[0]."";
							$fdata = "".$r3."".$rdata."";
        				}
        				$stmt4 = $database->prepare("UPDATE `track_new` SET `rdata` = '$fdata' WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 0");
        				$stmt4->execute();
        			}
					$i++;
				}
				break;
			case 1:
				$Rank   = explode("#",$Format_text_16);
				$Rank_1 = explode("|",$Rank[1]);
				$j = 0;
				while($j < 25){
					$Rank_2 = explode("-",$Rank_1[$j]);
					$data_r = "".$Rank_2[2]."-".$Rank_2[3]."-".$Rank_2[4]."";
					$stmt = $database->prepare("INSERT INTO `rank_new` (`rank`,`nickname`,`data`,`cat`) values('$Rank_2[0]','$Rank_2[1]','$data_r','1')");
        			$stmt->execute();
        			$stmt2 = $database->prepare("SELECT * FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 1");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("INSERT INTO `track_new` (`nickname`,`rdata`,`rtype`) values('$Rank_2[1]','$rdata','1')");
        				$stmt3->execute();
        			}
        			else{
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("SELECT `rdata` FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 1");
        				$stmt3->execute();
        				$r3 = $stmt3->fetchColumn();
        				if(strpos($r3, $rdate) === false){
							$rdata = "!".$rdate."|".$rhour."-".$Rank_2[0]."";
							$fdata = "".$r3."".$rdata."";
        				}
        				else{
							$rdata = "#".$rhour."-".$Rank_2[0]."";
							$fdata = "".$r3."".$rdata."";
        				}
        				$stmt4 = $database->prepare("UPDATE `track_new` SET `rdata` = '$fdata' WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 1");
        				$stmt4->execute();
        			}
					$j++;
				}
				break;
			case 2:
				$Rank   = explode("#",$Format_text_16);
				$Rank_1 = explode("|",$Rank[2]);
				$k = 0;
				while($k < 25){
					$Rank_2 = explode("-",$Rank_1[$k]);
					$stmt = $database->prepare("INSERT INTO `rank_new` (`rank`,`nickname`,`data`,`cat`) values('$Rank_2[0]','$Rank_2[1]','$Rank_2[2]','2')");
        			$stmt->execute();
        			$stmt2 = $database->prepare("SELECT * FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 2");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("INSERT INTO `track_new` (`nickname`,`rdata`,`rtype`) values('$Rank_2[1]','$rdata','2')");
        				$stmt3->execute();
        			}
        			else{
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("SELECT `rdata` FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 2");
        				$stmt3->execute();
        				$r3 = $stmt3->fetchColumn();
        				if(strpos($r3, $rdate) === false){
							$rdata = "!".$rdate."|".$rhour."-".$Rank_2[0]."";
							$fdata = "".$r3."".$rdata."";
        				}
        				else{
							$rdata = "#".$rhour."-".$Rank_2[0]."";
							$fdata = "".$r3."".$rdata."";
        				}
        				$stmt4 = $database->prepare("UPDATE `track_new` SET `rdata` = '$fdata' WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 2");
        				$stmt4->execute();
        			}
					$k++;
				}
				break;
		}
	}

	do_makerankold($bd);

	$rank_data_z = do_getrank();

	do_makerank($bd,0,$rank_data_z);

	do_makerank($bd,1,$rank_data_z);

	do_makerank($bd,2,$rank_data_z);

	do_fixrankzero($bd);