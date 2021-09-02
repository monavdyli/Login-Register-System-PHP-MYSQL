<?php 
require 'database.php';
session_start();
if (isset($_SESSION['sessionId'])) {
	// code...
	echo "You are logged in";
}
else {
	echo "Home";
}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project21</title>
</head>
<body>

</body>
</html>
