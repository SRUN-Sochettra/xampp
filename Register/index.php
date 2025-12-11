<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Your information</title>
</head>
<body>
	
	<a href="logout.php">Logout</a>
	<h2>This is the user's successful login page</h2>

	<br>
	Hey, <?php echo $user_data['user_name'];?><br><br>
	Well done!<br><br>
	
	<h3>Here's your image:</h3>
    <img src="sokoeun.jpg" alt="A nice image"><br><br>
	
	<img src="https://sgs.num.edu.kh/wp-content/uploads/2024/06/JPEG-Master-1-1-scaled.jpg"><br><br>
	
	
</body>
</html>