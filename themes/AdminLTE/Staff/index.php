<?php
		session_start();
		if(!isset($_SESSION['login'])) {
			header("location: ../../formLogin.php");
		}
 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <?php echo "ยินดีต้อนรับคุณ". $_SESSION['login']['name']; ?>
 <br>
 <a href="../../logout.php">ออกจากระบบ</a>
</body>
</html>