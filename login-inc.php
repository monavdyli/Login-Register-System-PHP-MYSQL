<?php 
	require 'database.php';
	$username = $_POST['username'];
	$password = $_POST['password'];

if (isset($_POST['submit'])) {
	// check login info
	if (empty($username) || empty($password)) {
		header("location: ../index.php?error=EmptyFields");
		exit;
	}
	else {
		$sql = "SELECT * FROM users WHERE username = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			// if sql smtp not working then redirect with an error
			header("location: ../index.php?error=sqlerror");
		    exit;
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				// check results
				$passcheck = password_verify($password, $row['password']);
				if ($passcheck == false) {
					// if info dont match then redirect with an error
					header("location: ../index.php?error=errorcreditnails");
		            exit;
				}
				elseif ($passcheck == true) {
					session_start();
					$_SESSION['sessionId'] = $row['id'];
					$_SESSION[' '] = $row['username'];
					header("location: ../index.php?success=logedin");
		            exit;
				}
				else {
					header("location: ../index.php?error=errorcreditnails");
		            exit;
				}
			}
			else {
				header("location: ../index.php?error=nouser");
		        exit;
			}
		}
	}
} else {
	header("location: ../index.php?error=accessforbidden");
	exit;
}
?>