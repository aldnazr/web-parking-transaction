<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<head>
    <?php
    include 'asset.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>

<body>
    <nav class="navbar navbar-expand bg-body-secondary">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <button class="nav-link" onclick="goBack()"><i class="fa-solid fa-arrow-left"></i>Kembali</button>
                </li>
            </ul>
        </div>
    </nav>
    <br>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <!-- <div class="container-fluid">
        <a href="javascript:history back()" class="btn btn-primary">Kembali</a>
    </div> -->
    <?php
    $length = 3;
    $randomBytes = random_bytes($length);
    $randomString = bin2hex($randomBytes);
    ?>
    <div class="container">
        <form method="POST" action="./API/insert.php">
            <div class="mb-4">
                <label class="form-label">Karcis</label>
                <input id="karcis" name="karcis" class="form-control" type="text" value="<?php echo $randomString; ?>"
                    readonly>
            </div>
            <div class="mb-4">
                <label class="form-label">Plat</label>
                <input id="plat" name="plat" class="form-control" type="text" placeholder="Masukkan plat kendaraan"
                    required>
            </div>
            <div class="mb-4">
                <label class="form-label">Tipe kendaraan</label>
                <select class="form-select" id="kendaraan" name="kendaraan" required>
                    <option selected disabled value="">Pilih kendaraan</option>
                    <option value="Motor">Sepeda Motor</option>
                    <option value="Mobil">Mobil</option>
                </select>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Tambah">
        </form>
    </div>

</body>

</html>