<?php
include 'koneksi.php';
include 'asset.php';
?>

<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<head>
    <title>Home</title>
</head>

<body>
    <div class="sidenav">
        <h4>Pencatatan<br>Parkir</h4>
        <a href="index.php"><i class="fa-solid fa-house"></i>Home</a>
        <a href=" riwayat.php"><i class="fa-solid fa-clock-rotate-left"></i>Riwayat</a>
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
            <a href="tambah.php" class="btn btn-primary">Tambah data</a>
            <br>
            <br>
            <div class="col-xl">
                <table border="1" class="table">
                    <thead>
                        <tr class="table">
                            <th>Id</th>
                            <th>Karcis</th>
                            <th>Plat</th>
                            <th>Tipe kendaraan</th>
                            <th>Waktu masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM DAFTAR where status = 'Aktif'";

                        if (isset($_POST['tombolCari'])) {
                            $pencarian = $_POST['pencarian'];

                            $sql = "SELECT * FROM DAFTAR WHERE KARCIS LIKE '%$pencarian%' OR PLAT LIKE '%$pencarian%' AND status = 'Aktif'";
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
                                        <?php echo $data['kendaraan']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['waktu_masuk']; ?>
                                    </td>
                                    <td>
                                        <a href="update.php?id=<?php echo $data['id']; ?>"
                                            class="btn btn-primary btn-sm">Update</a>
                                        <a href="checkout.php?id=<?php echo $data['id']; ?>"
                                            class="btn btn-secondary btn-sm">Checkout</a>
                                        <a href="./API/delete.php?id=<?php echo $data['id']; ?>"
                                            class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
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