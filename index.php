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
          <h2 style="color: blue"><b>JUAL BELI ONLINE</b></h2>
          <hr>
          <?php 
            include ("koneksi.php");
            session_start();

            $sql = "SELECT * from member";
            $resul = mysqli_query($koneksi, $sql);
            while ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC)) {
              extract($row);
          ?>

            <div class='col-lg-3'>
              <center>
                <a href="user.php?username=<?php echo $username; ?>">
                  <h2><b><?php echo "$nama_toko"; ?></b></h2>
                  <p>
                    <img src='member/<?php echo $upload_gambar; ?>' width='150px'>
                  </p>
                </a>
              </center>
            </div>


          <?php
            }

           ?>
        </div>
      </div>
    </div>  
  </body>
</html>