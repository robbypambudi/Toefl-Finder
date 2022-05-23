<?php
session_start();    
include "../db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    // Add Result.json to database
    $people_json = file_get_contents('./script/result.json');
    $people = json_decode($people_json, true);

    if ($people == null || $people == "") {
        header("Location: ../admin/index.php?error=Data tidak ditemukan");
        exit();
    }
    else{
        $nama = $people['nama'];
        $institusi = $people['Institut'];
        $nrp= $people['NRP'];
        $jurusan= $people['Jurusan'];
        $status= $people['Status'];
        $jam = $people['Waktu'];
        $tanggal_test= $people['Tanggal'];
        $sec1= $people['scor1'];
        $sec2= $people['scor2'];
        $sec3= $people['scor3'];
        $score= $people['score'];
        $bahasa= $people['bahasa'];
    }
    $sql = "INSERT INTO `data` (`nama`, `nrp`, `institusi`, `jurusan`, `tanggal_test`, `jam`,
                                 `sec1`, `sec2`, `sec3`, `score`, `bahasa`) VALUES 
                            ('$nama', '$nrp', '$institusi', '$jurusan', '$tanggal_test', '$jam', 
                            '$sec1', '$sec2', '$sec3', '$score', '$bahasa');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../admin/index.php?success=Data berhasil ditambahkan");
        exit();
    }
    else{
        header("Location: ../admin/index.php?error=Data gagal ditambahkan");
        exit();
    }    
}
else{
    header("Location: ../index.php");
}

?>