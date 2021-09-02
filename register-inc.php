<?php 

if (isset($_POST['submit'])){
	//add database connection
	require 'database.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$confirmPass = $_POST['confirmPassword'];

	if (empty($username) || empty($password) || empty($email) || empty($confirmPass)) {
		// check if there is any empty field...
		header("location: ../register.php?error=EmptyFields");
		exit;

	}
	elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
		// check if there is any strange username...
		header("location: ../register.php?error=Invalidusername");
		exit;
	}
	elseif ($password !== $confirmPass) {
		// check if the password dont match...
		header("location: ../register.php?error=Passwordmismatch");
		exit;
	}
	else {
		$sql = "SELECT username FROM users WHERE username = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../register.php?error=contactdeveloper");
		    exit;
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$rowcount = mysqli_stmt_num_rows($stmt);

			if ($rowcount > 0) {
				// code...
				header("location: ../register.php?error=usernametaken");
		        exit;

			}
			else {
				$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../register.php?error=contactdeveloper");
		    exit;
		}
		else {

			$hashedPass = password_hash($password, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPass);
			mysqli_stmt_execute($stmt);
			header("location: ../register.php?success=registered");
		    exit;
		}

			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($stmt);

	
}

 ?>