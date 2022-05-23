<?php
session_start();
include "../db_conn.php";
include "./template/head.php";

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
    include "./template/nav.php";
    ?>
    <!-- Tambhakan data baru -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tambah Data</h1>
                <form action="newData.php" method="post">
                    <div class="form-group col-5 mt-3">
                        <label for="metode">NRP</label>
                        <input type="text" class = "form-control" name="nrp" placeholder="NRP">
                    </div>
                    <div class="form-group col-5 mt-3 ">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder ="Masukan nama anda">
                    </div>
                    <div class="form-group col-5 mt-3">
                        <label for="institut">Universitas/Institusi</label>
                        <input type="text" class="form-control" name="institusi" placeholder ="Masukan institut anda">
                    </div>
                    <div class="form-group col-5 mt-3">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" placeholder ="Masukan jurusan anda">
                    </div>
                    <div class="form-group col-5 mt-3">
                        <label for="status">Tanggal Test</label>
                        <input type="date" class="form-control" name="tanggal_test" >
                    </div>
                    <div class="form-group col-5 mt-3">
                        <label for="status">Waktu Test</label>
                        <input type="time" class="form-control" name="jam" >
                    </div>
                    <div class="form-group col-5 mt-3">
                        <label for="sec1">Score 1</label>
                        <input type="text" class="form-control" name="sec1" placeholder ="Masukan score anda">
                    </div>
                    <div class="form-group col-5 mt-3">
                        <label for="sec2">Score 2</label>
                        <input type="text" class="form-control" name="sec2" placeholder ="Masukan score anda">
                    </div>
                    <div class="form-group col-5 mt-3">
                        <label for="sec3">Score 3</label>
                        <input type="text" class="form-control" name="sec3" placeholder ="Masukan score anda">
                    </div>
                    <div class="form-group col-5 mt-3">
                        <label for="score">Score</label>
                        <input type="text" class="form-control" name="score" placeholder ="Masukan score anda">
                    </div>
                    <div class ="form-group col-5 mt-3">
                        <label for="bahasa">Bahasa</label>       
                        <input type="text" class="form-control" name="bahasa" placeholder ="Masukan bahasa anda">
                    <button type="submit" class="btn btn-primary mt-3">Tambah</button>


                </form>
                <button type="button" class="btn btn-warning mt-3" onclick="window.location.href='../admin/index.php'">Kembali</button>
            </div>
        </div>


<?php

}
else{
    header("Location: ../index.php");
    exit();
}

?>