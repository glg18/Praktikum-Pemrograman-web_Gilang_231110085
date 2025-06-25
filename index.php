<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4">Daftar Transaksi Penjualan</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Transaksi</a>
    <table class="table table-bordered table-striped" id="tabelPenjualan">
        <thead class="table-primary text-center">
            <tr>
                <th>No</th><th>Tanggal</th><th>Pelanggan</th><th>Total</th><th>Metode</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include 'koneksi.php';
        $data = mysqli_query($conn, "SELECT * FROM penjualan");
        $no = 1;
        while($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['tanggal'] ?></td>
                <td><?= $d['nama_pelanggan'] ?></td>
                <td><?= number_format($d['total_pembelian'], 0, ',', '.') ?></td>
                <td><?= $d['metode_pembayaran'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $d['id_transaksi'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $d['id_transaksi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabelPenjualan').DataTable();
    });
</script>
</body>
</html>
