<!-- Textfield with Floating Label -->

<form method="POST" enctype="multipart/form-data">
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="kode">
    <label class="mdl-textfield__label" for="sample3">Kode Produk</label>
  </div>
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="file" name="foto">
  </div>
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="nm">
    <label class="mdl-textfield__label" for="sample3">Nama Produk</label>
  </div>
  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="hrg">
    <label class="mdl-textfield__label" for="sample3">Harga Produk</label>
  </div>

  <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <textarea id="editor" name="des"></textarea>
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

	$query = $conn->query("INSERT into produk (kode_produk,foto_produk,nama_produk,harga_produk, deskripsi) VALUES ('$kode', '$nm_foto', '$nm', '$hrg', '$des')");
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
?>