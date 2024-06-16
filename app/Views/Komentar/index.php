<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/navbar'); ?>
<input type="hidden" id="ip-komentar" value="">
<div class="container-fluid komentar">
    <div class="form-komentar">
        <h3 class="text-center text-primary lilita-one-regular">Place Your Comment</h3>
        <div class="flash">
        </div>
        <div class="row px-2">
            <div class="col-4">
                <label for="nama-komentar" class="pt-2">Nama</label>
            </div>
            <div class="col-8">
                <input class="form-control" type="text" id="nama-komentar" placeholder="Nama" list="list-nama-komentar" required>
                <datalist id="list-nama-komentar">
                    <?php foreach ($list_nama as $row) : ?>
                        <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                    <?php endforeach; ?>
                </datalist>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-4">
                <label for="kategori-komentar" class="pt-2">Kategori</label>
            </div>
            <div class="col-8">
                <select class="form-select" id="kategori-komentar" aria-label="Kategori">
                    <option value="Harapan" selected>Harapan</option>
                    <option value="Pujian">Pujian</option>
                    <option value="Masukan">Masukan</option>
                </select>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-12">
                <textarea class="form-control" id="konten-komentar" placeholder="Komentar" rows="5" maxlength="500"></textarea>
            </div>
        </div>
        <div class="row px-2">
            <div class="col-4">
                <button type="button" class="btn btn-primary text-dark fw-bold" style="width: 100%" id="submit-komentar" disabled>Submit</button>
            </div>
        </div>
    </div>
    <div class="harapan-komentar">
        <h2 class="text-center lilita-one-regular text-primary judul-checkin">Daftar Harapan</h2>
        <div class="phil-kotak">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-harapan">
            </div>
            <div class="kotak-harapan">
                <div class="kotak mb-2">
                    <?php foreach ($harapan as $row) : ?>
                        <div class="card">
                            <div class="card-header text-center bg-secondary">
                                <h5><?= $row["nama"]; ?></h5>
                            </div>
                            <div class="card-body">
                                <p><?= $row["komentar"]; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($harapan) : ?>
                    <div aria-label="Page navigation" style="justify-self: center">
                        <ul class="pagination mb-0">
                            <?php if ($pagination_harapan['first']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-harapan" aria-label="First" id="first" name="first" data-page="1">
                                        <span aria-hidden="false">First</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_harapan['previous']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-harapan" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                        <span aria-hidden=" true">Previous</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php foreach ($pagination_harapan['number'] as $number) : ?>
                                <li class="page-item <?= $pagination_harapan['page'] == $number ? 'active' : '' ?>">
                                    <button class="page-link text-dark link-harapan" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                        <span aria-hidden="true"><?= $number; ?></span>
                                    </button>
                                </li>
                            <?php endforeach ?>
                            <?php if ($pagination_harapan['next']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-harapan" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                        <span aria-hidden=" true">Next</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_harapan['last']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-harapan" aria-label="<?= $last_harapan; ?>" id="last" name="last" data-page="<?= $last_harapan; ?>">
                                        <span aria-hidden="true"><?= $last_harapan; ?></span>
                                    </button>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="pujian-komentar">
        <h2 class="text-center lilita-one-regular text-primary judul-checkin">Daftar Pujian</h2>
        <div class="phil-kotak">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-pujian">
            </div>
            <div class="kotak-pujian">
                <div class="kotak mb-2">
                    <?php foreach ($pujian as $row) : ?>
                        <div class="card">
                            <div class="card-header text-center bg-secondary">
                                <h5><?= $row["nama"]; ?></h5>
                            </div>
                            <div class="card-body">
                                <p><?= $row["komentar"]; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($pujian) : ?>
                    <div aria-label="Page navigation" style="justify-self: center">
                        <ul class="pagination mb-0">
                            <?php if ($pagination_pujian['first']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-pujian" aria-label="First" id="first" name="first" data-page="1">
                                        <span aria-hidden="false">First</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_pujian['previous']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-pujian" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                        <span aria-hidden=" true">Previous</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php foreach ($pagination_pujian['number'] as $number) : ?>
                                <li class="page-item <?= $pagination_pujian['page'] == $number ? 'active' : '' ?>">
                                    <button class="page-link text-dark link-pujian" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                        <span aria-hidden="true"><?= $number; ?></span>
                                    </button>
                                </li>
                            <?php endforeach ?>
                            <?php if ($pagination_pujian['next']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-pujian" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                        <span aria-hidden=" true">Next</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_pujian['last']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-pujian" aria-label="<?= $last_pujian; ?>" id="last" name="last" data-page="<?= $last_pujian; ?>">
                                        <span aria-hidden="true"><?= $last_pujian; ?></span>
                                    </button>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="masukan-komentar">
        <h2 class="text-center lilita-one-regular text-primary judul-checkin">Daftar Masukan</h2>
        <div class="phil-kotak">
            <div class="search">
                <label class="text-dark">Search :</label>
                <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-masukan">
            </div>
            <div class="kotak-masukan">
                <div class="kotak mb-2">
                    <?php foreach ($masukan as $row) : ?>
                        <div class="card">
                            <div class="card-header text-center bg-secondary">
                                <h5><?= $row["nama"]; ?></h5>
                            </div>
                            <div class="card-body">
                                <p><?= $row["komentar"]; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($masukan) : ?>
                    <div aria-label="Page navigation" style="justify-self: center">
                        <ul class="pagination mb-0">
                            <?php if ($pagination_masukan['first']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-masukan" aria-label="First" id="first" name="first" data-page="1">
                                        <span aria-hidden="false">First</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_masukan['previous']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-masukan" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                        <span aria-hidden=" true">Previous</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php foreach ($pagination_masukan['number'] as $number) : ?>
                                <li class="page-item <?= $pagination_masukan['page'] == $number ? 'active' : '' ?>">
                                    <button class="page-link text-dark link-masukan" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                        <span aria-hidden="true"><?= $number; ?></span>
                                    </button>
                                </li>
                            <?php endforeach ?>
                            <?php if ($pagination_masukan['next']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-masukan" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                        <span aria-hidden=" true">Next</span>
                                    </button>
                                </li>
                            <?php endif ?>
                            <?php if ($pagination_masukan['last']) : ?>
                                <li class="page-item">
                                    <button class="page-link text-dark link-masukan" aria-label="<?= $last_masukan; ?>" id="last" name="last" data-page="<?= $last_masukan; ?>">
                                        <span aria-hidden="true"><?= $last_masukan; ?></span>
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