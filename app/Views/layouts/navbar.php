<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="/beranda">DAR.SOCIALMEDIA</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#splash">Home</a></li>
        <?php if (session('name') != null || session('name') != '') {
          echo " <li><a class='getstarted scrollto' href='/'>+ Post</a></li>";
          echo " <li><a class='getstarted scrollto' href='/logout'>+ Logout</a></li>";
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