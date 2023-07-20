<?php
include '../koneksi.php';
$id = $_POST['id'];
$waktu_keluar = $_POST['waktu_keluar'];
$total = $_POST['total'];

$sql = "INSERT INTO CHECKOUT (id_masuk,total) values ('$id','$total')";
$update = "UPDATE DAFTAR SET STATUS = 'Lunas', WAKTU_KELUAR = '$waktu_keluar' WHERE ID = '$id'";
$connect->query($sql);
$connect->query($update);
echo "
    <script>
    alert('Berhasil dibayar');
    document.location.href='../index.php';
    </script>";
?>