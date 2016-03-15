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

	function do_makerankold($database,$type) {
		switch($type){
			case 3:
    			$stmt = $database->prepare("SELECT `nickname`,`rdata`,`rtype` FROM `track_new` WHERE `rtype` = 3");
    			$stmt->execute();
   	 			$rank = $stmt->fetchAll(PDO::FETCH_OBJ);
    			foreach($rank as $rankdata){
					$stmt2 = $database->prepare("SELECT * FROM `track_old` WHERE `nickname` = '$rankdata->nickname' AND `rtype` = 3");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("n/y");
        				$rdata = str_replace($rdate, "", $rankdata->rdata);
        				$fdata = "".$rdate."?".$rdata."";
        				$stmt3 = $database->prepare("INSERT INTO `track_old` (`nickname`,`rdata`,`rtype`) values('$rankdata->nickname','$fdata','3')");
        				$stmt3>execute();
        			}
        			else{
        				$rdate = date("n/y");
        				$rdata = str_replace($rdate, "", $rankdata->rdata);
        				$stmt3 = $database->prepare("SELECT `rdata` FROM `track_old` WHERE `nickname` = '$rankdata->nickname_2[1]' AND `rtype` = 3");
        				$stmt3->execute();
        				$r3 = $stmt3->fetchColumn();
        				$fdata = "".$r3."%".$rdate."?".$rdata."";
        				$stmt4 = $database->prepare("UPDATE `track_old` SET `rdata` = '$fdata' WHERE `nickname` = '$rankdata->nickname' AND `rtype` = 3");
        				$stmt4->execute();
        			}
    			}
    			$stmt5 = $database->prepare("DELETE FROM `rank_new` WHERE `rtype` = 3");
    			$stmt5->execute();
    		break;
			case 4:
    			$stmt = $database->prepare("SELECT `nickname`,`rdata`,`rtype` FROM `track_new` WHERE `rtype` = 4");
    			$stmt->execute();
   	 			$rank = $stmt->fetchAll(PDO::FETCH_OBJ);
    			foreach($rank as $rankdata){
					$stmt2 = $database->prepare("SELECT * FROM `track_old` WHERE `nickname` = '$rankdata->nickname' AND `rtype` = 4");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("n/y");
        				$rdata = str_replace($rdate, "", $rankdata->rdata);
        				$fdata = "".$rdate."?".$rdata."";
        				$stmt3 = $database->prepare("INSERT INTO `track_old` (`nickname`,`rdata`,`rtype`) values('$rankdata->nickname','$fdata','4')");
        				$stmt3>execute();
        			}
        			else{
        				$rdate = date("n/y");
        				$rdata = str_replace($rdate, "", $rankdata->rdata);
        				$stmt3 = $database->prepare("SELECT `rdata` FROM `track_old` WHERE `nickname` = '$rankdata->nickname_2[1]' AND `rtype` = 4");
        				$stmt3->execute();
        				$r3 = $stmt3->fetchColumn();
        				$fdata = "".$r3."%".$rdate."?".$rdata."";
        				$stmt4 = $database->prepare("UPDATE `track_old` SET `rdata` = '$fdata' WHERE `nickname` = '$rankdata->nickname' AND `rtype` = 4");
        				$stmt4->execute();
        			}
    			}
    			$stmt5 = $database->prepare("DELETE FROM `rank_new` WHERE `rtype` = 4");
    			$stmt5->execute();
    		break;
    		case 5:
    			$stmt = $database->prepare("SELECT `nickname`,`rdata`,`rtype` FROM `track_new` WHERE `rtype` = 5");
    			$stmt->execute();
   	 			$rank = $stmt->fetchAll(PDO::FETCH_OBJ);
    			foreach($rank as $rankdata){
					$stmt2 = $database->prepare("SELECT * FROM `track_old` WHERE `nickname` = '$rankdata->nickname' AND `rtype` = 5");
        			$stmt2->execute();
        			if($stmt2->rowCount() < 1){
        				$rdate = date("n/y");
        				$rdata = str_replace($rdate, "", $rankdata->rdata);
        				$fdata = "".$rdate."?".$rdata."";
        				$stmt3 = $database->prepare("INSERT INTO `track_old` (`nickname`,`rdata`,`rtype`) values('$rankdata->nickname','$fdata','5')");
        				$stmt3>execute();
        			}
        			else{
        				$rdate = date("n/y");
        				$rdata = str_replace($rdate, "", $rankdata->rdata);
        				$stmt3 = $database->prepare("SELECT `rdata` FROM `track_old` WHERE `nickname` = '$rankdata->nickname_2[1]' AND `rtype` = 5");
        				$stmt3->execute();
        				$r3 = $stmt3->fetchColumn();
        				$fdata = "".$r3."%".$rdate."?".$rdata."";
        				$stmt4 = $database->prepare("UPDATE `track_old` SET `rdata` = '$fdata' WHERE `nickname` = '$rankdata->nickname' AND `rtype` = 5");
        				$stmt4->execute();
        			}
    			}
    			$stmt5 = $database->prepare("DELETE FROM `rank_new` WHERE `rtype` = 5");
    			$stmt5->execute();
    		break;
    	}
	}
	
	do_makerankold($bd,3);

	do_makerankold($bd,4);

	do_makerankold($bd,5);