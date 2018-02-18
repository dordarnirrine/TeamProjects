<?php
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);
	//SELECT * FROM `ProbTypeSpec` INNER JOIN Specialist ON Specialist.SpecilailistID = ProbTypeSpec.SpecID
	$res = (json_encode($db->get_results("SELECT * FROM Specialist")));
	$res = json_decode($res, true);
	
	$cache = array();
	for($i=0; $i < count($res); $i++){
		$spec = $res[$i];
		$types = ($db->get_results("SELECT * FROM ProbTypeSpec WHERE SpecID = " . $spec["SpecilailistID"]));
		$arr = array();
		foreach($types as $type){
			$type = json_decode(json_encode($type), True);
			array_push($arr, $type["ProbType"]);
		}
		$spec["Types"] = $arr;
		array_push($cache, $spec);
	}

	echo json_encode($cache, true);

?>