<?php
	# Created by Jon Nuttall
	# Returns a list of all Unsolved problems in JSON Form
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

    $db = new ezSQL_mysqli($username,$password,$dbName,$host);

	echo json_encode($db->get_results("SELECT * FROM `Problem` LEFT JOIN Solution ON Solution.ProbNum = Problem.ProblemNum WHERE Solution.ProbNum IS NULL"));
?>