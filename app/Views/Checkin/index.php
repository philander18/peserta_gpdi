<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/navbar'); ?>
<div class="container-fluid">
    <div class="phil-tabel">
        <div class="search">
            <label class="text-dark">Search :</label>
            <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-checkin">
        </div>
        <div class=" tabel tabel-checkin">
            <table class="table table-striped" style="width:100%; font-size: 0.8em;">
                <thead>
                    <tr class="table-dark">
                        <th class="text-center">Nama</th>
                        <th class="text-center">Gereja</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($checkin as $row) : ?>
                        <tr class="">
                            <td style="vertical-align: middle;"><?= $row["nama"]; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $row["gereja"]; ?></td>
                            <td class="text-center">
                                <button type="button" id="status" class="btn btn-success btn-sm absen text-light py-0" data-bs-toggle="modal" data-bs-target="#formhapus" data-id="<?= $row["id"]; ?>">Checkin</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if ($checkin) : ?>
                <div aria-label="Page navigation">
                    <ul class="pagination mb-0">
                        <?php if ($pagination_checkin['first']) : ?>
                            <li class="page-item">
                                <button class="page-link text-dark link-checkin" aria-label="First" id="first" name="first" data-page="1">
                                    <span aria-hidden="false">First</span>
                                </button>
                            </li>
                        <?php endif ?>
                        <?php if ($pagination_checkin['previous']) : ?>
                            <li class="page-item">
                                <button class="page-link text-dark link-checkin" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                    <span aria-hidden=" true">Previous</span>
                                </button>
                            </li>
                        <?php endif ?>
                        <?php foreach ($pagination_checkin['number'] as $number) : ?>
                            <li class="page-item <?= $pagination_checkin['page'] == $number ? 'active' : '' ?>">
                                <button class="page-link text-dark link-checkin" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                    <span aria-hidden="true"><?= $number; ?></span>
                                </button>
                            </li>
                        <?php endforeach ?>
                        <?php if ($pagination_checkin['next']) : ?>
                            <li class="page-item">
                                <button class="page-link text-dark link-checkin" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                    <span aria-hidden=" true">Next</span>
                                </button>
                            </li>
                        <?php endif ?>
                        <?php if ($pagination_checkin['last']) : ?>
                            <li class="page-item">
                                <button class="page-link text-dark link-checkin" aria-label="<?= $last_checkin; ?>" id="last" name="last" data-page="<?= $last_checkin; ?>">
                                    <span aria-hidden="true"><?= $last_checkin; ?></span>
                                </button>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>