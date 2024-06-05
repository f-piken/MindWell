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
$sql = "SELECT * FROM tb_janji";
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
            margin-right: 10px;
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
  <h1>Data Janji Dokter</h1>
  <a class="tambah" href="janji-input.php">Tambah</a>
    <a class="tambah" href="janji-laporan.php">Laporan</a>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Dokter</th>
        <th>Nama Pasien</th>
        <th>Tanggal Janji</th>
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
              $i = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>{$i}</td>
                        <td>{$data['nama_dokter']}</td>
                        <td>{$data['nama_pasien']}</td>
                        <td>{$data['tgl_periksa']}</td>
                        <td>
                            <a class='btn-edit' href='janji-edit.php?id={$data['id_janji']}'>Edit</a> 
                            <a class='btn-hapus' href='janji-hapus.php?id={$data['id_janji']}'>Hapus</a>
                        </td>
                    </tr>
                    ";
                    $i++;
                }
            }
			?>
    </tbody>
  </table>
</div>
</script>
</body>
</html>
