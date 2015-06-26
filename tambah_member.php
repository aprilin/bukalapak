<!DOCTYPE html>
<html lang="en">
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
    <div class="container">
      <div class="container-fluid">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <div class="navbar-brand glyphicon glyphicon-home"></div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contak.php">Contact</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="tambah_member.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
      </div>
    </div>

    <div class="container">
      <div class="container-fluid">
        <div class="jumbotron">
          <marquee><h3 style="">Form Pendaftaran</h3></marquee>
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 control-label">Username * : </label>
              <div class="col-sm-10"><input class="form-control" type="text" name="username" placeholder="Username" maxlength="12" required></div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Password * : </label>
              <div class="col-sm-10"><input class="form-control" type="password" name="password" placeholder="xxxxxxxxx" required></div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Toko* : </label>
              <div class="col-sm-10"><input class="form-control" type="text" name="nama_toko" placeholder="Nama" required></div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Upload gambar * : </label>
              <div class="col-sm-10"><input type="file" name="upload_gambar" required></div>
            </div>
            <div class="form-group">
              <div class="control">
                <center>
                  <button type="submit" name="submit" class="btn btn-primary">Create</button>
                  <a href="index.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                </center>
              </div>
            </div>
          </form>
          <?php 

            include ("koneksi.php");
            if (isset($_POST['submit'])) {
              $username = $_POST['username'];
              $password = md5($_POST['password']);
              $nama_toko = $_POST['nama_toko'];

              $lokasi_file = $_FILES['upload_gambar']['tmp_name'];
              $upload_gambar = $_FILES['upload_gambar']['name'];
              $direktori = "member/$upload_gambar";

              move_uploaded_file($lokasi_file, $direktori);

              $query = "INSERT INTO member (username, password, nama_toko, upload_gambar) VALUES ('$username', '$password', '$nama_toko', '$upload_gambar')";
              
              if (mysqli_query($koneksi, $query)) {
                echo "<h2>DATA BERHASIL DITAMBAH</h2>";
                echo '<META http-equiv="refresh" content="1;URL=index.php">';
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