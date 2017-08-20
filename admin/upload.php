<?php
   include("koneksi.php");
if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('mp4','flv','MP4','mkv');
			$name			= $_POST["nama"];
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1000044070){			
					move_uploaded_file($file_tmp, 'img/portfolio/fullsize/'.$nama);
					$query = mysql_query("insert into video(id_video,nama,nama_file,date_create) values('','$name','$nama',NULL)");
					if($query){
						echo "<script type='text/javascript'>alert('VIDEO BERHASIL DI UPLOAD');location='index.php';</script>";
					}else{
						echo "<script type='text/javascript'>alert('VIDEO GAGAL DI UPLOAD');location='index.php';</script>";
					}
				}else{
					echo "<script type='text/javascript'>alert('UKURAN FILE TERLALU BESAR');location='index.php';</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('EKSTENSI VIDEO TIDAK DIDUKUNG');location='index.php';</script>";
			}
		}
?>