<?php
	# Created by Jon Nuttall
	# Returns a list of all Specialists and associated info in JSON Form
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);
	//SELECT * FROM `ProbTypeSpec` INNER JOIN Specialist ON Specialist.SpecilailistID = ProbTypeSpec.SpecID
	$res = (json_encode($db->get_results("SELECT * FROM Specialist")));
	$res = json_decode($res, true); // Grab data from the initial table
	
	$cache = array(); // Create a cache array to return new data later
	for($i=0; $i < count($res); $i++){
		$spec = $res[$i]; // shorthand var name
		$types = ($db->get_results("SELECT * FROM ProbTypeSpec WHERE SpecID = " . $spec["SpecilailistID"])); 
		$arr = array(); // Grab the associated types for each specialist
		foreach($types as $type){
			$type = json_decode(json_encode($type), True); // Iterate over new types and push them into $arr to cache
			array_push($arr, $type["ProbType"]);
		}
		$spec["Types"] = $arr; // Store cache on object before pushing to cache outside the loop
		array_push($cache, $spec);
	}

	echo json_encode($cache, true); // Return the merged data in cache

?>