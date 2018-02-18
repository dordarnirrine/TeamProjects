<?php //This script is used to verify the login details the user has put in on the input page. It make sures not to handle the stored passwords in plain text. This Script was created by Jordan Irvine.

	$enteredUsername = $_POST["Username"];
    $myPassword = $_POST["Password"];//Retrieves the user entered data.

    include_once "/var/www/html/ezSQL-master/ezSQL-master/shared/ez_sql_core.php";
    include_once "/var/www/html/ezSQL-master/ezSQL-master/mysqli/ez_sql_mysqli.php";

    $username = 'root';
    $password = '5ant@C1aus';

    $host='localhost';
    $dbName='helpdesk';

    $db = new ezSQL_mysqli($username,$password,$dbName,$host);//Sets up communication with the mysql database

    $sql = json_encode($db->get_results("SELECT Hash, Position FROM Login WHERE id='$enteredUsername'"));//queries the database for the login with the entered username

    $sql = json_decode($sql, true);
    $hash = $sql[0]["Hash"];
    $job = $sql[0]["Position"];//Retrieves the hashed password and the job of the entered username

    if(password_verify ( $myPassword , $hash )){//Checks if entered password is the same as the hashed one 
        if($job == "Specialist"){//sends user to correct page once they're logged in
            header('Location:Spec.html');
        }
        else if($job == "Analyst"){
            header('Location:analyst.html');
        }
        else if($job == "HelpDesk"){
            header('Location:Opp.html');
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Username or Password Incorrect');</script>";//Gives error message if wrong password or username entered.

    }

  
   ?>