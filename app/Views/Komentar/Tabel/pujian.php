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
<script>
    $(document).ready(function() {
        $(".link-pujian").on('click', function() {
            refresh_pujian($('#keyword-pujian').val(), $(this).data('page'));
        });
    });
</script>