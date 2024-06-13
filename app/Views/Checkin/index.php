<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/navbar'); ?>
<div class="container-fluid mt-2">
    <div class="phil-tabel">
        <div class="flash mt-2 mb-0">
        </div>
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
                        <th class="text-center <?= ($akses == 'peserta') ? "d-none" : ""; ?>">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($checkin as $row) : ?>
                        <tr class="">
                            <td style="vertical-align: middle;"><?= $row["nama"] . " (" . (($row["gender"] == "Laki-laki") ? "L" : "P") . ")"; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $row["gereja"]; ?></td>
                            <td class="text-center <?= ($akses == 'peserta') ? "d-none" : ""; ?>">
                                <?php if (is_null($row["nomor"])) : ?>
                                    <button type="button" id="action-checkin" class="btn btn-success btn-sm modal-checkin text-light py-0" data-bs-toggle="modal" data-bs-target="#form-checkin" data-id="<?= $row["id"]; ?>">Checkin</button>
                                <?php else : ?>
                                    V
                                <?php endif ?>
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
<div class="modal fade" id="form-checkin" tabindex="-1" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-primary" id="judulcheckin">Konfirmasi Check In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding-top:2px;">
                <input type="hidden" id="id-checkin" value="">
                <input type="hidden" id="nama-checkin" value="">
                <div class="form-group">
                    <label class="text-dark fw-bold ms-2 my-2" id="label-checkin"></label>
                </div>
                <span class="text-success"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TIDAK</button>
                <button type="button" id="confirm-checkin" class="btn btn-primary" data-bs-dismiss="modal">YA</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>