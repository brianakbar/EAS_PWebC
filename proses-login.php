<?php
session_start();
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['login'])){
    // ambil data dari formulir
    $email = $_POST['email'];
    $password = $_POST['password'];

    // buat query
    $sql = "SELECT * FROM peserta WHERE email = '$email' && password = '$password'";
    $query = mysqli_query($db, $sql);

    if(!$query) header('Location: index.html?status=gagal');

    $data = mysqli_fetch_array($query);

    if (!$data)
            die("User tidak ditemukan");

    $_SESSION['id'] = $data['no_peserta'];
    header('Location: user-dashboard.php?');


} else {
    die("Akses dilarang...");
}

?>