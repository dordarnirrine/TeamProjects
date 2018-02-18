<?php

    var_dump($_POST);

    $id = $_POST["id"]; # Ticket ID
    $caller = $_POST["callername"]; # Caller Name
    $desc = $_POST["desc"]; # Problem Description
    $callback = $_POST["callback"]; # Callback Reason
    $callbacknumber = $_POST["callbacknum"];
    $type = $_POST["type"]; # Problem Type
    $spec = $_POST["spec"]; # Specialist Assigned: 'None' if none is assigned
    $solution = $_POST["solution"]; # Solution to the problem
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

    $db = new ezSQL_mysqli($username,$password,$dbName,$host);

    if ($type == "Software"){
        // Update Into `Software Problems` `Problem`
    }
    elseif($type == "Hardware"){
        // Update into `Equipment` `Problem`
    }
    else{
        // Update into `Problem`
    }

        // Update Callback into `Telephone Call`
       

    if ($spec != "None"){
         // Update into `SpecProb` if a Specialist is needed
    }

    if ($solution != ""){
        // Insert into Solution
    }
        

    // Then redirect to View Tickets
?>