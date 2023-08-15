<?php
include 'koneksi.php';
include 'asset.php';
?>

<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<head>
    <title>Tambah</title>
</head>

<body>
    <div class="sidenav">
        <h4>Pencatatan<br>Parkir</h4>
        <a href="index.php"><i class="fa-solid fa-house"></i>Home</a>
        <a href=" riwayat.php" class="active"><i class="fa-solid fa-clock-rotate-left"></i>Riwayat</a>
    </div>

    <div class="main">
        <nav class="navbar navbar-expand bg-body-secondary">
            <div class="container-fluid">
                <br>
                <form method="POST" class="d-flex" role="search">
                    <input class="form-control me-2" name="pencarian" type="text" placeholder="Pencarian">
                    <button class="btn btn-outline-info" type="submit" name="tombolCari">Cari</button>
                </form>
            </div>
        </nav>
    </div>

    <div class="main1">
        <br>

        <div class="container-fluid">
            <div class="col-xl">
                <table border="1" class="table">
                    <thead>
                        <tr class="table">
                            <th>Id</th>
                            <th>Karcis</th>
                            <th>Plat</th>
                            <th>Tipe kendaraan</th>
                            <th>Waktu masuk</th>
                            <th>Waktu keluar</th>
                            <th>Total bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT b.id AS id,karcis,plat,kendaraan,waktu_masuk,a.waktu_keluar,total FROM daftar a JOIN checkout b ON a.id = b.id_masuk";

                        if (isset($_POST['cari'])) {
                            $cariKarcis = $_POST['cariKarcis'];
                            $sql = "SELECT b.id AS id,karcis,plat,kendaraan,waktu_masuk,waktu_keluar,total FROM daftar a JOIN checkout b ON a.id = b.id_masuk where a.PLAT like '%$cariKarcis%' OR a.PLAT like '%$cariKarcis%'";
                        }

                        $query = mysqli_query($connect, $sql);
                        if ($query->num_rows > 0) {

                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td scope="row">
                                        <?php echo $data['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['karcis']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['plat']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['kendaraan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['waktu_masuk']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['waktu_keluar']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['total']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else { ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>