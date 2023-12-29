<?php
session_start(); // Mulai session

include "sql.php"; // Pastikan file sql.php sudah mencakup koneksi database

// Pastikan koneksi ke database ($con) sudah didefinisikan di sql.php
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_user = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pesanan = $_POST["id_pesanan"];
    $action = $_POST["action"];

    if ($action == "decrease") {
        // Pastikan $con sudah didefinisikan dan merupakan objek mysqli
        if ($con && $con instanceof mysqli) {
            // Logika pengurangan quantity di sini
            mysqli_query($con, "UPDATE detailpesanan SET jumlah = jumlah - 1 WHERE id_pesanan = $id_pesanan AND jumlah > 1");
        }
    } elseif ($action == "increase") {
        // Pastikan $con sudah didefinisikan dan merupakan objek mysqli
        if ($con && $con instanceof mysqli) {
            // Mendapatkan stok produk dari database
            $stok_result = mysqli_query($con, "SELECT stok FROM produk WHERE id_produk = (SELECT id_produk FROM detailpesanan WHERE id_pesanan = $id_pesanan)");
            $stok_data = mysqli_fetch_assoc($stok_result);

            // Jika stok masih tersedia, tambahkan quantity
            if ($stok_data['stok'] > 0) {
                mysqli_query($con, "UPDATE detailpesanan SET jumlah = jumlah + 1 WHERE id_pesanan = $id_pesanan");
            } else {
                // Jika stok habis, Anda bisa memberikan pesan atau tindakan lainnya
                echo "Stok habis, tidak dapat menambahkan lebih banyak item.";
            }
        }
    }

    // Redirect kembali ke halaman keranjang setelah memproses form
    header("Location: index.php?page=keranjang");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="keranjang.css" />
    <title>Keranjang</title>
</head>

<body>
    <div class="countiner">
        <h2>Checkout</h2>
        <form method="post" action="keranjang.php">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th colspan="2">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $que = "SELECT * FROM detailpesanan 
                        JOIN pesanan ON pesanan.id_pesanan = detailpesanan.id_pesanan
                        JOIN user ON user.id_user = pesanan.id_user 
                        JOIN produk ON produk.id_produk = detailpesanan.id_produk 
                        WHERE pesanan.id_user = $id_user
                        ORDER BY pesanan.id_pesanan";

                        $select = mysqli_query($con, $que);
                        $dana = 0;
                        $nomor = 0;

                        while ($data = mysqli_fetch_array($select)) {
                            $nomor = $nomor + 1;
                        ?>
                        <tr>
                            <td><?php echo $data['nama_produk']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['tanggal_pesanan']; ?></td>
                            <td><?php echo "Rp. " . number_format($data['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <?php
                                    $total = $data['jumlah'] * $data['harga'];
                                    $total_format = number_format($total, 0, ',', '.');
                                    echo "Rp. " . $total_format;
                                    $dana = $dana + $total;
                                    ?>
                            </td>
                            <td>
                                <a href="index.php?page=pesanan-del&id=<?php echo $data['id_pesanan']; ?>"><button
                                        type="button" class="tbn">Delete</button></a>
                            </td>
                            <td>
                                <form method="post" action="keranjang.php"
                                    onsubmit="return validateQuantity(this, <?php echo $data['stok']; ?>)">
                                    <input type="hidden" name="id_pesanan" value="<?php echo $data['id_pesanan']; ?>">
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" class="quantity-button">-</button>
                                    <button type="submit" class="quantity-button" name="action"
                                        value="increase">+</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <td>
                    <?php echo "<b>Total Semua Pesanan</b> Rp. " . number_format($dana, 0, ',', '.'); ?>
                </td>
            </div>
        </form>
    </div>
    <footer>Copyright &copy; TokoObatWistika 2045 menuju Indonesia Maju</footer>

    <script>
    function validateQuantity(form, maxStock) {
        var action = form.querySelector('input[name="action"]').value;
        var quantity = parseInt(form.querySelector('span').innerText);

        if (action === "increase" && quantity >= maxStock) {
            alert("Stok habis, tidak dapat menambahkan lebih banyak item.");
            return false;
        }

        return true;
    }
    </script>
</body>

</html>