<?php
include '../koneksi.php';

$id = $_POST['id'];
$karcis = $_POST['karcis'];
$plat = $_POST['plat'];
$kendaraan = $_POST['kendaraan'];
$waktu_masuk = $_POST['waktu_masuk'];
$waktu_keluar = $_POST['waktu_keluar'];

// Set tanggal waktu sekarang
date_default_timezone_set('Asia/Jakarta');
// $tanggalHariIniString = date("d-M-Y H:i:s");
$tanggalHariIniString = date("Y-m-d H:i:s");
$stringKeWaktu = strtotime($tanggalHariIniString);
$Waktu = date("Y-m-d H:i:s", $stringKeWaktu);

$sql = "UPDATE DAFTAR SET karcis = '$karcis',plat = '$plat',kendaraan = '$kendaraan',status = 'Aktif',waktu_masuk = '$waktu_masuk', waktu_keluar = '$waktu_keluar' where id = $id";

if ($connect->query($sql) == true) {
    echo "
    <script>
    alert('Data berhasil disimpan');
    document.location.href='../index.php';
    </script>";
} else {
    echo "
    <script>
    alert('Data gagal disimpan');
    document.location.href='../update.php';
    </script>";
}

?>