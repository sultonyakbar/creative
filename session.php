<?php
   //include('config.php');
   // isi nama host, username mysql, dan password mysql anda
	mysql_connect("localhost","root","");
	 
	// isikan dengan nama database yang akan di hubungkan
	mysql_select_db("creative");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysql_query("select * from user where username = '$user_check' ");
   
   $row = mysql_fetch_array($ses_sql);
   $nama_user = $row['nama_user'];
   $login_session = $row['username'];
   //$id_session =$row['id_user'];
   $level_session = $row['level_user'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:../index.php");
   }
?>