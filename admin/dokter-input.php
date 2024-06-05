<?php
session_start();
if ($_SESSION['username'] == null) {
	header('location:login.php');
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
    <h1>Edit Data Dokter</h1>
        <form action="dokter-proses.php" method="post">
            <label for="nama">Nama Dokter :</label>
            <input type="text" id="nama" name="nama" required>

            <label for="jumlah">Jumlah Janji :</label>
            <input type="number" id="jumlah" name="jumlah" required>

            <label for="gaji">Gaji :</label>
            <input type="number" id="gaji" name="gaji" required>

            <button type="submit" class="simpan" name="simpan">Simpan</button>
        </form>
    </div>
</body>
</html>
