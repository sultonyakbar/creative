<?php
   include('../session.php');
require 'config.php';

// Menyisipkan file functions.php agar function yang kita buat dapat dipakai dihalaman ini
require 'functions.php';

/**
 * Test
 * echo ip_user();
 * echo "<br/>";
 * echo browser_user();
 * echo "<br/>";
 * echo os_user();
 */

// rekam data user yang sudah mengakses website kita
$ip      = ip_user();
$browser = browser_user();
$os      = os_user();

// Check bila sebelumnya data pengunjung sudah terrekam
if($level_session == "member"){
if (!isset($_COOKIE['VISITOR'])) {

    // Masa akan direkam kembali
    // Tujuan untuk menghindari merekam pengunjung yang sama dihari yang sama.
    // Cookie akan disimpan selama 24 jam
    $duration = time()+60*60*24;

    // simpan kedalam cookie browser
    setcookie('VISITOR',$browser,$duration);

    // SQL Command atau perintah SQL INSERT
    $sql = "INSERT INTO statistik (user, ip, os, browser) VALUES ('$nama_user','$ip', '$os', '$browser')";

    // variabel { $db } adalah perwakilan dari koneksi database lihat config.php
    $query = $db->query($sql);
}
}


?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Video Streaming - Broadband Multimedia</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
	<script src="http://malsup.github.com/jquery.form.js"></script> 
    <script> 
        $(document).ready(function() { 

         var progressbar     = $('.progress-bar');

            $(".login-button").click(function(){
            	$(".form-horizontal").ajaxForm(
		{
		  target: '.preview',
		  beforeSend: function() {
			$(".progress").css("display","block");
			progressbar.width('0%');
			progressbar.text('0%');
                    },
		    uploadProgress: function (event, position, total, percentComplete) {
		        progressbar.width(percentComplete + '%');
		        progressbar.text(percentComplete + '%');
		     },
		})
		.submit();
            });

        }); 
    </script>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <a class="navbar-brand" href="#page-top"><img src="../img/portfolio/fullsize/bm.png"/></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#portfolio">Video</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
		  <?php
						if($level_session == "admin"){?>
		  <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#myModal">Statistik</a>
          </li>
		  <?php } ?>
		  <li class="nav-item">
            <a class="nav-link" href="../logout.php"> Logout</a>
          </li>
		  
        </ul>
      </div>
    </nav>
	<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Statistik</h4>
                </div>
                <!-- body modal -->
				<?php

				$sql = "SELECT * FROM statistik ORDER BY date_create DESC";
				$query = $db->query($sql);

				?>
                <div class="modal-body">
                    <table border="1" width="468px">
						<tr>
							<td>NO</td>
							<td width="30%">IP</td>
							<td width="25%">Browser</td>
							<td width="25%">OS</td>
							<td width="20%">Date</td>
						</tr>
						<?php
						$i=1;
						while ($row=$query->fetch_assoc()) {
						?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $row['ip'];?></td>
								<td><?php echo $row['browser'];?></td>
								<td><?php echo $row['os'];?></td>
								<td><?php echo $row['date_create'];?></td>
							</tr>
						<?php } ?>
					</table>
                </div>
            </div>
        </div>
    </div>
	<div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <div class="modal-body">
                    <form action="upload.php" method="POST" name="form1" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your File Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" name="nama"  placeholder="Enter your File Name"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="file" class="form-control" name="file" id="userImage"  placeholder="Choose Your File"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="submit" class="btn btn-primary btn-lg btn-block login-button" name="upload" value="Upload" id="name"  placeholder="Upload Your File"/>
								</div>
							</div>
						</div>
						<div id="progress-div"><div id="progress-bar"></div></div>
							<div id="targetLayer"></div>
					</form>
					<div id="loader-icon" style="display:none;"><img src="img/portfolio/fullsize/LoaderIcon.gif" /></div>	
                </div>
            </div>
        </div>
    </div>
    <header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">Analisa Performansi Jaringan WLAN IEEE 802.11 Untuk Video Streaming</h1>
          <hr>
          <p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
          <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
	<a data-toggle="modal" data-target="#myModal1">
	<button class="btn " style="position: fixed; top: 200px;right: 20px;margin-top: -40px;margin-left: -40px;"><span class="fa fa-cloud-upload"></span> Upload Video</button>
    </a>
	  <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Deskripsi</h2>
            <hr class="light">
            <p class="text-faded">Pada perancangan sistem web server untuk VoD, sistem dibagi menjadi 3 bagian, yaitu Server VoD yang dirancang untuk streaming video menggunakan sebuah web, Router sebagai access point yang digunakan untuk penghubung antara server dengan client, dan Client yang dapat mengunjungi web server dengan web browser.

