<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid konten-visitor">
    <div class="form-visitor">
        <img src="<?= base_url(); ?>public/images/together1.png" style="width: 60%; justify-self: center;">
        <h2 class="text-center mb-4">Pelprap GPdI Wilayah 1</h2>
        <h3 class="text-center mb-2 text-primary lilita-one-regular">Visitor Ibadah Padang</h3>
        <div class="flash">
        </div>
        <div class="my-2">
            <input class="form-control" type="text" id="nama-visitor" placeholder="Nama" required>
        </div>
        <div class="mb-2">
            <input class="form-control" type="text" id="hp-visitor" placeholder="Nomor HP" required>
        </div>
        <div class="row mb-2">
            <div class="col-4">
                <label for="gender-visitor" class="pt-2">Jenis Kelamin</label>
            </div>
            <div class="col-8">
                <select class="form-select" id="gender-visitor" aria-label="Jenis Kelamin">
                    <option value="Laki-laki" selected>Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-4">
                <label for="status-visitor" class="pt-2">Kelompok</label>
            </div>
            <div class="col-8">
                <select class="form-select" id="status-visitor" aria-label="Kelompok">
                    <option value="Gembala/Pendeta" selected>Gembala/Pendeta</option>
                    <option value="Jemaat">Jemaat</option>
                </select>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-4">
                <label for="gereja-visitor" class="pt-2">Gereja</label>
            </div>
            <div class="col-8">
                <select class="form-select" id="gereja-visitor" aria-label="Gereja">
                    <?php foreach ($list_gereja as $gereja) : ?>
                        <option value="<?= $gereja['nama']; ?>"><?= $gereja['nama']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <button type="button" class="btn btn-primary text-dark fw-bold" style="width: 100%" id="submit-visitor" disabled>Submit</button>
            </div>
        </div>
    </div>
    <div class="detail-visitor">
        <div class="phil-tabel">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-visitor">
            </div>
            <div class=" tabel tabel-visitor">
                <table class="table table-striped" style="width:100%; font-size: 1em;">
                    <thead>
                        <tr class="table-dark">
                            <th class="text-center">Nama</th>
                            <th class="text-center">Gereja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($visitor as $row) : ?>
                            <tr class="">
                                <td style="vertical-align: middle;"><?= $row["nama"] . " (" . (($row["gender"] == "Laki-laki") ? "L" : "P") . "-" . (($row["status"] == "Jemaat") ? "J" : "G") . ")"; ?></td>
                                <td class="text-center" style="vertical-align: middle;"><?= $row["gereja"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if ($visitor) : ?>
                    <div aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            <?php if ($pagination_visitor['first']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-visitor" aria-label="First" id="first" name="first" data-page="1">
                                        <span aria-hidden="false">First</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_visitor['previous']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-visitor" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                        <span aria-hidden=" true">Previous</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php foreach ($pagination_visitor['number'] as $number) : ?>
                                <li class="page-item <?= $pagination_visitor['page'] == $number ? 'active' : '' ?>">
                                    <button class="page-link text-dark link-visitor" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                        <span aria-hidden="true"><?= $number; ?></span>
                                    </button>
                                </li>
                            <?php endforeach ?>
                            <?php if ($pagination_visitor['next']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-visitor" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                        <span aria-hidden=" true">Next</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_visitor['last']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-visitor" aria-label="<?= $last_visitor; ?>" id="last" name="last" data-page="<?= $last_visitor; ?>">
                                        <span aria-hidden="true"><?= $last_visitor; ?></span>
                                    </button>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>