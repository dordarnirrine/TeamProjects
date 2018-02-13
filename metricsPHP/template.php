<?php

	//Get the necessary data from the front-end for the query 
	//echo "test";
	
	//connect to database
	$queryType = $_POST['type'];

	require_once 'MDB2.php';
		
	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$dsn = "mysql://$username:$password@$host/$dbName"; 

	$db = MDB2::connect($dsn); 

	if(PEAR::isError($db)){ 
		die($db->getMessage()); //this is where error is occuring, or being outputted
	}

	
	//fetch data using an sql query

	$db->setFetchMode(MDB2_FETCHMODE_ASSOC);

	/*
	if($queryType=="genTimeProb"){
		$sql= "SELECT * FROM Problem";
	} elseif($queryType=="genBacklog"){
		$sql= "SELECT * FROM Problem";
	} elseif($queryType=="equipNumProb"){
		$sql= "SELECT * FROM Problem";
	} elseif($queryType=="equipProbTime"){
		$sql= "SELECT * FROM Problem";
	} elseif($queryType=="softNumProb"){
		$sql= "SELECT * FROM Problem";
	} elseif($queryType=="softProbTime"){
		$sql= "SELECT * FROM Problem";
	} elseif($queryType=="specNumProb"){
		$sql= "SELECT * FROM Problem";
	} elseif($queryType=="specProbTime"){
		$sql= "SELECT * FROM Problem";
	}
	*/

	
	$sql= "SELECT * FROM 'Equipment'";

	$res =& $db->query($sql);
	if(PEAR::isError($res)){
		die($res->getMessage());
	}



	//return that data as a json object

	$value = json_encode($res->fetchAll());
	$JSONresult = $value;
	echo $JSONresult;
	

?>