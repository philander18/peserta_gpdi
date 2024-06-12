<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<form autocomplete="off" action="<?= base_url(); ?>" method="POST">
    <div class="portal mt-4">
        <h3>Masukkan Kode</h3>
        <div class="input-group p-2">
            <input type="text" class="form-control" placeholder="Kode" aria-label="Kode" aria-describedby="button-addon2" name="kode">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>