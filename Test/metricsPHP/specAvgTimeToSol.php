<?php
	$chosenSpecialist = $_POST['chosenSpecialist'];

	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

	$db = new ezSQL_mysqli($username,$password,$dbName,$host);

	$solDates= json_encode($db->get_results("SELECT Solution.SolDate 
											 FROM Solution, Problem, Specialist, SpecProb 
											 WHERE Solution.ProbNum = Problem.ProblemNum 
											 AND SpecProb.ProbNum = Problem.ProblemNum 
											 AND SpecProb.SpecialistID = Specialist.SpecilailistID 
											 AND Specialist.Name = '$chosenSpecialist' "));

	$startDates = json_encode($db->get_results("SELECT Problem.StartDate 
											 FROM Solution, Problem, Specialist, SpecProb 
											 WHERE Solution.ProbNum = Problem.ProblemNum 
											 AND SpecProb.ProbNum = Problem.ProblemNum 
											 AND SpecProb.SpecialistID = Specialist.SpecilailistID 
											 AND Specialist.Name = '$chosenSpecialist'"));
	
	

	$solDates = json_decode($solDates);
	$startDates = json_decode($startDates);

	$timeDifference = array();

	for($i=0; $i<count($solDates); $i++){
		$diff = abs(strtotime($solDates[$i]->SolDate) - strtotime($startDates[$i]->StartDate));

		$time = $diff/(60*60*24);
		array_push($timeDifference,$time);
	}

	if(count($timeDifference)==0){
		echo 0;
	} else {
		$average = array_sum($timeDifference)/count($timeDifference);
		echo $average;
	}
	
	
?>



