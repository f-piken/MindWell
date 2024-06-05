<?php 
include '../koneksi.php';

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $pasien = $_POST['pasien'];
    $tanggal = $_POST['tanggal'];

    var_dump($nama, $pasien, $tanggal);

    $sql = "INSERT INTO tb_janji VALUES(NULL, '$nama', '$pasien', '$tanggal')";

    if(empty($nama) || empty($pasien)|| empty($tanggal)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'janji-input.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Categories Berhasil Ditambahkan');
                window.location = 'janji.php'
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'janji-input.php'
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $pasien = $_POST['pasien'];
    $tanggal = $_POST['tanggal'];

    $sql = "UPDATE tb_janji SET 
            nama_dokter = '$nama',
            nama_pasien = '$pasien',
            tgl_periksa = '$tanggal'
            WHERE id_janji = $id 
            ";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Categories Berhasil Diubah');
                window.location = 'janji.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'janji-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_janji WHERE id_janji = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    

    $sql = "DELETE FROM tb_janji WHERE id_janji = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Categories Berhasil Dihapus');
                window.location = 'janji.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Categories Gagal Dihapus');
                window.location = 'janji.php';
            </script>
        ";
    }
}else {
    header('location: janji.php');
}
