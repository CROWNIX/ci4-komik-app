<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mb-3">Form Tambah Data Komik</h2>
            <form action="/komik/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation->hasError("judul")) ? "is-invalid" : ''; ?>" id="judul"
                            name="judul" value="<?= old("judul"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("judul"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation->hasError("penulis")) ? "is-invalid" : ''; ?>"
                            id="penulis" name="penulis" value="<?= old("penulis"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("penulis"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation->hasError("penerbit")) ? "is-invalid" : ''; ?>"
                            id="penerbit" name="penerbit" value="<?= old("penerbit"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("penerbit"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= ($validation->hasError("genre")) ? "is-invalid" : ''; ?>" id="genre"
                            name="genre" value="<?= old("genre"); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError("genre"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?= ($validation->hasError("sinopsis")) ? "is-invalid" : ''; ?>"
                            id="sinopsis" rows="3" name="sinopsis"><?= old("sinopsis"); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError("sinopsis"); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <input class="form-control <?= ($validation->hasError("sampul")) ? "is-invalid" : ''; ?>"
                                type="file" name="sampul" id="sampul" onchange="preview()">
                            <div class="invalid-feedback">
                                <?= $validation->getError("sampul"); ?>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError("sampul"); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>