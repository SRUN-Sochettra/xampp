<?php
	session_start();
	
	// Check if user is already logged in
	if(isset($_SESSION['loggedIn'])){
		header('Location: index.php');
		exit();
	}
	
	require_once('inc/config/constants.php');
	require_once('inc/config/db.php');
	require_once('inc/header.html');
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
  </head>
  <style>
	body{
		background-image: url(./bg/login-Bg.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
		height: 80vh;
	}
	.card{
		background: rgba(255, 255, 255, 0.3);
    	backdrop-filter: blur(10px);
		font-weight: bold;
		margin-top: 50px;
	}
	.a-log{
		text-decoration: none;
		color: wheat;
	}
	.a-log:hover{
		color: blue;
	}
  </style>
  <body>
	
<?php
// Variable to store the action (login, register, passwordReset)
$action = '';
	if(isset($_GET['action'])){
		$action = $_GET['action'];
		if($action == 'register'){
?>
			<div class="container">
			  <div class="row justify-content-center">
			  <div class="col-sm-12 col-md-8 col-lg-6">
				<div class="card">
				  <div class="card-header">
					ចុះឈ្មោះ
				  </div>
				  <div class="card-body">
					<form action="">
					<div id="registerMessage"></div>
					  <div class="form-group">
						<label for="registerFullName">ឈ្មោះ<span class="requiredIcon">*</span></label>
						<input type="text" class="form-control" id="registerFullName" name="registerFullName">
						<!-- <small id="emailHelp" class="form-text text-muted"></small> -->
					  </div>
					   <div class="form-group">
						<label for="registerUsername">ឈ្មោះអ្នកប្រើ<span class="requiredIcon">*</span></label>
						<input type="email" class="form-control" id="registerUsername" name="registerUsername" autocomplete="on">
					  </div>
					  <div class="form-group">
						<label for="registerPassword1">ពាក្យសម្ងាត់<span class="requiredIcon">*</span></label>
						<input type="password" class="form-control" id="registerPassword1" name="registerPassword1">
					  </div>
					  <div class="form-group">
						<label for="registerPassword2">បញ្ចូលពាក្យសម្ងាត់ម្តងទៀត<span class="requiredIcon">*</span></label>
						<input type="password" class="form-control" id="registerPassword2" name="registerPassword2">
					  </div>
					  <div class="d-flex justify-content-center">
						<a href="login.php" class="btn btn-outline-primary mr-2">ចូលគណនី</a>
					    <button type="button" id="register" class="btn btn-outline-success mr-2">ចុះឈ្មោះ</button>
					    <a href="login.php?action=resetPassword" class="btn btn-outline-warning mr-2">ប្ដូរពាក្យសម្ងាត់</a>
					    <button type="reset" class="btn btn-outline-dark mr-2">លុបចេញ</button>
					  </div>
					</form>
				  </div>
				</div>
				</div>
			  </div>
			</div>
<?php
			require 'inc/footer.php';
			echo '</body></html>';
			exit();
		} elseif($action == 'resetPassword'){
?>
			<div class="container">
			  <div class="row justify-content-center">
			  <div class="col-sm-12 col-md-8 col-lg-6">
				<div class="card">
				  <div class="card-header">
					ប្ដូរពាក្យសម្ងាត់
				  </div>
				  <div class="card-body">
					<form action="">
					<div id="resetPasswordMessage"></div>
					  <div class="form-group">
						<label for="resetPasswordUsername">ឈ្មោះអ្នកប្រើ</label>
						<input type="text" class="form-control" id="resetPasswordUsername" name="resetPasswordUsername">
					  </div>
					  <div class="form-group">
						<label for="resetPasswordPassword1">ពាក្យសម្ងាត់ថ្មី</label>
						<input type="password" class="form-control" id="resetPasswordPassword1" name="resetPasswordPassword1">
					  </div>
					  <div class="form-group">
						<label for="resetPasswordPassword2">បញ្ចូលពាក្យសម្ងាត់ថ្មីម្តងទៀត</label>
						<input type="password" class="form-control" id="resetPasswordPassword2" name="resetPasswordPassword2">
					  </div>
					  <div class="d-flex justify-content-center">
						<a href="login.php" class="btn btn-outline-primary mr-2">ចូលគណនី</a>
					  	<a href="login.php?action=register" class="btn btn-outline-success mr-2">ចុះឈ្មោះ</a>
					  	<button type="button" id="resetPasswordButton" class="btn btn-outline-warning mr-2">ប្ដូរពាក្យសម្ងាត់</button>
					  	<button type="reset" class="btn btn-outline-dark mr-2">លុបចេញ</button>
					  </div>
					</form>
				  </div>
				</div>
				</div>
			  </div>
			</div>
<?php
			require 'inc/footer.php';
			echo '</body></html>';
			exit();
		}
	}	
?>
	<!-- Default Page Content (login form) -->
    <div class="container">
      <div class="row justify-content-center">
	  <div class="col-sm-12 col-md-8 col-lg-6">
		<div class="card">
		  <div class="card-header">
			ចូលគណនី
		  </div>
		  <div class="card-body">
			<form action="">
			<div id="loginMessage"></div>
			  <div class="form-group">
				<label for="loginUsername">ឈ្មោះអ្នកប្រើ</label>
				<input type="text" class="form-control" id="loginUsername" name="loginUsername">
			  </div>
			  <div class="form-group">
				<label for="loginPassword">ពាក្យសម្ងាត់</label>
				<input type="password" class="form-control" id="loginPassword" name="loginPassword">
			  </div>
			  <div class="d-flex justify-content-center">
				<button type="button" id="login" class="btn btn-outline-primary mr-2">ចូលគណនី</button>
			  	<a href="login.php?action=register" class="btn btn-outline-success mr-2">ចុះឈ្មោះ</a>
			  	<a href="login.php?action=resetPassword" class="btn btn-outline-warning mr-2">ប្ដូរពាក្យសម្ងាត់</a>
			  	<button type="reset" class="btn btn-outline-dark mr-2">លុបចេញ</button>
			  </div>
			</form>
		  </div>
		</div>
		</div>
      </div>
    </div>
<?php
	require 'inc/footer.php';
?>
  </body>
  </html>
