<?php
   include("koneksi.php");
$nama = $_POST["fullname"];
$username = $_POST["username"];
$pass = $_POST["pass"];
$level         		= "member";
$query = mysql_query("INSERT INTO user(id_user,nama_user, username, pass,level_user ) VALUES ('', '$nama', '$username', '$pass ', '$level')");
if($query) {
    echo "<script type='text/javascript'>alert('Registrasi user berhasil');location='index.html';</script>";
}
else {
    echo "<script type='text/javascript'>alert('Registrasi user gagal <br/> Pesan Error:  <?php. mysql_error($query);?>');location='';</script>";
	
	}
?>