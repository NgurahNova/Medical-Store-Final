<?php
session_start();
if ($_SESSION['role'] != "admin") {
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Store</title>
    <link rel="stylesheet" href="../store.css" />
</head>


<body>
    <!-- navbar -->
    <div class="sticky-top">
        <header class="header">
            <img src="../img/logo.png" alt="logo">
            <nav class="navbar">
                <a href="index.php?page=produk">Produk</a>
                <a href="index.php?page=pesanan">Pesanan</a>
                <a href="../logout.php?page=logout">Logout</a>
            </nav>

        </header>
    </div>
    <!-- navbar end -->

    <!-- ISI -->
    <div class="container flex-grow-1" id="content">
        <div class="col p-3 h-100">
            <div class="p-3 table-responsive">
                <?php
                include "../sql.php";
                $halaman = isset($_GET['page']) ? $_GET['page'] : 'produk';

                switch ($halaman) {
                    case 'pesanan':
                        include('pesanan.php');
                        break;
                    case 'pesanan-del':
                        include('pesanan-del.php');
                        break;
                    case 'produk-add':
                        include('produk-add.php');
                        break;
                    case 'produk-edt':
                        include('produk-edt.php');
                        break;
                    case 'produk-del':
                        include('produk-del.php');
                        break;
                    default:
                        include('produk.php');
                        break;
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <!-- ISI END -->

    <!-- footer -->
    <footer>

        Copyright &copy; TokoObatWistika 2045 menuju Indonesia Maju

    </footer>
    <!-- Footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>