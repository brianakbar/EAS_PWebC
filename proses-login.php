<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['login_user'])){
    session_start();
    // ambil data dari formulir
    $email = $_POST['email'];
    $password = $_POST['password'];

    // buat query
    $sql = "SELECT * FROM peserta WHERE email = '$email' && password = '$password'";
    $query = mysqli_query($db, $sql);

    if(!$query) header('Location: index.php?status=gagal');

    $data = mysqli_fetch_array($query);

    if ($data['is_verified'] == '0')
        die("Akun anda belum di verifikasi!");

    if (!$data)
            die("User tidak ditemukan");

    $_SESSION['id'] = $data['no_peserta'];
    header('Location: user-dashboard.php?');


} else if(isset($_POST['login_admin'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    // buat query
    $sql = "SELECT * FROM admin WHERE username = '$name' && password = '$password'";
    $query = mysqli_query($db, $sql);

    if(!$query) header('Location: index.php?status=gagal');

    $data = mysqli_fetch_array($query);

    if (!$data)
            die("Admin tidak ditemukan");

    header('Location: admin-dashboard.html?');
} else {
    die("Akses dilarang...");
}

?>