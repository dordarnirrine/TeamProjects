<?php
	//Written by Sam Thompson
	//Gets the number of problems the chosen specialist is currently working on
	$chosenSpecialist = $_POST['chosenSpecialist'];
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	$NumOfProblems = $db->get_var("SELECT COUNT(Problem.ProblemNum)
								   FROM Problem, SpecProb, Specialist
								   WHERE Specialist.SpecilailistID = SpecProb.SpecialistID
								   AND SpecProb.ProbNum = Problem.ProblemNum
								   AND Specialist.Name = '$chosenSpecialist' ");


	$NumOfSolutions = $db->get_var("SELECT COUNT(Solution.ProbNum)
								   FROM Solution, SpecProb, Specialist
								   WHERE Specialist.SpecilailistID = SpecProb.SpecialistID
								   AND SpecProb.ProbNum = Solution.ProbNum
								   AND Specialist.Name = '$chosenSpecialist' ");


	$currentProblems = (int)$NumOfProblems - (int)$NumOfSolutions;

	echo $currentProblems;
?>