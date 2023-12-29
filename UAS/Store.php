<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="store.css" />
  <title>Store</title>
</head>

<body>
  <!-- search -->
  <div class="container-2">
    <input type="text" name="text" class="box" placeholder="Search" />
  </div>
  <!-- end search -->

  <!-- Card -->
  <div class="store">
    <?php
    $que = "SELECT * FROM produk order by id_produk";
    $select = mysqli_query($con, $que);

    while ($data = mysqli_fetch_array($select)) {
      ?>
      <div class="card">
        <img src="./obat/<?php echo $data['gambar']; ?>" alt="<?php echo $data['gambar']; ?>">
        <div class="card-content">
          <h3>
            <?php echo $data['nama_produk']; ?>
          </h3>
          <p>
            <?php
            $uang = $data['harga'];
            $uang_format = number_format($uang, 0, ',', '.');
            echo "Rp. " . $uang_format;
            ?>
          </p>
          <a href="index.php?page=detail-produk&id=<?php echo $data['id_produk']; ?>"><button class="button"
              type="button">Beli Sekarang</button></a>
        </div>
      </div>
    <?php }
    ; ?>
  </div>
  <!-- card end -->

  <!-- footer -->
  <footer>
    Copyright &copy; TokoObatWistika 2045 menuju Indonesia Maju
  </footer>
  <!-- Footer end -->
  <!-- 
</body>

</html> -->