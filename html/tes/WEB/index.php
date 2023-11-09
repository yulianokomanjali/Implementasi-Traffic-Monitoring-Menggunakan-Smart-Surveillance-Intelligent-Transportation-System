<?php
error_reporting(0);
include "koneksi.php";

$sukses           = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'print'){?>
    <?php
   
        $sukses = header("refresh:3;url=index.php");
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. BINTANG KOMUNIKASI UTAMA</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
    <?php 
			//$s_sekolah="";
            $s_keyword="";
            if (isset($_POST['search'])) {
                //$s_sekolah = $_POST['s_sekolah'];
                $s_keyword = $_POST['s_keyword'];
            }
	?>

        <header>
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light">
					<a class="navbar-brand" href="#"><b>Technician Availability</b></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Beranda</a>
							</li>
							<li class="nav-item">
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

  
                <div class="card">
                    <div class="card-body">
                    <div class="card-header text-white bg-secondary">
                        <form method="POST" action="">
                        <div class="row mb-3">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" placeholder="Keyword" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
                            </div>
                        </div>
                        <div class="col-sm-2" >
                            <div class="form-group">
                                <button id="search" name="search" class="btn btn-warning">Cari</button>
                            </div>
			            </div>                       
                        <div class="col-sm-2" >
                            <div class="form-group">
                                <a href="print.php" class="btn btn-primary" onclick="return confirm('Yakin mau print tabel?')">PRINT TABEL</a>            
                            </div>
                        
			            </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <select name="" id="" style="width: 100%; height: 100%;" >
                                <option value="" disabled selected hidden>---Daftar Teknisi yang IDLE---</option>
                                    <?php 
                                        $query    =mysqli_query($koneksi, "SELECT * FROM karyawan WHERE jabatan = 'teknisi' AND (Namalkp NOT IN (SELECT teammember1 FROM tbl_admin UNION SELECT teammember2 FROM tbl_admin) or Namalkp in (SELECT teammember1 FROM tbl_admin WHERE stat = 'idle') or Namalkp in (SELECT teammember2 FROM tbl_admin WHERE stat = 'idle'))");
                                        while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <option value="<?php echo $data['Namalkp'];?>" disabled><?php echo $data['Namalkp'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div style="background:#F5F5F5;color:blue" class="col-sm-2">
                        <?php
                            $full = mysqli_query($koneksi, "select * from tbl_admin where stat='full'");
                            $idle = mysqli_query($koneksi, "select * from tbl_admin where stat='idle'");
                            $prepare = mysqli_query($koneksi, "select * from tbl_admin where stat='prepare'");
                            $j_full = mysqli_num_rows($full);
                            $j_idle = mysqli_num_rows($idle);
                            $j_prepare = mysqli_num_rows($prepare);
                        ?>
                        Full :<?php echo $j_full?> 
                        <br>
                        Idle :<?php echo $j_idle?>
                        <br>
                        Prepare :<?php echo $j_prepare?>
                        </div> -->
                        </div>
                        </form>
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Last Activity</th>
                                    <th scope="col">Team Member</th>
                                    <th scope="col">Start</th>
                                    <th scope="col">End</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Last Request By</th>
                                    <th scope="col">Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $search_keyword = '%'. $s_keyword .'%';
                                $no = 1;
                                $query = "SELECT * FROM tbl_admin WHERE (teammember1 !='' OR teammemberex !='') AND (lastactivity LIKE ? OR teammember1 LIKE ? OR teammember2 LIKE ? OR teammemberex LIKE ? OR start LIKE ? OR end LIKE ? OR stat LIKE ? OR lastrequest LIKE ? OR keterangan LIKE ?) ORDER BY id DESC";
                                $dewan1 = $koneksi->prepare($query);
                                $dewan1->bind_param('sssssssss', $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
                                $dewan1->execute();
                                $res1 = $dewan1->get_result();

                                if ($res1->num_rows > 0) {
                                    while ($row = $res1->fetch_assoc()) {
                                        $id = $row['id'];
                                        $teammember1       = $row['teammember1'];
                                        $teammember2       = $row['teammember2'];
                                        $teammemberex       = $row['teammemberex'];
                                        $lastactivity = $row['lastactivity'];
                                        $start = $row['start'];
                                        $end = $row['end'];
                                        $stat           = $row['stat'];
                                        $lastrequest = $row['lastrequest'];
                                        $keterangan = $row['keterangan'];
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td scope="row"><?php echo $lastactivity ?></td>
                                        <td scope="row"><?php 
                                        if (!null==$teammemberex && !null==$teammember2 && !null==$teammember1){?>●<?php
                                            echo $teammember1; ?>
                                        <br>
                                        ●
                                        <?php 
                                            echo $teammember2; ?>
                                        <br>
                                        ●
                                        <?php 
                                            echo $teammemberex; echo" (subcon)";}

                                        elseif (!null==$teammemberex && !null==$teammember1){ ?> ● <?php
                                            echo $teammember1; ?>
                                        <br>
                                        ●
                                        <?php 
                                            echo $teammemberex; echo" (subcon)";} 
                                            
                                        elseif (!null==$teammember2 && !null==$teammember1){ ?> ● <?php
                                            echo $teammember1; ?>
                                        <br>
                                        ●
                                        <?php 
                                            echo $teammember2;} 

                                        elseif (!null==$teammemberex){ ?> ● <?php
                                            echo $teammemberex; echo" (subcon)";
                                        }
                                        else { ?> ● <?php
                                            echo $teammember1;}?>
                                        </td>
                                        <td scope="row"><?php echo $start ?></td>
                                        <td scope="row"><?php echo $end ?></td>
                                        <?php
                                        if ($stat=='idle'){?>
                                            <td scope="row" style="color:blue"><?php echo $stat ?></td>
                                        <?php
                                        } elseif ($stat=='full'){?>
                                            <td scope="row" style="color:red"><?php echo $stat ?></td>
                                        <?php
                                        } if ($stat=='prepare'){?>
                                            <td scope="row" style="color:orange"><?php echo $stat ?></td>
                                        <?php
                                        } 
                                        ?>
                                        </td>
                                        <td scope="row"><?php echo $lastrequest ?></td>
                                        <td scope="row"><?php echo $keterangan ?></td>
                                    </tr>
                                <?php } } else {} ?> 
                            </tbody>
                            
                        </table>
                                    </div>
                    </div>
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