<?php
include "../pasien/koneksi.php";
if (isset($_POST['pesan'])){
    $nama           = $_POST['nama'];
    $nama_obat      = $_POST['nama_obat'];
    $harga          = $_POST['harga'];
    $alamat         = $_POST['alamat'];
    

    $simpan = "INSERT INTO pemesanan (
        nama,nama_obat, harga, alamat)
        VALUES ('$nama', '$nama_obat','$harga', '$alamat')";

    $result = mysqli_query($conn, $simpan);

    if ($result){
        echo "<script>alert('Data Telah Berhasil Di Simpan');window.location='data_obat_usr.php'</script>";
    }
}
?>

