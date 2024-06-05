<?php
include '../koneksi.php';
$id = $_GET['id'];
if(!isset($_GET['id'])) {
  echo "
    <script>
      alert('Tidak ada ID yang Terdeteksi');
      window.location = 'janji.php';
    </script>
  ";
}

$sql = "SELECT * FROM tb_janji WHERE id_janji = '$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

session_start();
if ($_SESSION['username'] == null) {
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
  .btn-no,
  .btn-yes{
      margin-top: 15px;
      border: none;
      color: #fff;
      padding: 5px 15px;
      border-radius: 5px;
      font-size: 20px;
      cursor: pointer;
    }
    .btn-no{
       background-color: #27ff6f;
    }
    .btn-yes{
      background-color: #ff1111;
    }
</style>
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="content">
        <h1>Hapus Data janji</h1>
        <div>
            <h4>Ingin Menghapus Data ?</h4>
            <form action="janji-proses.php" method="post" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?= $data['id_janji'] ?>">
              <button type="submit" class="btn-yes" name="hapus">Yes</button>
	          <button type="submit" class="btn-no" name="tidak">No</button>
            </form>
        </div>
    </div>
</body>
</html>
