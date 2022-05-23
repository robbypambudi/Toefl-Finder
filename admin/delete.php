<?php
session_start();
include "../db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM data WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../admin/index.php?success=Data berhasil dihapus");
            exit();
        }else{
            header("Location: ../admin/index.php?error=Data gagal dihapus");
            exit();
        }
    } else {
        header("Location: ./index.php");
        exit();
    }
}
else {
    header("Location: ../index.php");
    exit();
}

?>