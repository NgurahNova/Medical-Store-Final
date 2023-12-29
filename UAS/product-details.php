<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="product-details.css" />
    <title>product details</title>
</head>

<body>
    <?php

  if (isset($_REQUEST['id'])) {

    $id = $_REQUEST['id'];

    $result = mysqli_query($con, "SELECT * FROM produk WHERE id_produk=$id");

    while ($data = mysqli_fetch_array($result)) {
      $nama = $data['nama_produk'];
      $deskripsi = $data['deskripsi_produk'];
      $uang = $data['harga'];
      $uang_format = number_format($uang, 0, ',', '.');
      $gambar = $data['gambar'];
      $stok = $data['stok'];
    }

    ?>

    <form action="index.php?page=pesanan-add" method="post">
        <div class="product-details">
            <div class="product-image">
                <img src="./obat/<?php echo $gambar; ?>" alt="" />
            </div>
            <div class="product-info">
                <h2>
                    <?php echo $nama; ?>
                </h2>
                <p>
                    <?php echo "Rp. " . $uang_format; ?>
                </p>
                <div class="deskripsi">
                    <?php echo $deskripsi; ?>
                </div>
                <div class="stock">Stock :
                    <?php echo $stok; ?>
                </div>
                <div class="quantity-control">
                    <form>
                        <input type="hidden" name="id_produk" value="<?php echo $id; ?>">
                        <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                        <input type="hidden" name="stok" value="<?php echo $stok; ?>">

                        <button onclick="decreaseQuantity(event)">-</button>
                        <label for="quantity"></label>
                        <input type="text" id="quantity" name="quantity" data-stok="<?php echo $stok; ?>" value="1" />
                        <button onclick="increaseQuantity(event)">+</button>
                        <button class="keranjang" type="submit" name="submit">Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    </form>
    <?php } ?>
    <script>
    function increaseQuantity(event) {
        event.preventDefault();
        var quantityInput = document.getElementById("quantity");
        var currentValue = parseInt(quantityInput.value);
        var maxStock = parseInt(quantityInput.getAttribute("data-stok")); // Mengambil nilai stok dari atribut data-stok

        // Cek apakah nilai input adalah string kosong atau tidak numerik, dan memastikan nilai tidak melebihi stok
        if (!isNaN(currentValue) && currentValue < maxStock) {
            quantityInput.value = currentValue + 1;
        } else if (isNaN(currentValue)) {
            quantityInput.value = 1;
        }
    }

    function decreaseQuantity(event) {
        event.preventDefault();
        var quantityInput = document.getElementById("quantity");
        var currentValue = parseInt(quantityInput.value);

        // Cek apakah nilai input adalah string kosong atau tidak numerik
        if (!isNaN(currentValue) && currentValue > 1) {
            quantityInput.value = currentValue - 1;
        } else {
            quantityInput.value = 1;
        }
    }
    </script>
    <footer>Copyright &copy; TokoObatWistika 2045 menuju Indonesia Maju</footer>
</body>

</html>