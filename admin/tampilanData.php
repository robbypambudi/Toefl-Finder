<?php
session_start();
include "../db_conn.php";
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){ // Cek apakah sudah login atau belum

    // Check File Exist
    if (!file_exists('./script/data.json')) {
        header("Location: ../admin/index.php?error=Data tidak ditemukan");
        exit();
    }
    // kALAU ADA
    $people_json = file_get_contents('./script/result.json');
    $people = json_decode($people_json, true); // biar bisa diakses lewat php

    if ($people == null || $people == "") { // apakah file kosong atau tidak
        header("Location: ./index.php?error=Data tidak ditemukan");
        exit();
    }
    else{
        // Menyimpan data JSON kedalam Variabel
        $nama = $people['nama'];
        $institut = $people['Institut'];
        $nrp= $people['NRP'];
        $jurusan= $people['Jurusan'];
        $jam = $people['Waktu'];
        $status= $people['Status'];
        $tanggal_test= $people['Tanggal'];
        $sec1= $people['scor1'];
        $sec2= $people['scor2'];
        $sec3= $people['scor3'];
        $score= $people['score'];
        $bahasa= $people['bahasa'];
    }
    include "./template/head.php";
    ?>
    <body>
        <div class="container-fluid">
            <?php include "./template/nav.php"; ?>
        </div>
       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Hasil Pencarian</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Menampilkan data dalam variabel ke HTMl -->
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Nama </h3>
                                                <h3>: <?php echo $nama; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Institut </h3>
                                                <h3>: <?php echo $institut; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">NRP </h3>
                                                <h3>: <?php echo $nrp; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Jurusan </h3>
                                                <h3>: <?php echo $jurusan; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Waktu </h3>
                                                <h3>: <?php echo $jam; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Status </h3>
                                                <h3>: <?php echo $status; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Tanggal Test </h3>
                                                <h3>: <?php echo $tanggal_test; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Score 1 </h3>
                                                <h3>: <?php echo $sec1; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Score 2 </h3>
                                                <h3>: <?php echo $sec2; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Score 3 </h3>
                                                <h3>: <?php echo $sec3; ?></h3>
                                            </div>
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Score </h3>
                                                <h3>: <?php echo $score; ?></h3>
                                            </div>   
                                            <div class="d-flex ">
                                                <h3 style="width: 300px;">Bahasa </h3>
                                                <h3>: <?php echo $bahasa; ?></h3>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class = "container">
            <div class="d-flex justify-content-center">
                <button class = "btn btn-warning m-4">
                    <a href="./index.php" style="color: white;">Kembali</a>
                </button>
                <button class = "btn btn-primary m-4">
                    <a href="./addToDatabase.php" style="color: white;">Tambakan Ke Database</a>
                </button>

            </div>
        </div>


    </body>



<?php
}
else{
    header("Location: ../index.php");
}

?>