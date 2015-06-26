<?php 
	session_start();
	if (!isset($_SESSION['nama_toko'])) {
		header("location: login.php");
	}
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
            	<li class="active"><a href="welcome.php">Home</a></li>
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
    			<form method="post">
    				<a href="tambah_data.php"><center><button class="btn btn-primary" type="button">TAMBAH DATA</button></center></a>
    				<br/>
		    		<table cellspacing="0" class="table table-striped">
		    			<thead>
		    				<tr>
		    					<th>Nama Barang</th>
		    					<th>Gambar Barang</th>
		    					<th>Stok Barang</th>
		    					<th>Harga Barang</th>
		    					<th>Action</th>
		    				</tr>
		    			</thead>
			
			    		<?php 

			    			include ("koneksi.php");

			    			$query = "SELECT * from barang where username = '$_SESSION[username]'";
			    			$cek = mysqli_query($koneksi, $query);
			    			while ($row = mysqli_fetch_array($cek, MYSQLI_ASSOC)) {
			    				extract($row);
						?>

						<tbody>
							<tr>
								<td><?php echo $nama_barang; ?></td>
								<td><?php echo "<img src='barang/$gambar_barang' width='75px'>"; ?></td>
								<td><?php echo $stok; ?></td>
								<td>Rp. <?php echo $harga; ?></td>
								<td>
									<a href="edit_data.php?id_barang=<?php echo $id_barang; ?>"><button class="btn btn-warning" type="button">Edit</button></a>
									<a href="hapus_data.php?id_barang=<?php echo $id_barang; ?>"><button class="btn btn-danger" type="button">Delete</button></a>
								</td>
							</tr>
						</tbody>

						<?php

			    			}

			    		 ?>

		    		</table>
    			</form>
    		</div>
    	</div>
    </div>
</body>
</html>