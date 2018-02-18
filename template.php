<?php

	//Get the necessary data from the front-end for the query 
	//echo "test";
	

	//connect to database
	
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


	$sql= "SELECT * FROM Problem"; 

	$res =& $db->query($sql);
	if(PEAR::isError($res)){
		die($res->getMessage());
	}

	//return that data as a json object

	$value = json_encode($res->fetchAll());
	$JSONresult = $value;
	echo $JSONresult;
	

?>