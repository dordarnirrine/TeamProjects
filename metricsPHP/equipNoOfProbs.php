<?php
	$Make = $_POST['make'];
	$Model = $_POST['model'];

	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	$problems = $db->get_var("SELECT COUNT(*) AS total
										FROM Equipment, Problem, EquipmentProblem
										WHERE Equipment.SerialNo = EquipmentProblem.SerialNo
										AND Problem.ProblemNum = EquipmentProblem.ProbNum
										AND Equipment.Make = '$Make'
										AND Equipment.Model = '$Model' ");

	$solutions = $db->get_var("SELECT COUNT(*) AS soluNo
								FROM Equipment, EquipmentProblem, Solution 
								WHERE EquipmentProblem.ProbNum = Solution.ProbNum
								AND Equipment.SerialNo = EquipmentProblem.SerialNo
								AND Equipment.Make = '$Make'
								AND Equipment.Model = '$Model'");
	echo (int)$problems - (int)$solutions;
?>



