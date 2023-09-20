<?php
session_start();

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['user_name'])) {
    header("Location: index.php"); // Redirect ke halaman login jika belum masuk
    exit();
}
