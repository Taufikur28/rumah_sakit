<?php
include 'config/controller.php';
include '../layout/header_adm.php';

session_start();
if(!isset($_SESSION['email_admin'])){
    header("location: ../login/signin.php");
}

$data_dokter = select("SELECT * FROM data_dokter");

// Mengambil kata kunci pencarian dari URL jika ada
$searchTerm = $_GET['search'] ?? '';

// Query untuk mencari data pasien berdasarkan nama
$query = "SELECT * FROM data_dokter WHERE nama LIKE '%$searchTerm%'";
$data_dokter = select($query);

?>

<div class="container mt-5">
    <h1>Data Dokter</h1>
    <hr>
    <a href="tambah_dokter.php" class="btn btn-warning mb-1" style="float: right;"> Tambah</a>
    
    <!-- Form pencarian -->
    <form class="d-flex">
                <input type="text" class="form-control me-2" placeholder="Search by nama" name="search" value="<?= $searchTerm ?>" style="width: 10%;">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <th>No</th>
            <th>ID</th>
            <th>Nama Dokter</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Spesialisasi</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Password</th>
            <th>Foto</th>
            <th>Aksi</th>

        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_dokter as $dokter) : ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dokter['id']; ?></td>
                    <td><?= $dokter['nama']; ?></td>
                    <td><?= $dokter['tempat_lahir']; ?></td>
                    <td><?= $dokter['tanggal_lahir']; ?></td>
                    <td><?= $dokter['umur']; ?></td>
                    <td><?= $dokter['jns_kel']; ?></td>
                    <td><?= $dokter['alamat']; ?></td>
                    <td><?= $dokter['spesialisasi']; ?></td>
                    <td><?= $dokter['notelp']; ?></td>
                    <td><?= $dokter['email']; ?></td>
                    <td><?= $dokter['pass']; ?></td>
                    <td>
                        <?= "<img src='uploads/" . $dokter['foto'] . "' width='200' height='auto'>"; ?>
                    </td>

                    <td width="15%" class="text-center">
                        <a href="ubah_dokter.php?id=<?= $dokter['id']; ?>" class="btn btn-success">Rubah</a>
                        <a href="hapus_dokter.php?id=<?= $dokter['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">Hapus</a>
                        <a href="../jadwal/tambah_jadwal.php?id=<?= $dokter['id']; ?>" class="btn btn-secondary">Jadwal</a>
                    </td>


                </tr>
        </tbody>
    <?php endforeach; ?>
    </table>
    
    <div>
        <a href="../layout/sidebar/sidebar.php" class="btn btn-danger mb-3">Kembali</a>
    </div>
</div>



<?php
include '../layout/footer_adm.php';
?>