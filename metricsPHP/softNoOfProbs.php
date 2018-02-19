<?php
	//Written by Sam Thompson
	//Gets the number of problems associated with the piece of software chosen by the specialist
	$chosenSoftware = $_POST['chosenSoftware'];

	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	$probnums = $db->get_var("SELECT COUNT(*) AS total
										FROM Software, Problem, SoftwareProblem
										WHERE Software.License = SoftwareProblem.License
										AND Problem.ProblemNum = SoftwareProblem.ProbNum
										AND Software.Name = '$chosenSoftware'  ");

	$solNums = $db->get_var("SELECT COUNT(*) AS soluNo
								FROM Software, SoftwareProblem, Solution 
								WHERE SoftwareProblem.ProbNum = Solution.ProbNum
								AND Software.License = SoftwareProblem.License
								AND Software.Name = '$chosenSoftware'");

	echo (int)$probnums - (int)$solNums;
?>



