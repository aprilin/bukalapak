<?php 
	include ("koneksi.php");
  session_start();
  $username = $_GET['username'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-brand glyphicon glyphicon-home"></div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contak.php">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="tambah_member.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="container-fluid">
        <div class="jumbtron">
          <img src="images.png">
          <hr>  
          <?php 

            $sql = "SELECT * from barang where username='$username'";
            $resul = mysqli_query($koneksi, $sql);
          ?>
          <div class='alert alert-danger' role='alert'><h5><b>Selamat Datang Di Toko Kami :)</b></h5></div>
          
          <?php
            while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC)) {
              extract($row);
          ?>
            <div class='col-lg-4'>
              <center>
                  <h2><b><?php echo "$nama_barang"; ?></b></h2>
                  <p>
                    <img src='barang/<?php echo $gambar_barang; ?>' width='150px'><br/>
                    <?php echo "Rp. ".$harga.",-"; ?><br/>
                    <?php echo "Tersedia ".$stok." Buah"; ?><br/>
                  </p>
              </center>
            </div>
          <?php
            }

           ?>
        </div>
      </div>
    </div>
		<center>
			<a href="index.php"><button type="button" class="btn btn-danger">Kembali</button></a>
		</center>
</body>
</html>