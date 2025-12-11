
<?php
$hostname="127.0.0.1:3307";
$username="root";
$password="";
$dbname = "db_adt44";
$conn=new mysqli($hostname,$username,$password,$dbname);

if(!$conn){
   die("Could not Connect My Sql:" .mysql_error());
}

/*
if($connect_error){
   die("Could not Connect My Sql:" .$conn->connect_error());
}*/
?>