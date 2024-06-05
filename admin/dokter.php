<?php
session_start();
if ($_SESSION['username'] == null) {
	header('location:../login.php');
}
include '../koneksi.php'; // Pastikan file koneksi ada dan benar

// Memeriksa apakah koneksi berhasil
if ($koneksi === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Menjalankan kueri
$sql = "SELECT * FROM tb_dokter";
$result = mysqli_query($koneksi, $sql);
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
  .tambah{
            margin-bottom: 5px;
            float: left;
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #0c0c0c;
        }
        .btn-edit,
        .btn-hapus{
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .btn-edit{
            background-color: #27ff6f;
        }
        .btn-hapus{
            background-color: #ff1111;
        }
</style>
</head>
<body>
  <?php
  include 'navbar.php';
  ?>
<div class="content">
  <h1>Data Dokter</h1>
  <a class="tambah" href="dokter-input.php">Tambah</a>
  <table>
    <thead>
      <tr>
        <th>Nama Dokter</th>
        <th>Jumlah Janji</th>
        <th>Gaji</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
			if (mysqli_num_rows($result) == 0) {
                echo "
                <tr>
                    <td colspan='4' align='center'>Data Kosong</td>
                </tr>
                ";
            } else {
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$data['nama_dokter']}</td>
                        <td>{$data['jml_janji']}</td>
                        <td>{$data['gaji']}</td>
                        <td>
                            <a class='btn-edit' href='dokter-edit.php?id={$data['id_dokter']}'>Edit</a> 
                            <a class='btn-hapus' href='dokter-delete.php?id={$data['id_dokter']}'>Hapus</a>
                        </td>
                    </tr>
                    ";
                }
            }
			?>
    </tbody>
  </table>
</div>
</body>
</html>
