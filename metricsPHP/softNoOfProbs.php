<?php
	$chosenSoftware = $_POST['chosenSoftware'];

	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	echo json_encode($db->get_results("SELECT COUNT(*) AS total
										FROM Software, Problem, SoftwareProblem
										WHERE Software.License = SoftwareProblem.License
										AND Problem.ProblemNum = SoftwareProblem.ProbNum
										AND Software.Name = '$chosenSoftware'  "));
?>



