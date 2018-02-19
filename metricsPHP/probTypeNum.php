<?php
	//Written by Sam Thompson
	//Gets the number of problems associated with each problem type
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	echo json_encode($db->get_results(" SELECT ProblemType.ProblemType As ProbType, COUNT(Problem.ProblemNum) AS ProbNumCount 
										FROM `ProblemType`, Problem
										WHERE Problem.ProbType = ProblemType.ProblemType
										GROUP BY ProblemType.ProblemType"));
?>