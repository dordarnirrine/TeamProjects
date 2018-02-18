<?php
	$date = $_POST['date'];
	$software = $_POST['software'];
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);


	$NumOfProblems = $db->get_var("SELECT COUNT(Problem.ProblemNum)
								   FROM Problem, SoftwareProblem, Software
								   WHERE Problem.StartDate < '$date' 
								   AND Software.License = SoftwareProblem.License
								   AND SoftwareProblem.ProbNum = Problem.ProblemNum
								   AND Software.Name = '$software'");


	$NumOfSolutions = $db->get_var("SELECT COUNT(Solution.ProbNum)
								   FROM Solution, SoftwareProblem, Software
								   WHERE Solution.SolDate <= '$date'
								   AND Software.License = SoftwareProblem.License
								   AND SoftwareProblem.ProbNum = Solution.ProbNum
								   AND Software.Name = '$software' ");


	$currentProblems = (int)$NumOfProblems - (int)$NumOfSolutions;

	echo $currentProblems.".".$date;
?>