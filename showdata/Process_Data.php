<!DOCTYPE html>
<html>
  <body>
  

 
<?php
include_once 'database.php';
if(isset($_POST['save']))
{	 
	 $no= $_POST['no'];
	 $first_name = $_POST['first_name'];
	 $last_name = $_POST['last_name'];
	 $date_of_birth = $_POST['date_of_birth'];
	 $city_name = $_POST['city_name'];
	 $email = $_POST['email'];
	 $contact_number= $_POST['contact_number'];
	 
	 $sql = "INSERT INTO info (no,first_name,last_name,date_of_birth,city_name,email,contact_number)
	 VALUES ('$no','$first_name','$last_name','$date_of_birth','$city_name','$email','$contact_number')";
	 
	 if (mysqli_query($conn, $sql)) {
		echo "New record data created successfully !";
		
	 } else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
	<form method="post" action="ShowDataWithTable.php">
	<input type="submit" name="submit" value="Show Data">
	
	</form>
	
 </body>
</html>