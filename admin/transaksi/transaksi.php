<style type="text/css">
    /*div.dataTables_wrapper {
        width: 375px;
        margin: 0 auto;
    }*/
</style>
<table id="example" class="mdl-data-table mdl-cell--12-col  " style="width:100%">
    <thead>
        <tr>
            <th>Id Tansaksi</th>
            <th>Username</th>
            <th>Total Transaksi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $conn->query("SELECT * FROM transaksi JOIN users using(username) order by Id_transaksi desc");
        while ($data = $query->fetch_assoc()) {
            ?>
        <tr>
            <!-- <td><img width="50px" src="produk_foto/<?= $data['foto_produk']; ?>"></td> -->
            <td><?= $data['Id_transaksi']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td>Rp. <?= number_format($data['total_transaksi']); ?></td>
            <td><a href="?halaman=transaksi_detail&id=<?= $data['Id_transaksi']; ?>"><button class="mdl-button mdl-color--blue-500 mdl-color-text--white"><i class="material-icons">info</i> Detail</button></a></td>
        </tr>
            <?php
        }
        ?>
    </tbody>
</table>