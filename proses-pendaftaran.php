<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nik = $_POST['nik'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $instansi = $_POST['instansi'];
    $pendidikan = $_POST['pendidikan'];
    $jabatan = $_POST['jabatan'];
    $pas_foto_orinama = $_FILES['pas_foto']['name'];
    $pas_foto_oripath = $_FILES['pas_foto']['tmp_name'];
    $ktp_orinama = $_FILES['ktp']['name'];
    $ktp_oripath = $_FILES['ktp']['tmp_name'];
    $berkas_pendukung_orinama = $_FILES['berkas_pendukung']['name'];
    $berkas_pendukung_oripath = $_FILES['berkas_pendukung']['tmp_name'];

    $pas_foto_nama = date('dmYHis').$pas_foto_orinama;
    $pas_foto_path = "Assets/Image/".$pas_foto_nama;

    $ktp_nama = date('dmYHis').$ktp_orinama;
    $ktp_path = "Assets/Image/".$ktp_nama;

    $berkas_pendukung_nama = date('dmYHis').$berkas_pendukung_orinama;
    $berkas_pendukung_path = "Assets/Image/".$berkas_pendukung_nama;

    if (!move_uploaded_file($pas_foto_oripath, $pas_foto_path)) {
        header('Location: index.html?status=gagal');
    }

    if (!move_uploaded_file($ktp_oripath, $ktp_path)) {
        header('Location: index.html?status=gagal');
    }

    if (!move_uploaded_file($berkas_pendukung_oripath, $berkas_pendukung_path)) {
        header('Location: index.html?status=gagal');
    }

    // buat query
    $sql = "INSERT INTO peserta (nama, email, password, nik, tempat_lahir, tanggal_lahir, pas_foto, ktp, pendukung, instansi, pendidikan, jabatan, is_verified) 
                VALUE ('$nama', '$email', '$password', '$nik', '$tempat_lahir', '$tanggal_lahir', '$pas_foto_nama', '$ktp_nama', '$berkas_pendukung_nama', '$instansi', '$pendidikan', '$jabatan', '0')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.html?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.html?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>