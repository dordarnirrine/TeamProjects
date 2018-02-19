<?php

    var_dump($_POST);

    $id = $_POST["id"]; # Ticket ID
    $caller = $_POST["caller"]; # Caller Name
    $desc = $_POST["desc"]; # Problem Description
    $callback = $_POST["callback"]; # Callback Reason
    $callbacknumber = $_POST["callbacknum"];
    $type = $_POST["type"]; # Problem Type
    $stype = $_POST["stype"]; # Specific Software Problem
    $htype = $_POST["htype"]; # Specific Hardware Problem
    $spec = $_POST["spec"]; # Specialist Assigned: 'None' if none is assigned
	
	include_once "metricsPHP/ezSQL-master/shared/ez_sql_core.php";
	include_once "metricsPHP/ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

    $db = new ezSQL_mysqli($username,$password,$dbName,$host);

    if ($type == "Software"){
        $db->query("INSERT INTO `SoftwareProblem` (License, ProbNum) VALUES(
            '" . substr($stype, 0, 1) . "',
            '" . $id . "')");
        // Insert Into `Software Problems` as well as `Problem`
    }
    if($type == "Hardware"){
        $db->query("INSERT INTO `EquipmentProblem` (SerialNo, ProbNum) VALUES(
            '" . substr($htype, 0, 1) . "',
            '" . $id . "')");
        // Insert into `Equipment` `Problem`
    }
        $db->query("INSERT INTO `Problem` VALUES (
            '" . $id . "',
            '" . $db->escape($desc) . "',
            '" . date('Y-m-d') . "',
            '" . date("H:i:s") . "',
            '" . $type . "')");
        // Insert into `Problem`

    if (isset($callback) && isset($callbacknumber)){
        $db->query("INSERT INTO `TelephoneCall` (CallNumber, TimeOfCall, NameOfCaller, CallBackReason, StaffID, OperatorName) VALUES ('" . $callbacknumber . "', 
            '" . date("H:i:s", time() + 60 * 60) . "',
            '" . $caller . "', 
            '" . $callback . "',
            '2', 'Alice')");
        // Insert Callback into `Telephone Call`
    }
       

    if ($spec != "None"){
         // Insert into `ProbSpec` if a Specialist is needed
        $db->query("INSERT INTO `SpecProb` (SpecialistID, ProbNum) VALUES ('" . substr($spec, 1, 1) . "', '" . $id . "')");
    }


    // Then redirect to View Tickets
?>