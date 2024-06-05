<?php
include '../koneksi.php';
$id = $_GET['id'];
if(!isset($_GET['id'])) {
  echo "
    <script>
      alert('Tidak ada ID yang Terdeteksi');
      window.location = 'categories.php';
    </script>
  ";
}

$sql = "SELECT * FROM tb_janji WHERE id_janji = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

  session_start();
  if($_SESSION['username'] == null) {
      header('location:../login.php');
  }
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
    form {
        display: block;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    
    input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #000;
        border-radius: 4px;
        box-sizing: border-box;
        width: 90%;
    }
    
    .simpan {
        display: block;
        padding: 10px;
        background-color: #0c0c0c;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        float: right;
        margin-right: 10%;
    }
    
    .simpan:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="content">
    <h1>Entry Data janji</h1>
        <form action="janji-proses.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id_janji'] ?>">
            <label for="nama">Nama Dokter :</label>
            <input type="text" id="nama" name="nama" value="<?= $data['nama_dokter'] ?>" required>

            <label for="pasien">Nama Pasien :</label>
            <input type="text" id="pasien" name="pasien" value="<?= $data['nama_pasien'] ?>" required>

            <label for="tanggal">Tanggal :</label>
            <input type="date" id="tanggal" name="tanggal" value="<?= $data['tgl_periksa'] ?>" required>
            
            <button type="submit" class="simpan" name="edit">Simpan</button>
        </form>
    </div>
</body>
</html>
