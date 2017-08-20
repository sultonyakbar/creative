<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']);
      $sql = "SELECT id_user FROM user WHERE username = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
	  if (!$result) {
			printf("Error: %s\n", mysqli_error($db));
			exit();
		}
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: admin/index.php");
      }else {
		 echo "<script type='text/javascript'>alert('Username dan Password yang Anda masukkan salah');location='index.html';</script>";
      }
   }
?>