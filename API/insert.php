<?php
include '../koneksi.php';

$response = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $karcis = $_POST['karcis'];
    $plat = $_POST['plat'];
    $kendaraan = $_POST['kendaraan'];

    // Set tanggal waktu sekarang
    date_default_timezone_set('Asia/Jakarta');
    // $tanggalHariIniString = date("d-M-Y H:i:s");
    $tanggalHariIniString = date("Y-m-d H:i:s");
    $stringKeWaktu = strtotime($tanggalHariIniString);
    $Waktu = date("Y-m-d H:i:s", $stringKeWaktu);

    $sql = "INSERT INTO daftar (karcis,plat,kendaraan,status,waktu_masuk) VALUES ('$karcis','$plat','$kendaraan','Aktif','$Waktu')";

    if ($connect->query($sql) == true) {
        echo "
        <script>
            alert('Data berhasil disimpan');
            document.location.href='../tambah.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal disimpan');
            document.location.href='../tambah.php';
        </script>";
    }
}

?>