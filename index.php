<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ujian Pegawai Baru</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Cabin" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <link href="assets/css/home.css" rel="stylesheet">
</head>
<body>
<?php 
    session_start();
?>
  <!-- ======= Login Modal ======= -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body align-center relative">
          <h4 class="modal-title font-extrabold" id="exampleModalLongTitle">Login ke akun peserta</h4>
          <hr>
          <button type="button" class="close" onclick="$('#loginModal').modal('toggle')" data-dismiss="modal" aria-label="Close">
            <img class="img-fluid" src="assets/image/Close.svg" alt="Close Logo">
            <span aria-hidden="true"></span>
          </button>
          <div class="col-9 mx-auto">
            <form action="./proses-login.php" method="POST">
              <div class="relative full-width mb-3">
                <label for="email_login_input" class="login-img"><img class="img-fluid" src="assets/image/carbon_email.svg" alt="Search Logo"></label>
                <input name="email" class="border border-rounded-sm full-width ps-5 pe-3 py-2" id="email_login_input" placeholder="Email" required>
              </div>
              <div class="relative full-width mb-3">
                <label for="password_login_input" class="login-img"><img class="img-fluid" src="assets/image/arcticons_password.svg" alt="Search Logo"></label>
                <input type="password" name="password" class="border border-rounded-sm full-width ps-5 pe-3 py-2" id="password_login_input" placeholder="Password" required>
              </div>
              <button type="submit" name="login_user" class="btn btn-primary bg-light-blue border-rounded-sm border-light-blue full-width mb-3">Login</button>
              <div>
                <p class="inline-block">atau</p>
                <a class="link-blue" href="#">Lupa Password</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <div class="div-logo me-auto d-flex align-items-center">
        <a href="index.php" class="logo"><img src="assets/image/logo.png" alt="" class="img-fluid"></a>
        <p>Kementrian Kelautan dan Perikanan Republik Indonesia</p>
      </div>
      <!-- <h1 class="logo me-auto"><a href="index.html">Arsha</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <?php
          if (isset($_SESSION['id'])) {
            echo '<li><a class="getstarted scrollto" href="./user-dashboard.php">Dashboard</a></li>';
          } else {
          ?>
          <li><a class="nav-link" href="#masuk" onclick="$('#loginModal').modal('toggle')">Masuk</a></li>
          <li><a class='getstarted scrollto' href='./register.html'>Daftar</a></li>
          <?php
            }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h2>Selamat Datang</h2>
          <?php
          if (isset($_SESSION['id'])) {
            include 'config.php';
            $sql = "SELECT * FROM peserta WHERE no_peserta = '".$_SESSION['id']."'";
            $query = mysqli_query($db, $sql);
            $data = mysqli_fetch_array($query);
            echo "<h1>".$data['nama']."</h1>";
            echo "<div class='d-flex justify-content-center justify-content-lg-start'>";
            echo "<a href='./user-dashboard.php' class='btn-get-started scrollto'>Dashboard</a>";
            echo "</div>";
          } else {
            echo "<h1>Portal Pendaftaran Pegawai Baru</h1>";
            echo "<h3>Segera daftarkan diri kamu!</h3>";
            echo "<div class='d-flex justify-content-center justify-content-lg-start'>";
            echo "<a href='./register.html' class='btn-get-started scrollto'>Daftar</a>";
            echo "</div>";
          }
          ?>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
   <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kontak</h2>
        <p>Untuk informasi lebih lanjut dapat membuat kartu pertanyaan dibawah ini.</p>
      </div>

      <div class="row">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Lokasi:</h4>
              <p>Jl. Ahmad Yani No.152 B, Gayungan, Kec. Gayungan, Kota SBY, Jawa Timur 60235</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>KementerianKelautanPerikanan@comp.id</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>(031) 8292326</p>
            </div>

            <iframe src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Department of Marine and Fisheries ahmad yani&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>

        </div>

        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name">Nama Anda</label>
                <input type="text" name="name" class="form-control" id="name" required>
              </div>
              <div class="form-group col-md-6">
                <label for="name">Email Anda</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" required>
            </div>
            <div class="form-group">
              <label for="name">Pesan</label>
              <textarea class="form-control" name="message" rows="10" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Kirim Pesan</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>
</html>