<?php
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
