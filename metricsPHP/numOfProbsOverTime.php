<?php
	$date = $_POST['date'];
	//echo $date;
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	
	$NumOfProblems = $db->get_var("SELECT COUNT(Problem.ProblemNum)
								   FROM Problem
								   WHERE Problem.StartDate < '$date' ");


	$NumOfSolutions = $db->get_var("SELECT COUNT(Solution.ProbNum)
								   FROM Solution
								   WHERE Solution.SolDate <= '$date'");


	$currentProblems = (int)$NumOfProblems - (int)$NumOfSolutions;

	echo $currentProblems.".".$date;

?>