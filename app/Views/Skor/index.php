<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/navbar'); ?>
<div class="container-fluid">
    <?php if ($akses == 'POS 1' or $akses == 'POS 2' or $akses == 'POS 3' or $akses == 'POS 4') : ?>
        <h3 class="text-center text-primary lilita-one-regular"><?= $akses; ?></h3>
        <div class="input-game my-2">
            <?php foreach ($list_input_skor as $row) : ?>
                <div class="input-kelompok-game">
                    <label for="kelompok<?= $row['kelompok']; ?>" class="fw-bold">Score kelompok <?= $row['kelompok']; ?> : </label>
                    <input class="form-control form-control-sm input-skor" type="text" data-id="<?= $row['id']; ?>" id="kelompok<?= $row['kelompok']; ?>" value="<?= $row['nilai']; ?>">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <h2 class="text-center lilita-one-regular text-primary mt-2">Score per Kelompok</h2>
    <div class="grup-skor">
        <?php foreach ($list_skor as $row) : ?>
            <div class="card">
                <div class="card-header text-center bg-secondary">
                    <h3><?= $row["kelompok"]; ?></h3>
                </div>
                <div class="card-body">
                    <div>
                        <ol class="mb-0">
                            <?php foreach ($row["list"] as $list) : ?>
                                <li>Score dari <?= $list["pos"]; ?> : <?= (is_null($list["nilai"])) ? 0 : $list["nilai"]; ?></li>
                            <?php endforeach; ?>
                        </ol>
                        <h4 class="text-center text-success mt-3 ml-2">Total Score : <?= $row["jumlah"]; ?></h4>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $this->endSection(); ?>