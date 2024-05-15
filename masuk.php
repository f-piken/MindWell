<?php
// Mulai sesi
session_start();

// Ambil input email dan password dari formulir
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Simulasi basis data untuk menyimpan email dan password
// Dalam kasus nyata, Anda harus mengambil informasi ini dari basis data
$stored_email = isset($_SESSION['email']) ? $_SESSION['email'] : $email;
$stored_password = isset($_SESSION['password']) ? $_SESSION['password'] : $password;

// Verifikasi email dan password
if ($email === $stored_email && $password === $stored_password) {
    // Set session variables
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    // Redirect ke halaman setelah login berhasil
    header("Location: home.html");
    exit();
} else {
        echo "<script>const userResponse = window.confirm('Email atau Password Salah. Apakah Anda ingin mencoba lagi?');
        if (userResponse) {
            window.open('home.html');
        } else {
            console.log('Pengguna memilih untuk tidak mencoba lagi.');
        }</script>";
}
?>
