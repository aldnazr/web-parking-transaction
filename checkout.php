<?php
include 'koneksi.php';
include 'asset.php';
?>

<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<head>
    <title>Checkout</title>
</head>
<!-- <div class="container-fluid">
        <a href="javascript:history back()" class="btn btn-primary">Kembali</a>
    </div> -->

<body>
    <nav class="navbar navbar-expand bg-body-secondary">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="#">Tambah</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="riwayat.php">Riwayat</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <?php
    $id = $_GET['id'];

    $query = mysqli_query($connect, "SELECT * FROM DAFTAR WHERE ID = $id");
    $data = mysqli_fetch_array($query);

    date_default_timezone_set('Asia/Jakarta');
    $Waktu = date("Y-m-d H:i:s");

    $tarifMobil = 10000;
    $tarifMotor = 5000;
    $total = 0;

    $tanggalMasuk = new DateTime($data['waktu_masuk']);
    $tanggalKeluar = new DateTime($Waktu);
    $hitungTanggalWaktu = $tanggalMasuk->diff($tanggalKeluar);
    $waktu_keluar = $Waktu;

    if ($data['waktu_keluar'] > $Waktu) {
        $waktu_keluar = $data['waktu_keluar'];
        $tanggalKeluar = new DateTime($data['waktu_keluar']);
    }

    $totalHari = $hitungTanggalWaktu->d;
    $totalJam = $hitungTanggalWaktu->h;

    $kendaraan = $data['kendaraan'];

    if ($kendaraan == 'Mobil') {
        if ($totalHari >= 1) {
            $total = ($tarifMobil * 2) * $totalHari;
        } else {
            $total = $tarifMobil;
        }
    } else {
        if ($totalHari >= 1) {
            $total = ($tarifMotor * 2) * $totalHari;
        } else {
            $total = $tarifMotor;
        }
    }


    ?>

    <div class="container">
        <form method="POST" action="./API/bayar.php">
            <input name="id" class="hidden-input" type="text" value="<?php echo $data['id']; ?>" readonly>
            <div class="mb-3">
                <label class="form-label">Karcis</label>
                <input name="karcis" class="form-control" type="text" value="<?php echo $data['karcis']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Plat</label>
                <input name="plat" class="form-control" type="text" value="<?php echo $data['plat']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe kendaraan</label>
                <input name="kendaraan" class="form-control" type="text" value="<?php echo $data['kendaraan']; ?>"
                    readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Waktu Masuk</label>
                <input name="waktu_masuk" class="form-control" type="datetime-local"
                    value="<?php echo $data['waktu_masuk']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Waktu Keluar</label>
                <input name="waktu_keluar" class="form-control" type="datetime-local"
                    value="<?php echo $waktu_keluar ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah yang harus dibayar</label>
                <input type="number" class="form-control" name="total" value="<?php echo $total ?>" readonly>
            </div>
            <p class="text-danger">
                <?php echo "* " . $totalHari . " Hari " . $totalJam . " Jam"; ?>
            </p>
            <input type="submit" class="btn btn-primary" value="Checkout">
        </form>
    </div>

</body>

</html>