<?php
session_start();
include "sql.php";

$notification = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password-2'];
  $role = "Customer";

  if ($password === $password2) {
    $key = "primakara";
    $hashedpassword = hash_hmac("sha256", $password, $key);

    $notification = "Registrasi berhasil!";
    $reset = "alter table user AUTO_INCREMENT = 1";
    $query = mysqli_query($con, $reset);
    $result = mysqli_query($con, "INSERT INTO user (role, username, password) VALUES ('$role','$username','$hashedpassword')");

    if (!$result) {
      $notification = "Gagal melakukan registrasi.";
    }
  } else {
    $notification = "Password tidak cocok!";
  }
}
header("Location: index.php?notification=" . urlencode($notification));
exit(); // Pastikan untuk keluar setelah melakukan redirect
?>