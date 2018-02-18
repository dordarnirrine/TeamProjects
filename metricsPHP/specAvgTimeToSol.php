<?php
	$chosenSpecialist = $_POST['chosenSpecialist'];

	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	
	echo json_encode($db->get_results("SELECT AVG(
									 	(SELECT DATEDIFF(
									 		(SELECT Solution.SolDate 
											 FROM Solution, Problem, Specialist, SpecProb 
											 WHERE Solution.ProbNum = Problem.ProblemNum 
											 AND SpecProb.ProbNum = Problem.ProblemNum 
											 AND SpecProb.SpecialistID = Specialist.SpecilailistID 
											 AND Specialist.Name = '$chosenSpecialist'), 
											(SELECT Problem.StartDate 
											 FROM Solution, Problem, Specialist, SpecProb 
											 WHERE Solution.ProbNum = Problem.ProblemNum 
											 AND SpecProb.ProbNum = Problem.ProblemNum 
											 AND SpecProb.SpecialistID = Specialist.SpecilailistID 
											 AND Specialist.Name = '$chosenSpecialist')
										) AS DateDiff)) 
									   AS AVERAGE"));
	
?>



