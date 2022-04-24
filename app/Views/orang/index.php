<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Daftar Orang</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php forEach($orang as $o){ ?>
                    <tr>
                        <th scope="row"><?= $o["id"]; ?></th>
                        <td><?= $o["nama"]; ?></td>
                        <td><?= $o["alamat"]; ?></td>
                        <td>
                            <a href="" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?= $pager->links("orang", "orang_pagination"); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>