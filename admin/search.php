<?php 

session_start();
include "../db_conn.php";

// Buat cek apakah sudah login atau belum
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

    if(isset($_POST['metode']) && isset($_POST['nama'])){ // Buat cek apakah ada data yang dikirim atau tidak
        
        if (empty($_POST['metode'])) { // Cek apakah ada data yang kosong
            header("Location: ../admin/index.php?error=Metode is required");
            exit();
        }else if(empty($_POST['nama'])){ // Cek apakah ada data yang kosong
            header("Location: ../admin/index.php?error=Name is required");
            exit();

        }else{
            // Kalau sudah terpenuhi
            $nama = $_POST['nama']; //Harusnya nilai
            $metode = $_POST['metode']; 

            // Write Nama and Metode to JSON
            $data = array(
                'nama' => $nama,
                'metode' => $metode
            );
            $json = json_encode($data);
            file_put_contents('../admin/script/data.json', $json); // Menyimpan data ke file JSON
            echo "<h1>Mohon Tunggu Sebentar data sedang di proses</h1>";

            $php = `python ./script/exstract.py`; // Untuk ngejalanin python
            echo $php;

            header("Location: ./tampilanData.php"); // Redirect ke tampilanData.php
        }

    } // Jika data kosong
    else{
        header("Location: index.php?error=Pilih Metode Pencarian dan Masukan Kata Kunci");
    }
}
else{
    header("Location: ../index.php");
}

?>