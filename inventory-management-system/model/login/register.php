<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$registerFullName = '';
	$registerUsername = '';
	$registerPassword1 = '';
	$registerPassword2 = '';
	$hashedPassword = '';
	
	if(isset($_POST['registerUsername'])){
		$registerFullName = htmlentities($_POST['registerFullName']);
		$registerUsername = htmlentities($_POST['registerUsername']);
		$registerPassword1 = htmlentities($_POST['registerPassword1']);
		$registerPassword2 = htmlentities($_POST['registerPassword2']);
		
		if(!empty($registerFullName) && !empty($registerUsername) && !empty($registerPassword1) && !empty($registerPassword2)){
			
			// Sanitize name
			$registerFullName = filter_var($registerFullName, FILTER_SANITIZE_STRING);
			
			// Check if name is empty
			if($registerFullName == ''){
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>សូមបញ្ចូលឈ្មោះរបស់អ្នក</div>';
				exit();
			}
			
			// Check if username is empty
			if($registerUsername == ''){
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>សូមបញ្ចូលឈ្មោះអ្នកប្រើ</div>';
				exit();
			}
			
			// Check if both passwords are empty
			if($registerPassword1 == '' || $registerPassword2 == ''){
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>សូមបញ្ចូលពាក្យសម្ងាត់ទាំងពីរ</div>';
				exit();
			}
			
			// Check if username is available
			$usernameCheckingSql = 'SELECT * FROM user WHERE username = :username';
			$usernameCheckingStatement = $conn->prepare($usernameCheckingSql);
			$usernameCheckingStatement->execute(['username' => $registerUsername]);
			
			if($usernameCheckingStatement->rowCount() > 0){
				// Username already exists. Hence can't create a new user
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>ឈ្មោះអ្នកប្រើនេះមិនអាចប្រើបានទេ។ សូមជ្រើសរើសឈ្មោះអ្នកប្រើផ្សេងទៀត</div>';
				exit();
			} else {
				// Check if passwords are equal
				if($registerPassword1 !== $registerPassword2){
					echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>ពាក្យសម្ងាត់មិនត្រូវគ្នា</div>';
					exit();
				} else {
					// Start inserting user to DB
					// Encrypt the password
					$hashedPassword = md5($registerPassword1);
					$insertUserSql = 'INSERT INTO user(fullName, username, password) VALUES(:fullName, :username, :password)';
					$insertUserStatement = $conn->prepare($insertUserSql);
					$insertUserStatement->execute(['fullName' => $registerFullName, 'username' => $registerUsername, 'password' => $hashedPassword]);
					
					echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>ការចុះឈ្មោះបានបញ្ចប់ដោយជោគជ័យ</div>';
					exit();
				}
			}
		} else {
			// One or more mandatory fields are empty. Therefore, display a the error message
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>សូមបញ្ចូលទិន្នន័យទាំងអស់ដែលមានសញ្ញា (*)</div>';
			exit();
		}
	}
?>