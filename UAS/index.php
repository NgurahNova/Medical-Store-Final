<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Medical</title>
  <style>
    .notification {
      background-color: #f2f2f2;
      color: #333;
      padding-top: 100px;
      border-left: 5px solid #367cff;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="sticky-top">
    <header class="header">
      <?php
      session_start();
      if (!isset($_SESSION['status'])) {
        ?>
        <img src="./img/logo.png" alt="logo">
        <nav class="navbar">
          <a href="index.php?page=login">Login</a>
          <a href="index.php?page=register">Register</a>
        </nav>
        <?php
      } else if ($_SESSION['status'] == "login") {
        $user = $_SESSION['username'];
        ?>
          <a href="index.php?page=store"><img src="./img/logo.png" alt="logo"></a>
          <nav class="navbar">
            <a href="index.php?page=store">Store</a>
            <a href="index.php?page=keranjang">Checkout</a>
            <a href="index.php?page=logout">Logout</a>
          </nav>
        <?php
      }
      ?>
    </header>
  </div>
  <!-- navbar end -->

  <?php
  //notifikasi register
  if (isset($_GET['notification'])) {
    $notification = urldecode($_GET['notification']);
    echo '<div id="notification" class="notification">' . $notification . '</div>';
  }
  ?>

  <div>
    <?php
    include "./sql.php";
    $halaman = isset($_GET['page']) ? $_GET['page'] : 'login';

    switch ($halaman) {
      case 'store':
        include('Store.php');
        break;
      case 'logout':
        include('logout.php');
        break;
      case 'keranjang':
        include('keranjang.php');
        break;
      case 'detail-produk':
        include('product-details.php');
        break;
      case 'register':
        include('register-page.php');
        break;
      case 'pesanan-add':
        include('pesanan-add.php');
        break;
      case 'pesanan-del':
        include('pesanan-del.php');
        break;
      default:
        include('Login-Page.php');
        break;
    }
    ?>
  </div>

  <script>
    // Hilangkan notifikasi setelah beberapa detik
    setTimeout(function () {
      document.getElementById('notification').style.display = 'none';
    }, 2000);
  </script>

</body>

</html>