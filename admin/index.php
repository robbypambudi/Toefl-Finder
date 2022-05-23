<?php 
session_start();
include "../db_conn.php";

// If pertama buat cek apakah penguna sudah login apa belum
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
include "../admin/template/head.php";
?>

<body>
     <div class="container-fluid">
     <!-- Navbar -->
     <?php include './template/nav.php'; ?>

     <div class ="text-center mt-5">
          <h3 class ="text-primary">
               Cari Data Peserta Test TOEFL
          </h3> 
     </div>
     <?php if (isset($_GET['error'])) { ?>
     	<p class="alert alert-danger" role="alert"><?php echo $_GET['error']; ?></p>
     <?php } ?>
     <?php if (isset($_GET['success'])) { ?>
     	<p class="alert alert-success" role="alert"><?php echo $_GET['success']; ?></p>
     <?php } ?>
     <div class="container" style="margin-top:20px">
     <div class="card text-center">
          <div class="card-body">

          <!-- Untuk Menjalakan Button cari -->
          <form action="search.php" method="post">
               <select style="width:300px;padding:0 25px 0 15px; height:40px" name ="metode" class="border border-success">
                    <option value="">-- Cari Berdasarkan --</option>
                    <option value="nama">Nama</option>
                    <option value="nim">NRP</option>
               </select>
               <input style="width:400px;padding:0 25px 0 15px; height:40px;"type="text" name="nama" placeholder="Masukan Kata Kunci"><br>
               <button class="btn btn-primary " style="width: 120px; margin-top: 20px;">
                    Cari
               </button>
          </from>
          <!-- Data Baru -->
          <a type="button" class="btn btn-success" style="width: 120px; margin-top: 20px;" href="./tambah.php">Data Baru</a>
          </div>
     </div>
     </div>

     <!-- Membuat Tabel -->
     <hr>
     <h3 class="text-center">Data Peserta</h3>
    
<?php 
     // Query untuk menampilkan data
     $sql = "SELECT * FROM data";
     $result = mysqli_query($conn, $sql);

     echo "<table class='table table-striped'>";
     echo "<thead>";
     echo "<tr>";
     echo "<th>Nama</th>";
     echo "<th>NRP</th>";
     echo "<th>Institusi</th>";
     echo "<th>Jurusan</th>";
     echo "<th>Tanggal</th>";
     echo "<th>Jam</th>";
     echo "<th>Sec 1</th>";
     echo "<th>Sec 2</th>";
     echo "<th>Sec 3</th>";
     echo "<th>Score</th>";
     echo "<th>Bahasa</th>";
     echo "<th>Aksi</th>";
     echo "</tr>";
     echo "</thead>";
     echo "<tbody>";
     if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
               echo "<tr>";
               echo "<td>" . $row['nama'] . "</td>";
               echo "<td>" . $row['nrp'] . "</td>";
               echo "<td>" . $row['institusi'] . "</td>";
               echo "<td>" . $row['jurusan'] . "</td>";
               echo "<td>" . $row['tanggal_test'] . "</td>";
               echo "<td>" . $row['jam'] . "</td>";
               echo "<td>" . $row['sec1'] . "</td>";
               echo "<td>" . $row['sec2'] . "</td>";
               echo "<td>" . $row['sec3'] . "</td>";
               echo "<td>" . $row['score'] . "</td>";
               echo "<td>" . $row['bahasa'] . "</td>";
               // Delete Button
               echo "<td>";
               echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
               echo "</td>";
               echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";
     }else{
          echo "<tr>";
          echo "<td colspan='10'>Data Kosong</td>";
          echo "</tr>";
     }


?>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>

<?php 
}else{ // Kalu belum login
     header("Location: ../index.php");
     exit();
}
 ?>