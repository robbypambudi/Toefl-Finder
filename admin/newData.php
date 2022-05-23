<?php
session_start();
// Cek apakah sudah login atau belum
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){ 
    // Mendapatkan data dari html
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $jurusan = $_POST['jurusan'];
    $institusi = $_POST['institusi'];
    $tanggal_test = $_POST['tanggal_test'];
    $jam = $_POST['jam'];
    $sec1 = $_POST['sec1'];
    $sec2 = $_POST['sec2'];
    $sec3 = $_POST['sec3'];
    $score = $_POST['score'];
    $bahasa = $_POST['bahasa'];

    // Verify if data is empty
    if ($nama == "" || $nrp == "" || $jurusan == "" || $institusi == "" || $tanggal_test == "" || $jam == "" || $sec1 == "" || $sec2 == "" || $sec3 == "" || $score == "" || $bahasa == "") {
        header("Location: ./index.php?error=Data tidak boleh kosong");
        exit();
    }
    else{
        // Koneksi ke database
        include "../db_conn.php"; 
        $sql = "INSERT INTO `data` (`nama`, `nrp`, `institusi`, `jurusan`, `tanggal_test`, `jam`, `sec1`, `sec2`, `sec3`, `score`, `bahasa`) VALUES 
                                ('$nama', '$nrp', '$institusi', '$jurusan', '$tanggal_test','$jam','$sec1', '$sec2', '$sec3', '$score', '$bahasa');";
        $result = mysqli_query($conn, $sql); // Eksekusi query
        if ($result) { // Cek apakah query sukses atau tidak
            header("Location: ./index.php?success=Data berhasil ditambahkan");
            exit();
        }
        else{ // Jika gagal
            header("Location: ./index.php?error=Data gagal ditambahkan");
            exit();
        }
    }

}
else{
    header("Location: ../index.php");
    exit();
}

?>