<?php
	$date = $_POST['date'];
	$make = $_POST['make'];
	$model = $_POST['model'];
	//echo $date;
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);


	$NumOfProblems = $db->get_var("SELECT COUNT(Problem.ProblemNum)
								   FROM Problem, EquipmentProblem, Equipment
								   WHERE Problem.StartDate < '$date' 
								   AND Equipment.SerialNo = EquipmentProblem.SerialNo
								   AND EquipmentProblem.ProbNum = Problem.ProblemNum
								   AND Equipment.Make = '$make'
								   AND Equipment.Model = '$model' ");


	$NumOfSolutions = $db->get_var("SELECT COUNT(Solution.ProbNum)
								   FROM Solution, EquipmentProblem, Equipment
								   WHERE Solution.SolDate <= '$date'
								   AND Equipment.SerialNo = EquipmentProblem.SerialNo
								   AND EquipmentProblem.ProbNum = Solution.ProbNum
								   AND Equipment.Make = '$make'
								   AND Equipment.Model = '$model' ");


	$currentProblems = (int)$NumOfProblems - (int)$NumOfSolutions;

	echo $currentProblems.".".$date;


?>