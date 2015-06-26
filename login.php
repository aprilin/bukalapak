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
                  <li><a href="tambah_member.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                  <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
      </div>
    </div>

    <div class="container">
      <div class="container-fluid">
        <div class="jumbotron">
          <form class="form-horizontal" method="post">
          <marquee><h3><b>LOGIN</b></h3></marquee>
            <div class="form-group">
              <label class="col-sm-2 control-label">Username * : </label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="username" placeholder="Username" maxlength="12" required></div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Password * : </label>
              <div class="col-sm-10">
                <input class="form-control" type="password" name="password" placeholder="xxxxxxxx" required></div>
            </div>
            <div class="form-group">
              <div class="control">
                <center>
                  <button type="submit" name="login" class="btn btn-primary">Login</button>
                  <a href="index.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                </center>
              </div>
            </div>
          </form>
          
          <?php 
          include ("koneksi.php");
          session_start();
          if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $query="SELECT * from member where username = '$username' and password = '$password'";
            $cek = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_array($cek, MYSQLI_ASSOC);

              if (mysqli_num_rows($cek) == 1) {
                $_SESSION['username']=$username;
                $_SESSION['nama_toko']=$row['nama_toko'];
                header("Location: welcome.php");
              }else{
                echo "<div class='alert alert-danger' role='alert'><b>Login Gagal periksa lagi username dan password</b></div>";
              }
              
              mysqli_close($koneksi);

            }

           ?>

        </div>
      </div>
    </div>
  </body>