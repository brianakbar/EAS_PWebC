<?php
    include "config.php";
    $id = $_GET['id'];

    $sql = "UPDATE peserta SET is_verified = '1' WHERE no_peserta='$id'";
    $query = mysqli_query($db, $sql);

    if($query) {
        header('Location: admin-verifikasi.php?status=sukses');
    } else {
        header('Location: admin-verifikasi.php?status=gagal');
    }
?>