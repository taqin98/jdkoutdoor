<?php

$Id = $_GET['Id'];

$query = $conn->query("SELECT * FROM produk WHERE kode_produk='$Id'");
$data = $query->fetch_assoc();
$fotoproduk = $data['foto_produk'];
if (file_exists("produk_foto/$fotoproduk"))
{
	unlink("produk_foto/$fotoproduk");
}

$conn->query("DELETE FROM produk WHERE kode_produk='$Id'");

echo "<script>alert('Produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

?>