<?php
error_reporting(0);
?>
<!doctype html>
	<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<title>PT. BINTANG KOMUNIKASI UTAMA</title>
	</head>
	<body>
		<header>
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<a class="navbar-brand" href="#"><b>Technician Availability</b></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="profil.php">Profil</a>
							</li>
						</ul>
						<a href="login" class="btn btn-outline-primary my-2 my-sm-0">Login</a>
					</div>
				</nav>
			</div>
		</header>

		<!-- Awal Jumbotron -->
		<section class="jumbotron-bg">
			<div class="jumbotron warna-bg text-white">
				<div class="container">
					<h1 class="display-4">PT. Bintang Komunikasi Utama</h1>
					<p class="lead">Hallo user! Selamat datang di website pendukung dalam PT. Bintang Komunikasi Utama. Website dapat digunakan oleh para teknisi dan Project Manager. Teknisi dapat mengakses website untuk menginputkan jadwal ketersediaan(IDLE) atau full tiap harinya.</p>
				</div>
			</div>
		</section>
		<!-- Akhir Jumbotron -->

		<!-- Awal Content -->
		<h3><center>PERJALANAN TEKNISI</center></h3>
		<div class="container">
			<div class="row">
				<div class="col-md-3 mb-2">
					<div class="card">
						<img class="card-img-top" src="img/trip1.jpeg" alt="Gambar">
					</div>
				</div>	
				<div class="col-md-3 mb-2">
					<div class="card">
						<img class="card-img-top" src="img/TRIP2.jpeg" alt="Gambar">
					</div>
				</div>
				<div class="col-md-3 mb-2">
					<div class="card">
						<img class="card-img-top" src="img/trip3.jpeg" alt="Gambar">
					</div>
				</div>
				<div class="col-md-3 mb-2">
					<div class="card">
						<img class="card-img-top" src="img/trip4.jpeg" alt="Gambar">
					</div>
				</div>				
			</div>
		</div>

		<div class ="container">
			<br>
			<center><img src="img/bku2.png"></center><br>
			<h3><center> Project Manager</h3></center>
			<p>  Project Manager (PM) jika telah login dengan menggunakan akun pada website ini, PM akan mendapatkan kemudahan untuk melihat dan mendapatkan terkait teknisi yang dapat di panggil atau tidak dalam bekerja.
				sehingga dengan menggunakan visualisasi pada website dapat memudahkan dalam pemantauan. 
			</p>
			<h3> <center>Teknisi</h3></center>
			<p>Para Teknisi dapat masuk ke dalam website dengan menggunakan akun yang telah diberikan. Sehingga nantinya diharapkan para teknisi dapat menginputkan/ mengupdate tanggal penugasan sendiri sehingga PM nantinya dapat melihat melalui website ini. 
			</p>
		</div>

		<div class="card-footer text-muted ">
			<p class="text-center">&copy; PKL Politeknik Negeri Padang 2022-<?= date('Y') ?>
		</p>
	</div>

	<!-- Akhir Content -->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script type="text/javascript" src="js/jquery-3.4.1.slim.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>