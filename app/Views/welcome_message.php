<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HOME UTS</title>

  <!-- Favicons -->
  <link href="assets/img/" rel="icon">
  <link href="assets/img/" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style type='text/css'>
    .box-widget {
      margin-bottom: 30px;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/welcome_message">DAR.SOCIALMEDIA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#splash">Home</a></li>
          <?php if (session('name') != null || session('name') != '') {
            echo " <li><a class='getstarted scrollto' href='/logout'>Keluar</a></li>";
          } else {
            echo ' <li><a class="getstarted scrollto" href="/login">MASUK</a></li>';
            echo '  <li><a class="getstarted scrollto" href="/register">DAFTAR</a></li>';
          }
          ?>






        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Splash Section ======= -->
  <section id="splash" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Memudahkan Pengguna Untuk Mengekspresikan Dirinya</h1>
          <h2>Kami dari tim dar.socialmedia telah menghandle ini dengan baik</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">

          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Splash -->


  <div class="page-content page-container row container" id="page-content">


    <div class="col-md-6">
      <div class="box box-widget">
        <div class="box-footer">
          <form action="<?= base_url('home/create_post') ?>" method="post"> <img class="img-responsive img-circle img-sm" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="Alt Text">
            <div class="img-push"> <input type="text" class="form-control input-sm" name="status" placeholder="Press enter to post Status"> </div>
            <br>
            <div class="form-group">
              <input type="submit" class="btn btn-secondary" value="Post Status">
            </div>
          </form>
        </div>
      </div>
      <?php
      foreach ($post as $obj) {
      ?>
        <div class="box box-widget">
          <div class="box-header with-border">
            <div class="user-block"> <img class="img-circle" src="https://img.icons8.com/color/36/000000/guest-male.png" alt="User Image">
              <span class="username"><a href="#" data-abc="true"><?= $obj->name ?></a></span> <span class="description">Public - <?= date('H:i', strtotime($obj->entry_date)) ?> </span>
            </div>
            <div class="box-tools">
              <?php if (session('id_user') == $obj->id_user) {
              ?>
                <a href="<?= base_url('home/hide_post/' . $obj->id_post) ?>">
                  <button type="button" class="bx bx-trash"></button>
                </a>
              <?php
              }
              ?>

            </div>
          </div>
          <div class="box-body">
            <p><?= $obj->status ?></p>
            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
            <span class="pull-right text-muted">0 likes - <?= $obj->jumlah_komentar ?> comments</span>
          </div>
          <div class="box-footer box-comments">
            <?php
            foreach ($obj->comment as $obj1) {
            ?>
              <div class="box-comment"> <img class="img-circle img-sm" src="https://img.icons8.com/office/36/000000/person-female.png" alt="User Image">
                <div class="comment-text"> <span class="username"> <?= $obj1->name ?><span class="text-muted pull-right"><?= date('H:i', strtotime($obj->entry_date)) ?> </span> </span> <?= $obj1->comment ?> </div>

                <p>
                  <a href="<?= base_url('home/delete_comment/' . $obj1->id_comment) ?>">Hapus</a>
                </p>
              </div>
            <?php
            }
            ?>

          </div>
          <div class="box-footer">
            <form action="<?= base_url('home/create_comment') ?>" method="post"> <img class="img-responsive img-circle img-sm" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="Alt Text">
              <div class="img-push">
                <input type="hidden" class="form-control input-sm" name="id_post" value='<?= $obj->id_post ?>' placeholder="Press enter to post comment">
                <input type="text" class="form-control input-sm" name="comment" placeholder="Press enter to post comment">
              </div>
              <br>
              <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Add Comment">
              </div>
            </form>
          </div>
        </div>
      <?php
      }
      ?>


    </div>





  </div>

  <!-- ======= end isian  ======= -->



  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Tentang Kami</h2>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Sebuah Web Social Media yang akan mempermudah penggunanya dengan fitur yang kami miliki.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> User Interface yang baik</li>
            <li><i class="ri-check-double-line"></i> User Merasa mudah menggunakan ini</li>
            <li><i class="ri-check-double-line"></i> Post dan Download feed dengan cepat tanpa hambatan</li>
          </ul>
        </div>
  </section><!-- End About Us Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>DAR</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>