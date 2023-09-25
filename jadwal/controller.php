<?php
include "../pasien/koneksi.php";

if (isset($_POST['kirim'])) {
    $id = $_POST['id_dokter'];
    $nama = $_POST['nama'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];

    $simpan = "INSERT INTO jadwal (id, nama, hari, jam)
        VALUES ('$id', '$nama', '$hari', '$jam')";

    $result = mysqli_query($conn, $simpan);

    if ($result) {
        echo "<script>alert('Data Telah Berhasil Disimpan');window.location='data_jadwal.php'</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}

