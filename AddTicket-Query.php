<?php

    var_dump($_POST);

    $id = $_POST["id"]; # Ticket ID
    $caller = $_POST["caller"]; # Caller Name
    $desc = $_POST["desc"]; # Problem Description
    $callback = $_POST["callback"]; # Callback Reason
    $callbacknumber = $_POST["callbacknum"];
    $type = $_POST["type"]; # Problem Type
    $spec = $_POST["spec"]; # Specialist Assigned: 'None' if none is assigned
	
	include_once "ezSQL-master/shared/ez_sql_core.php";
	include_once "ezSQL-master/mysqli/ez_sql_mysqli.php";

	$username = 'root';
	$password = '5ant@C1aus';

	$host='localhost';
	$dbName='helpdesk';

    $db = new ezSQL_mysqli($username,$password,$dbName,$host);

    if ($type == "Software"){
        // Insert Into `Software Problems` as well as `Problem`
    }
    elseif($type == "Hardware"){
        // Insert into `Equipment` `Problem`
    }
    else{
        // Insert into `Problem`
    }

        // Insert Callback into `Telephone Call`
       

    if ($spec != "None"){
         // Insert into `ProbSpec` if a Specialist is needed
    }

    // Then redirect to View Tickets
?>