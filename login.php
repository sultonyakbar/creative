<!DOCTYPE html>
<?php
include 'koneksi.php';
	session_start();   
   if(isset($_SESSION['login_user'])){
      header("location:admin/index.php");
   }
?>

<html>
<head>
	<title>Sistem Keamanan dan Pemantauan Project FTTH</title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<!--<link href="font-awesome.min.css" rel="stylesheet" type="text/css">-->
</head>
<body>
	<div class="container">
		<img src="img/girl.png">
		<form action="login_act.php" method="post" name="form1">
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter Username" />
			</div><br>
			<div class="form-input">
				<input type="password" name="pass" placeholder="Enter Password" />
			</div><br>
			<input type="submit" name="submit" value="LOGIN" class="btn-login"><br><br>
			<a href="regist.php">Daftar Akun ?</a>
		</form>	
	</div>
</body>
</html>