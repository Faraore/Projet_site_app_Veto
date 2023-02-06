<?php

function getConnection(){
    $sever = 'localhost';
    $port = '3306';
    $dbname = 'bdd_petvet';
    $username = '';
    $password = '';

    $dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8";
		$retVal = null;
		try{
			$retVal = new PDO($dsn, $username, $password);
		}catch(PDOException $ex){
			print('Pas possible de se connecter !!!');
			die();
		}
		return $retVal;
	}

