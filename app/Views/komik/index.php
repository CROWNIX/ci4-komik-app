<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/komik/create" class="btn btn-primary mb-3">Tambah Data Komik</a>
            <h1>Daftar Komik</h1>
            <?php if(session()->getFlashData("pesan")){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= session()->getFlashData("pesan"); ?></strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php forEach($comics as $comic){ ?>
                    <tr>
                        <th scope="row"><?= $comic["id"]; ?></th>
                        <td><img src="/img/<?= $comic["sampul"]; ?>" alt="" class="sampul"></td>
                        <td><?= $comic["judul"]; ?> <br> genre : <?= $comic["genre"]; ?></td>
                        <td>
                            <a href="/komik/<?= $comic["slug"]; ?>" class="btn btn-success">Detail Komik</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>