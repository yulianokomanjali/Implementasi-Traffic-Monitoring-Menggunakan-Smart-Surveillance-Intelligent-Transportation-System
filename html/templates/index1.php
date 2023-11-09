<?php
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traffic's</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../static/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../static/style.css">
        
</head>
<body>

        <header>
		</header>
        
        <!-- Awal Jumbotron -->
		<section class="jumbotron-bg">
			<div class="jumbotron warna-bg text-white">
				<div class="container">
					<h1 class="display-4">Traffic Monitoring</h1>
                    
					<p class="lead">Hallo user! Selamat datang di website Traffic Monitoring. Website ini dapat digunakan para pengendara yang akan bepergian agar dapat menghindari kemacetan dan tidak telat sampai tujuan. Website ini akan memberikan anda rekomendasi apakah jalan yang ingin anda lalui sepi, ramai atau padat dan anda dapat melihat langsung situasi lalu lintas pada jalur tersebut secara realtime sehingga dapat menjadi pertimbangan anda dalam menentukan jalan yang akan anda lalui.</p>
				</div>
			</div>
		</section>

        <div class="card">
        <div class="card-body">


            <div class = "y">
                <center><h1>Monitoring</h1></center>
                <div class="mb-3row"> 
                <label for="alamat" style="font-size:30px;" class="col-sm-5 col-form-label">Jalan A</label>
                <label for="alamat" style="font-size:30px;" class="col-sm-3 col-form-label">Jalan B</label>
                </div>
                <img src="{{ url_for('video_feed') }}" style="width:500px;height: 400px;">
                <img src="{{ url_for('video_feed1') }}" style="width:500px;height: 400px;">
                <br>
                

            </div>
        </div>
    </div> 
    </div>
		<!-- Akhir Jumbotron -->
    <div class="card-footer text-muted ">
    
				<p class="text-center">&copy; Tugas Akhir Yuliano Komanjali-Implementasi Traffic Monitoring Menggunakan Smart Surveillance dalam Inteligent Transportation System 2023-<?= date('Y') ?>
			</p>
		</div>
		
</body>
</html>