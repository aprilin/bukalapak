<?php 
  include ("koneksi.php");
	session_start();
	if (!isset($_SESSION['nama_toko'])) {
		header("location: login.php");
	}

  $id_barang=$_GET['id_barang']
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hapus data</title>
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
            	<li><a href="tambah_data.php">Tambah Data</a></li>
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

        <?php 

          $query = "SELECT * from barang where id_barang = '$id_barang'";
          $cek = mysqli_query($koneksi, $query);
          while ($row = mysqli_fetch_array($cek, MYSQLI_ASSOC)) {
            extract($row);

         ?>

    			<marquee><h3 style="">Form Pendaftaran</h3></marquee>
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Barang * : </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" disabled/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Gambar Barang * : </label>
              <div class="col-sm-10"><?php echo "<img src='barang/$gambar_barang' width='125px'>"; ?></div>
            </div>
            <div class="form-group">
              <div class="control">
              <label class="col-sm-2 control-label">Opsi : </label>
              <div class="col-sm-10">
                  <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                  <a href="welcome.php"><button type="button" class="btn btn-primary">Kembali</button></a>
              </div>
            </div>
          </form>

          <?php 
          }
            if (isset($_POST['hapus'])) {
              
              $query = "DELETE from barang WHERE id_barang='$id_barang'";
              
              if (mysqli_query($koneksi, $query)) {
                echo "<h2>Hapus Data Berhasil</h2>";
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