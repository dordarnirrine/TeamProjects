<?php
	$chosenSpecialist = $_POST['chosenSpecialist'];
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	echo json_encode($db->get_results("SELECT COUNT(*) AS total
										FROM Specialist, Problem, SpecProb
										WHERE Specialist.SpecilailistID = SpecProb.SpecialistID
										AND Problem.ProblemNum = SpecProb.ProbNum
										AND Specialist.Name = '$chosenSpecialist' "));
?>