Server VoD.

Dengan memanfaatkan server apache yang ada pada aplikasi xampp v.3.2.2. Terdapat sejumah film yang tersimpan pada server yang dapat dinikmati

Access Point

Access point menggunakan router Tenda 1200ac yang mendukung frekuensi kerja 2,4 GHz dan 5 GHz, serta mendukung beberapa kelas WLAN seperti WLAN IEEE 802.11a,b,g,n,ac untuk 802.11ac menggunakan frekuensi di 5 GHz.

Client

Client yang ingin menikmati layanan Video Streaming harus dipastika terdapat plugin VLC sebagai media player pad web browser dan plugin ini cocok pada web browser mozilla firefox v.49.0.2

Terimakasih</p>
            <a class="btn btn-default btn-xl sr-button" href="#services">Our Team</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="section-header col-centered">
                <h2 class="section-title text-center wow fadeInDown">Meet Team</h2>
                <p class="text-center wow fadeInDown"></p>
            </div>
        </div>
      </div>
      <div class="container">
        <style>
.col-centered{
    float: none;
    margin: 0 auto;
}
</style>
            <div class="row">
               <div class="col-sm-8 col-md-3 col-centered" >
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="team-img" align="center">
                           <img class="" width="200" height="200" src="../img/portfolio/fullsize/azis.jpg" alt="">
                        </div>
                        <div class="team-info" align="center">
                            <h3>M ABDUL AZIS ALFARISI</h3>
                            <span>4313030014</span><br>
							<span>D4 Broadband Multimedia</span><br>
							<span> Judul Skripsi:<br> Analisa Performansi Jaringan WLAN IEEE 802.11ac Untuk Video Streaming</span>
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-8 col-md-3 col-centered">
                    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="team-img" align="center">
                            <img class="" width="200" height="200" src="../img/portfolio/fullsize/teguh.JPG" alt="">
                        </div>
                        <div class="team-info" align="center">
                            <h3>TEGUH DWI SUMARNO</h3>
                            <span>4313030025</span><br>
							<span>D4 Broadband Multimedia</span><br>
							<span> Judul Skripsi:<br> Analisa Performansi Jaringan WLAN IEEE 802.11n Untuk Video Streaming</span>
                        </div>
                       
                    </div>
                </div>
            </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid">
        <div class="row">
          <?php
			$per_page = 2;

$page_query = mysql_query("SELECT COUNT(*) FROM video");
$pages = ceil(mysql_result($page_query, 0) / $per_page);

$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_page;

$query = mysql_query("SELECT * FROM video LIMIT $start, $per_page");
while($query_row = mysql_fetch_assoc($query)){
?>

                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title"><?php echo $query_row['nama'];?></h3>
                    <!-- 16:9 aspect ratio -->
					<p>Date: <?php echo $query_row['date_create'];?></p>
                    <div class="embed-responsive embed-responsive-16by9">
						<video width="320" height="240" controls>
						  <source src="../img/portfolio/fullsize/<?php echo $query_row['nama_file'];?>" type="video/mp4">
						</video>
                    </div>
				</div>
				<?php
				}

if($pages >= 1 && $page <= $pages){
	for($x=1; $x<=$pages; $x++){
		echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
	}
}
?>
        </div>
      </div>
    </section>

    <div class="call-to-action bg-dark">
      
    </div>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Contact Info</h2>
            <hr class="primary">
            <p>Teknik Elektro PNJ
Jalan Prof. Dr. G. A.Siwabessy, Kampus UI, Depok 
16425 Depok, Indonesia</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x sr-contact"></i>
            <p>(021)7863534</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">info@pnj.ac.id</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>
