<?php
$Id = $_GET['Id'];

$query = $conn->query("SELECT * FROM produk WHERE kode_produk = '$Id'");
$data = $query->fetch_assoc();
?>

<!-- Textfield with Floating Label -->

<form method="POST" enctype="multipart/form-data">
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="kode" value="<?= $data['kode_produk'] ?>">
    <label class="mdl-textfield__label" for="sample3">Kode Produk</label>
  </div>
  <?php
  if (empty($data['foto_produk'])) {
  	# code...
  	// echo "kosong";
  	?>
  	<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  		<input class="mdl-textfield__input" type="file" name="foto">
  	</div>
  	<?php
  } else {
  	# code...
  	// echo "tidak";
  	?>
  	<div class="mdl-cell mdl-cell--12-col">
  		<img src="produk_foto/<?= $data['foto_produk'] ?>" width="100px">
  	</div>
  	<div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  		<input class="mdl-textfield__input" type="file" name="foto">
  	</div>
  	<?php
  }
  
  ?>
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="nm" value="<?= $data['nama_produk'] ?>">
    <label class="mdl-textfield__label" for="sample3">Nama Produk</label>
  </div>
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="hrg" value="<?= $data['harga_produk'] ?>">
    <label class="mdl-textfield__label" for="sample3">Harga Produk</label>
  </div>

  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <textarea id="editor" name="des"><?= $data['deskripsi'] ?></textarea>
  </div>
  <!-- Colored raised button -->
<input type="submit" name="submit" class="mdl-cell mdl-cell--12-col mdl-button mdl-js-button mdl-button--raised mdl-button--colored" value="submit">
</form>

<?php
if (isset($_POST['submit'])) {
	
	$kode = $_POST['kode'];
	$des = $_POST['des'];

	$nm_foto = $_FILES['foto']['name'];
  	$lokasi =$_FILES['foto']['tmp_name'];

	$nm = $_POST['nm'];
	$hrg = $_POST['hrg'];

	$foto = "produk_foto/".$nm_foto;
	move_uploaded_file($lokasi, $foto);


	if ($_FILES['foto']['name'] == "") {
		# code...

		$query = $conn->query("UPDATE produk SET kode_produk = '$kode',
			nama_produk = '$nm',
			harga_produk =  '$hrg',
			deskripsi = '$des'  WHERE kode_produk = '$Id'");
		if ($query) {
			?>
			<script type="text/javascript">
				alert("berhasil"); document.location = "?halaman=produk";
			</script>
			<?php
		} else {
			# code...
			?>
			<script type="text/javascript">
				alert("Gagal"); document.location = "?halaman=produk";
			</script>
			<?php
		}

	} else {
		$query = $conn->query("SELECT * FROM produk WHERE kode_produk='$Id'");
		$data = $query->fetch_assoc();
		$fotoproduk = $data['foto_produk'];
		if (file_exists("produk_foto/$fotoproduk"))
		{
			unlink("produk_foto/$fotoproduk");
		}
		
		$query = $conn->query("UPDATE produk SET kode_produk = '$kode',
			foto_produk = '$nm_foto',
			nama_produk = '$nm',
			harga_produk =  '$hrg',
			deskripsi = '$des' WHERE kode_produk = '$Id'");
		if ($query) {
			?>
			<script type="text/javascript">
				alert("berhasil"); document.location = "?halaman=produk";
			</script>
			<?php
		} else {
			# code...
			?>
			<script type="text/javascript">
				alert("Gagal"); document.location = "?halaman=produk";
			</script>
			<?php
		}

	}
	

}
?>