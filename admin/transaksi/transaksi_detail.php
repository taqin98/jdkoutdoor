<?php
$Id_transaksi = $_GET['id'];
$user = $_SESSION['pelanggan']['username'];

$users = $conn->query("SELECT * FROM transaksi JOIN users ON transaksi.username = users.username WHERE transaksi.Id_transaksi = '$Id_transaksi'");
$data_users = $users->fetch_assoc();


?>
<a href="?halaman=transaksi" class="mdl-button mdl-color--orange-400 mdl-color-text--white mdl-cell mdl-cell--2-col">Kembali</a>
<div style="display: flex;">
	<table border="0" class="mdl-cell mdl-cell--6-col" style="float: left;">
	<tr>
		<td>Id Transaksi</td>
		<td>:</td>
		<td><?= $data_users['Id_transaksi']; ?></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>:</td>
		<td><?= $data_users['nama']; ?></td>
	</tr>
	<tr>
		<td>Nomor Handphone</td>
		<td>:</td>
		<td><?= $data_users['hp']; ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td>:</td>
		<td>Rp. <?= number_format($data_users['total_transaksi']); ?></td>
	</tr>
</table>
	
<table border="0" class="mdl-cell mdl-cell--6-col">
<form method="POST">
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><?= $data_users['ket']; ?></td>
	</tr>
	<tr>
		<td>Action</td>
		<td>:</td>
		<td><select name="ket">
			<option value=""> -- Pilih -- </option>
			<option value="Belum Melakukan Pembayaran">Belum Melakukan Pembayaran</option>
			<option value="Pengecekan">Pengecekan</option>
			<option value="Selesai">Selesai</option>
		</select></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="submit" class="mdl-button mdl-color--red-700 mdl-color-text--white"></td>
	</tr>
</form>
<?php
if (isset($_POST['submit'])) {
	# code...
	$ket = $_POST['ket'];
	$query = $conn->query("UPDATE transaksi set ket = '$ket' WHERE Id_transaksi= '$Id_transaksi'");
	if ($query) {
		?>
		<script type="text/javascript">
			alert("Data Terupdate");
		</script>
		<?php
	} else {
		?>
		<script type="text/javascript">
			alert("Gagal Update");
		</script>
		<?php
	}
	
}
?>
</table>
</div>

<table class="mdl-cell mdl-data-table mdl-cell--12-col">
	<tr bgcolor="orange">
		<td>Bukti Foto</td>
		<td>Kode Produk</td>
		<td>Nama Produk</td>
		<td>Harga Produk</td>
		<td>Hari</td>
		<td>Jumlah</td>
		<td>Subtotal</td>
	</tr>
	<?php
	$sql = $conn->query("SELECT * FROM transaksi_penyewaan WHERE Id_transaksi = '$Id_transaksi'");
	$total = 0;
	while ($data = $sql->fetch_assoc()) {
		$total += $data['sub_total']*$data['hari'];

		?>
		<tr>
			<td>
				<?php 
				if ($data_users['bukti_foto'] == '')
				{
					echo "<strong>BUKTI BELUM DIUPLOAD</strong>";
				}
				else 
				{
					?>
					<img width="100px" width="auto" src="bukti_foto/<?= $data_users['bukti_foto']; ?>"></td>
					<?php
				}
				?>
			<td><?= $data['kode_produk']; ?></td>
			<td><?= $data['nama']; ?></td>
			<td><?= $data['harga']; ?></td>
			<td><?= $data['hari']; ?></td>
			<td><?= $data['jumlah']; ?></td>
			<td>Rp.<?= number_format($data['sub_total']*$data['hari']); ?></td>
		</tr>
		<?php

	}
	?>
	<tfoot>
		<td colspan="5"></td>
		<td><strong>Total</strong></td>
		<td>Rp. <?php echo number_format($total); ?></td>
	</tfoot>
</table>
