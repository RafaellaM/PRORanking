<?php
	$url = explode("/", $_SERVER["REQUEST_URI"]);
    if(isset($url[1])){
    	if(is_numeric($url[1]) && $url[1] > -1 && $url[1] < 6){
			$ranktype = $url[1];
			if($ranktype > 2){
				$divi = 1;
			}
			else{
				$divi = 0;
			}
    	}
    	else{
    		$ranktype = 0;
    		$divi = 0;
    	}
    }
    else{
    	$ranktype = 0;
    	$divi = 0;
    }