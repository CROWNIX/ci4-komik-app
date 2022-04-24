<?php $this->extend("layout/template"); ?>

<?php $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="/img/<?= $comic["sampul"]; ?>" alt="" class="detail-sampul">
        </div>
        <div class="col-7 mt-3">
            <p>Judul : <?= $comic["judul"]; ?></p>
            <p>Penulis : <?= $comic["penulis"]; ?></p>
            <p>Penerbit : <?= $comic["penerbit"]; ?></p>
            <p>Genre : <?= $comic["genre"]; ?></p>
            <p>Sinopsis : <br><?= $comic["sinopsis"]; ?></p>
            <a href="/komik" class="btn btn-primary button">Kembali</a>
            <a href="/komik/edit/<?= $comic["slug"]; ?>" class="btn btn-warning button">Edit</a>
            <form action="/komik/<?= $comic["id"]; ?>" method="post" class="d-inline">
            <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger button" onclick="return confirm('Apakah anda ingin menghapus komik ini?')">Delete</button>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>