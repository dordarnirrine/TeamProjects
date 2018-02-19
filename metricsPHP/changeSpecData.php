<?php
	//Written by Sam Thompson
	//Gets the problem type associated with the chosen specialist, along with everything rom the specialist table
	$chosenSpecialist = $_POST['chosenSpecialist'];
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	echo json_encode($db->get_results("SELECT ProbTypeSpec.ProbType, Specialist.*
									FROM ProbTypeSpec,Specialist 
									WHERE ProbTypeSpec.SpecID = Specialist.SpecilailistID 
									AND Specialist.name = '$chosenSpecialist'"));
?>



