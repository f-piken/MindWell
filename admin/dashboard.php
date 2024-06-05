<?php
session_start();
if ($_SESSION['username'] == null) {
	header('location:../login.php');
}
// Menghubungkan ke database
include '../koneksi.php';

// Mengambil jumlah data dari tabel tb_janji
$query_janji = "SELECT COUNT(*) AS total_janji FROM tb_janji";
$result_janji = mysqli_query($koneksi, $query_janji);
$data_janji = mysqli_fetch_assoc($result_janji);
$total_janji = $data_janji['total_janji'];

// Mengambil jumlah data dari tabel tb_dokter
$query_dokter = "SELECT COUNT(*) AS total_dokter FROM tb_dokter";
$result_dokter = mysqli_query($koneksi, $query_dokter);
$data_dokter = mysqli_fetch_assoc($result_dokter);
$total_dokter = $data_dokter['total_dokter'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Admin Dashboard</title>
<style>
  .sidebar ul li a{
    font-size: 20px;
  }
  form button{
    border: none;
    background-color: transparent;
    color: #fff;
    font-size: 20px;
    margin-left: 5px;
}
.data{
  display: flex;
}
.widget-box {
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
  margin: 0 10px;
}

.widget-box-header {
  width: 100%;
  background-color: #333;
  color: #fff;
  padding: 10px;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.widget-box-content {
  padding: 10px;
}
.widget-box-content ul li{
  list-style: none;
  font-weight: bold;
  font-size: 20px;
  margin: 20px 0;
}
.garis{
  background-color: #000;
  height: 2px;
}
</style>
</head>
<body>
  <?php
  include 'navbar.php';
  ?>
<div class="content">
  <h1>Selamat Datang Di Admin - Dashboard</h1>
  <div class="data">
    <div class="widget-box">
      <div class="widget-box-header">
        <h2>Data Janji</h2>
      </div>
      <div class="widget-box-content">
        <ul>
          <li>Total Data: <?php echo $total_janji; ?></li>
        </ul>
      </div>
    </div>
    <div class="widget-box">
    <div class="widget-box-header">
        <h2>Data Dokter</h2>
      </div>
      <div class="widget-box-content">
        <ul>
          <li>Total Data: <?php echo $total_dokter; ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</body>
</html>
