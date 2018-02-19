<?php
	//Written by Sam Thompson
	//Gets the number of problems the chosen specialist is working on before the date passed to php
	$date = $_POST['date'];
	$specialist = $_POST['specialist'];
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	$NumOfProblems = $db->get_var("SELECT COUNT(Problem.ProblemNum)
								   FROM Problem, SpecProb, Specialist
								   WHERE Problem.StartDate < '$date' 
								   AND Specialist.SpecilailistID = SpecProb.SpecialistID
								   AND SpecProb.ProbNum = Problem.ProblemNum
								   AND Specialist.Name = '$specialist' ");


	$NumOfSolutions = $db->get_var("SELECT COUNT(Solution.ProbNum)
								   FROM Solution, SpecProb, Specialist
								   WHERE Solution.SolDate <= '$date'
								   AND Specialist.SpecilailistID = SpecProb.SpecialistID
								   AND SpecProb.ProbNum = Solution.ProbNum
								   AND Specialist.Name = '$specialist' ");

	//var_dump($NumOfProblems."-".$NumOfSolutions);

	$currentProblems = (int)$NumOfProblems - (int)$NumOfSolutions;

	echo $currentProblems.".".$date;
?>