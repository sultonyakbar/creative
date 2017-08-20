<!DOCTYPE html>
<?php
	session_start();   
   if(isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>

<html>
<head>
	<title>Sistem Keamanan dan Pemantauan Project FTTH</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"></link>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
</head>
<body>
	<div class="container">
		<img src="img/girl.png">
		<form action="home.php" method="post" name="form1">
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter Username" />
			</div>
			<div class="form-input">
				<input type="password" name="pass" placeholder="Enter Password" />
			</div>
			<input type="submit" name="submit" value="LOGIN" class="btn-login"><br>
			<a href="">Forget password?</a>
		</form>	
	</div>
	<div class="copyright">
		<p>Copyright &copy; 2017. Created by <a href="http://destimutia.net" target="_blank">Desti Mutia</a></p>
	</div>
</body>
</html>