<?php
/*Database connection settings*/

$host= 'localhost';
$user ='root';
$pass='5ant@C1aus';
$db='helpdesk';
$mysqli= new mysqli($host, $user, $pass,$db) or die($mysqli->error);
?>