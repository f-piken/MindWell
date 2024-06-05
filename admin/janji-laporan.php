<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tb_janji");
$html = '
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #444;
        color: #fff;
    }
    h3 {
        margin: 0;
        padding: 0;
    }
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
';
$html .= '<center><h3>Data Janji Dokter</h3></center><hr/><br>';
$html .= '<table width="100%">
            <tr>
                <th>NO</th>
                <th>Nama Dokter</th>
                <th>Nama Pasien</th>
                <th>Tanggal Periksa</th>
            </tr>';
$no = 1;
while ($penjualan = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $penjualan['nama_dokter'] . "</td>
                <td>" . $penjualan['nama_pasien'] . "</td>
                <td>" . $penjualan['tgl_periksa'] . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-transaksi.pdf');
?>
