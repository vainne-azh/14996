<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namabarang = $_POST['namabarang'];
    $satuan     = $_POST['satuan'];
    $jumlah     = $_POST['jumlah'];
    $harga     = $_POST['harga'];
    $jenis     = $_POST['jenis'];

    $stmt = $pdo->prepare("INSERT INTO items (namabarang, satuan, jumlah, harga, jenis) VALUES (:namabarang, :satuan, :jumlah, :harga, :jenis)");
    $stmt->execute(['namabarang' => $namabarang, 'satuan' => $satuan, 'jumlah' => $jumlah, 'harga' => $harga, 'jenis' => $jenis]);

    header("Location: index.php");
    exit;
}
