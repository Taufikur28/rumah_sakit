<?php
include "../pasien/koneksi.php";

if (isset($_POST['kirim'])) {
    $email        = $_POST['email'];
    $pass         = $_POST['pass'];

    $simpan = "INSERT INTO admin (email, pass)
        VALUES ('$email', '$pass')";

    $result = mysqli_query($conn, $simpan);

    if ($result) {
        echo "<script>alert('Data Telah Berhasil Disimpan');window.location='admin.php'</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}

