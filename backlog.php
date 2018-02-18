<?php
	//$date = $_POST['date'];
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	$NumOfProblems = $db->get_var("SELECT COUNT(*) FROM Problem");
	$NumOfSolutions = $db->get_var("SELECT COUNT(*) FROM Solution");
	echo (int)$NumOfProblems - (int)$NumOfSolutions;
	
?>

