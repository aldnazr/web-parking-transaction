<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'db_uas';

$connect = new mysqli($servername, $username, $password, $database);

if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}
?>