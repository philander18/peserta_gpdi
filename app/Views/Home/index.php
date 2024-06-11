<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/navbar'); ?>
<div class="container mt-4">
    <?php foreach ($list_peserta as $row) : ?>
        <div class="card mb-4">
            <div class="card-header text-center bg-secondary">
                <h3><?= $row["gereja"]; ?></h3>
            </div>
            <div class="card-body">
                <div>
                    <ol class="list-gereja mb-0">
                        <?php foreach ($row["list"] as $list) : ?>
                            <li><?= $list["nama"]; ?></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>