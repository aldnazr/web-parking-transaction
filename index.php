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
        <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-house-door-fill" viewBox="0 0 20 20">
                <path
                    d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
            </svg>Home</a>
        <a href="riwayat.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-clock-history" viewBox="0 0 20 20">
                <path
                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                <path
                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
            </svg>Riwayat</a>
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
                                            class="btn btn-success btn-sm">Checkout</a>
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