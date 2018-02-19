<?php
	//Written by Sam Thompson
	//Gets all the data from the equipment table for the chosen piece of equipment
	$make = $_POST['make'];
	$model = $_POST['model'];
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	echo json_encode($db->get_results("SELECT * FROM Equipment WHERE Make='$make' AND Model='$model' "));
	
?>

