<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM info");
?>


<!DOCTYPE html>
<html>
<body>
 <style>
.myDiv_showing {
  border: 2px outset red;
  background-color: #DC7633;
  text-align: center;
}
</style>
 <h1>Show Your data</h1>

<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="myDiv_showing">
  <table>

  <tr>
	<td>No.</td>
    <td>First Name</td>
    <td>Last Name</td>
	<td>Date of Birth</td>
    <td>City Name</td>
    <td>Email id</td>
	<td>Contact_number</td>
  </tr>

<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
	<td><?php echo $row["no"]; ?></td>
    <td><?php echo $row["first_name"]; ?></td>
    <td><?php echo $row["last_name"]; ?></td>
	<td><?php echo $row["date_of_birth"]; ?></td>
    <td><?php echo $row["city_name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["contact_number"]; ?></td>
	
</tr>
<?php
$i++;
}
?>
</table>
</div>
 <?php
}
else{
    echo "No result found";
}
?>

	
	<form method="post" action="Login.php">
	<input type="submit" name="submit" value="Back to User Login form">
	
	</form>
 </body>
</html>
