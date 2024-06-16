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
<script>
    $(document).ready(function() {
        $(".link-harapan").on('click', function() {
            refresh_harapan($('#keyword-harapan').val(), $(this).data('page'));
        });
    });
</script>