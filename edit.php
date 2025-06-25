<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4">Edit Transaksi</h2>
<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM penjualan WHERE id_transaksi=$id"));
?>

    <form method="POST" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" value="<?= $data['nama_pelanggan'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Pembelian</label>
            <input type="number" name="total_pembelian" class="form-control" value="<?= $data['total_pembelian'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <select name="metode_pembayaran" class="form-control" required>
                <option value="Tunai" <?= $data['metode_pembayaran'] == 'Tunai' ? 'selected' : '' ?>>Tunai</option>
                <option value="Transfer Bank" <?= $data['metode_pembayaran'] == 'Transfer Bank' ? 'selected' : '' ?>>Transfer Bank</option>
                <option value="E-wallet" <?= $data['metode_pembayaran'] == 'E-wallet' ? 'selected' : '' ?>>E-wallet</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama_pelanggan'];
    $total = $_POST['total_pembelian'];
    $metode = $_POST['metode_pembayaran'];

    mysqli_query($conn, "UPDATE penjualan SET tanggal='$tanggal', nama_pelanggan='$nama',
                         total_pembelian=$total, metode_pembayaran='$metode' WHERE id_transaksi=$id");
    header("Location: index.php");
}
?>
</div>
</body>
</html>
