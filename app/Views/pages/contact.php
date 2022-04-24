<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>
            <?php forEach($addresses as $address){ ?>
                <ul>
                    <li><?= $address["type"]; ?></li>
                    <li><?= $address["addresses"]; ?></li>
                    <li><?= $address["city"]; ?></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>