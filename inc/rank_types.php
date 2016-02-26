<?php
	$url = explode("/", $_SERVER["REQUEST_URI"]);
    if(isset($url[1])){
    	if(is_numeric($url[1]) && $url[1] > -1 && $url[1] < 3){
			$ranktype = $url[1];
    	}
    	else{
    		$ranktype = 0;
    	}
    }
    else{
    	$ranktype = 0;
    }