
<a href="?halaman=produk_tambah" class="mdl-cell mdl-cell--2-col mdl-button mdl-color--blue-500 mdl-color-text--white">tambah produk</a>
<table id="example" class="mdl-data-table mdl-cell--12-col  " style="width:100%">
    <thead>
        <tr>
            <th>foto</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $conn->query("SELECT * FROM produk order by Id desc");
        while ($data = $query->fetch_assoc()) {
            ?>
        <tr>
            <td><img width="50px" src="produk_foto/<?= $data['foto_produk']; ?>"></td>
            <td><?= $data['kode_produk']; ?></td>
            <td><?= $data['nama_produk']; ?></td>
            <td><?= $data['harga_produk']; ?></td>
            <td>
                <a href="?halaman=produk_edit&Id=<?= $data['kode_produk']; ?>"><button class="mdl-button mdl-color--blue-500 mdl-color-text--white"><i class="material-icons">edit</i></button> </a>
                <a href="?halaman=produk_delete&Id=<?= $data['kode_produk']; ?>"><button class="mdl-button mdl-color--red-500 mdl-color-text--white"><i class="material-icons">delete</i> </button></a>
            </td>
        </tr>
            <?php
        }
        ?>
    </tbody>
</table>