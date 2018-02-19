<?php

	$queryType = $_POST['type'];
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	//echo json_encode($db->get_results("SELECT * FROM Equipment"));

	if($queryType=="genTimeProb"){
		$result = $db->query("SELECT * FROM Equipment");
		
	} elseif($queryType=="genBacklog"){
		$result = $db->query("SELECT * FROM Equipment");

	} elseif($queryType=="equipNumProb"){
		$result = $db->query("SELECT * FROM Equipment");

	} elseif($queryType=="equipProbTime"){
		$result = $db->query("SELECT * FROM Equipment");
		
	} elseif($queryType=="softNumProb"){
		$result = $db->query("SELECT * FROM Equipment");
	
	} elseif($queryType=="softProbTime"){
		$result = $db->query("SELECT * FROM Equipment");
	
	} elseif($queryType=="specNumProb"){
		$result = $db->query("SELECT * FROM Equipment");
	
	} elseif($queryType=="specProbTime"){
		$result = $db->query("SELECT * FROM Equipment");
	
	} elseif($queryType=="equipInfo"){
		$result = $db->query("SELECT * FROM Equipment WHERE ");
	}
	
?>