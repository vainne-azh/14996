<?php
require 'koneksi.php';
session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

$stmt = $pdo->query("SELECT * FROM items");
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-3">
        <h2 style="text-align: right;">A11.2023.14996 - Fawwaz Azhima Putra</h2>
        <!-- <a href="logout.php" class="btn btn-danger mb-3">Logout</a> -->


        <h3>Tambah Item</h3>
        <form id="form-add" action="create.php" method="POST" class="mb-4">
            <div class="mb-3">
                <input type="text" id="namabarang" name="namabarang" class="form-control" placeholder="Nama Barang" required>
            </div>
            <div class="mb-3">
                <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Satuan" required>
            </div>
            <div class="mb-3">
                <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="mb-3">
                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" required>
            </div>
            <div class="mb-3">
                <input type="text" id="jenis" name="jenis" class="form-control" placeholder="Jenis" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <h3>Daftar Barang</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['id']) ?></td>
                        <td><?= htmlspecialchars($item['namabarang']) ?></td>
                        <td><?= htmlspecialchars($item['satuan']) ?></td>
                        <td><?= htmlspecialchars($item['jumlah']) ?></td>
                        <td><?= htmlspecialchars($item['harga']) ?></td>
                        <td><?= htmlspecialchars($item['jenis']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $item['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus item ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script>
        // Validasi Form Tambah
        document.getElementById('form-add').addEventListener('submit', function(event) {
            const namabarangInput = document.getElementById('namabarang');
            const satuanInput = document.getElementById('satuan');
            const jumlahInput = document.getElementById('jumlah');
            const hargaInput = document.getElementById('harga');
            const jenisInput = document.getElementById('jenis');

            // Validasi input data barang
            if (namabarangInput.value.trim() === '' || satuanInput.value.trim() === '' || jumlahInput.value.trim() === '' || hargaInput.value.trim() === '' || jenisInput.value.trim() === '') {
                alert('Nama item tidak boleh kosong!');
                event.preventDefault(); // Mencegah pengiriman form
                return;
            }

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>