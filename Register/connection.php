<?php

$dbhost = "localhost:8080";
$dbuser = "root";
$dbpass = "";
$dbname = "login_form";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
