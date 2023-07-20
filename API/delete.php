<?php
include '../koneksi.php';

$id = $_GET['id'];

$connect->query("DELETE FROM DAFTAR WHERE ID = '$id'");
echo "
    <script>
    alert('Data berhasil dihapus');
    document.location.href='../index.php';
    </script>";
?>