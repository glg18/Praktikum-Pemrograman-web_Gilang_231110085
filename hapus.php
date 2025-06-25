<?php
include 'koneksi.php';
$id = $_GET['id'];

if (isset($id)) {
    mysqli_query($conn, "DELETE FROM penjualan WHERE id_transaksi=$id");
}

header("Location: index.php");
exit();
?>
