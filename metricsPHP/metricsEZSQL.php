<?php

	$queryType = $_POST['type'];
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	if($queryType=="genTimeProb"){
		$result = $db->query("SELECT * FROM Problem");
		
	} elseif($queryType=="genBacklog"){
		$result = $db->query("SELECT * FROM Problem");

	} elseif($queryType=="equipNumProb"){
		$result = $db->query("SELECT * FROM Problem");

	} elseif($queryType=="equipProbTime"){
		$result = $db->query("SELECT * FROM Problem");
		
	} elseif($queryType=="softNumProb"){
		$result = $db->query("SELECT * FROM Problem");
	
	} elseif($queryType=="softProbTime"){
		$result = $db->query("SELECT * FROM Problem");
	
	} elseif($queryType=="specNumProb"){
		$result = $db->query("SELECT * FROM Problem");
	
	} elseif($queryType=="specProbTime"){
		$result = $db->query("SELECT * FROM Problem");
	
	}
	
?>