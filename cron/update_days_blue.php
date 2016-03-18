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
		$Format_text_17 = str_replace(' </td> </tr> </table>', "", $Format_text_16);
		$Format_text_18 = str_replace('s1-', "1-", $Format_text_17);
		return $Format_text_18;
	}

	function do_makerank($database,$type,$Format_text_16){ 
		switch($type){
			case 3:
				$Rank   = explode("#",$Format_text_16);
				$Rank_1 = explode("|",$Rank[3]);
				$i = 0;
				while($i < 25){
					$Rank_2 = explode("-",$Rank_1[$i]);
					$data_r = "$Rank_2[2]-$Rank_2[3]-$Rank_2[4]";
					$stmt = $database->prepare("INSERT INTO `rank_new` (`rank`,`nickname`,`data`,`cat`) values('$Rank_2[0]','$Rank_2[1]','$data_r','3')");
        			$stmt->execute();
        			$stmt2 = $database->prepare("SELECT * FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 3");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("INSERT INTO `track_new` (`nickname`,`rdata`,`rtype`) values('$Rank_2[1]','$rdata','3')");
        				$stmt3->execute();
        			}
        			else{
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("SELECT `rdata` FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 3");
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
        				$stmt4 = $database->prepare("UPDATE `track_new` SET `rdata` = '$fdata' WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 3");
        				$stmt4->execute();
        			}
					$i++;
				}
				break;
			case 4:
				$Rank   = explode("#",$Format_text_16);
				$Rank_1 = explode("|",$Rank[4]);
				$j = 0;
				while($j < 25){
					$Rank_2 = explode("-",$Rank_1[$j]);
					$data_r = "$Rank_2[2]-$Rank_2[3]-$Rank_2[4]";
					$stmt = $database->prepare("INSERT INTO `rank_new` (`rank`,`nickname`,`data`,`cat`) values('$Rank_2[0]','$Rank_2[1]','$data_r','4')");
        			$stmt->execute();
        			$stmt2 = $database->prepare("SELECT * FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 4");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("INSERT INTO `track_new` (`nickname`,`rdata`,`rtype`) values('$Rank_2[1]','$rdata','4')");
        				$stmt3->execute();
        			}
        			else{
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("SELECT `rdata` FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 4");
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
        				$stmt4 = $database->prepare("UPDATE `track_new` SET `rdata` = '$fdata' WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 4");
        				$stmt4->execute();
        			}
					$j++;
				}
				break;
			case 5:
				$Rank   = explode("#",$Format_text_16);
				$Rank_1 = explode("|",$Rank[5]);
				$k = 0;
				while($k < 25){
					$Rank_2 = explode("-",$Rank_1[$k]);
					$stmt = $database->prepare("INSERT INTO `rank_new` (`rank`,`nickname`,`data`,`cat`) values('$Rank_2[0]','$Rank_2[1]','$Rank_2[2]','5')");
        			$stmt->execute();
        			$stmt2 = $database->prepare("SELECT * FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 5");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("INSERT INTO `track_new` (`nickname`,`rdata`,`rtype`) values('$Rank_2[1]','$rdata','5')");
        				$stmt3->execute();
        			}
        			else{
        				$rdate = date("j/n/y");
        				$rhour = date("G:i");
        				$rdata = "".$rdate."|".$rhour."-".$Rank_2[0]."";
						$stmt3 = $database->prepare("SELECT `rdata` FROM `track_new` WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 5");
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
        				$stmt4 = $database->prepare("UPDATE `track_new` SET `rdata` = '$fdata' WHERE `nickname` = '$Rank_2[1]' AND `rtype` = 5");
        				$stmt4->execute();
        			}
					$k++;
				}
				break;
		}
	}

	$rank_data_z = do_getrank();

	do_makerank($bd,3,$rank_data_z);

	do_makerank($bd,4,$rank_data_z);

	do_makerank($bd,5,$rank_data_z);

	do_fixrankzero($bd);