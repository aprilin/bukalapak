<?php 
  include ("koneksi.php");
	session_start();
	if (!isset($_SESSION['nama_toko'])) {
		header("location: login.php");
	}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
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
            	<li><a href="welcome.php">Home</a></li>
            	<li class="active"><a href="tambah_data.php">Tambah Data</a></li>
          	</ul>
          	<div class="btn-group navbar-form pull-right">
				<i class="icon-user icon-white"></i>
				<button type="submit" class="btn btn-primary"><?php echo $_SESSION['nama_toko']; ?></button>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="logout.php"><i class="icon-off"></i>Logout</a></li>
				</ul>
			</div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    	<div class="container-fluid">
    		<div class="jumbatron">
    			<marquee><h3 style="">Form Pendaftaran</h3></marquee>
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Barang * : </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="nama_barang" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Gambar Barang * : </label>
              <div class="col-sm-10"><input type="file" name="gambar_barang" required></div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Harga Barang* : </label>
              <div class="col-sm-10"><input class="form-control" type="number" name="harga" required></div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Stok Barang * : </label>
              <div class="col-sm-10"><input class="form-control" type="number" name="stok" required></div>
            </div>
            <div class="form-group">
              <div class="control">
                <center>
                  <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                  <a href="welcome.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                </center>
              </div>
            </div>
          </form>

          <?php 
            if (isset($_POST['upload'])) {
              $nama_barang = $_POST['nama_barang'];
              $harga = $_POST['harga'];
              $stok = $_POST['stok'];

              $lokasi_file = $_FILES['gambar_barang']['tmp_name'];
              $gambar_barang = $_FILES['gambar_barang']['name'];
              $direktori = "barang/$gambar_barang";

              move_uploaded_file($lokasi_file, $direktori);

              $query = "INSERT INTO barang (username, nama_barang, gambar_barang, harga, stok) VALUES ('$_SESSION[username]', '$nama_barang', '$gambar_barang', '$harga', '$stok')";
              
              if (mysqli_query($koneksi, $query)) {
                echo "<h2>UPLOAD BERHASIL DITAMBAH</h2>";
                echo '<META http-equiv="refresh" content="1;URL=welcome.php">';
              }else{
                echo "terjadi kesalahan";
              }
            }

            mysqli_close($koneksi);

           ?>

    		</div>
    	</div>
    </div>
</body>
</html>