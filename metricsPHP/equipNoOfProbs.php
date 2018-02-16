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

	echo json_encode($db->get_results("SELECT COUNT(*) AS total
										FROM Equipment, Problem, EquipmentProblem
										WHERE Equipment.SerialNo = EquipmentProblem.SerialNo
										AND Problem.ProblemNum = EquipmentProblem.ProbNum
										AND Equipment.Make = '$Make'
										AND Equipment.Model = '$Model' "));
?>



