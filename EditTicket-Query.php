<?php

    $id = $_POST["id"]; # Ticket ID
    $caller = $_POST["callername"]; # Caller Name
    $desc = $_POST["desc"]; # Problem Description
    $callback = $_POST["callback"]; # Callback Reason
    $callbacknumber = $_POST["callbacknum"];
    $spec = $_POST["spec"]; # Specialist Assigned: 'None' if none is assigned
    $solution = $_POST["solution"]; # Solution to the problem
	
	include_once "metricsPHP/ezSQL-master/shared/ez_sql_core.php";
    include_once "metricsPHP/ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

    $db = new ezSQL_mysqli($username,$password,$dbName,$host);

        // Update into `Problem`
        $db->query("UPDATE `Problem` SET ProbDesc='" . $db->escape($desc) . "' WHERE ProblemNum='" . $id . "'");

        // Update Callback into `Telephone Call`
        $db->query("UPDATE `TelephoneCall` SET NameOfCaller='" . $caller . "', CallBackReason='" . $callback . "' WHERE CallNumber='" . $callbacknumber . "'");
       

    if ($spec != "None"){
         // Update into `SpecProb` if a Specialist is needed
        $db->query("UPDATE `SpecProb` SET SpecialistID='" . substr($spec, 1, 1) . "' WHERE ProbNum='" . $id . "'");
    }

    if ($solution != ""){
        // Insert into Solution
        $db->query("INSERT INTO `Solution` VALUES('" . $id . "', '" . date("Y-m-d") . "', '" . date("H:i:s") . "', '" . $db->escape($solution) . "')");
    }
        
    Header("Location: ViewTickets.php");
    // Then redirect to View Tickets
?>