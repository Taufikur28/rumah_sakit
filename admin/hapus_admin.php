<?php
include "../pasien/koneksi.php";

function deleteData($id)
{
    global $conn;

    $query = "DELETE FROM admin WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    if (deleteData($id)) {
        echo "<script>
        alert('Data Berhasil Dihapus');
        window.location.href = 'admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Dihapus');
        window.location.href = 'admin.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID Jadwal tidak ditemukan');
    window.location.href = 'admin.php';
    </script>";
}
?>
