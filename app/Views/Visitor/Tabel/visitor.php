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
<script>
    $(document).ready(function() {
        $(".link-visitor").on('click', function() {
            refresh_visitor($('#keyword-visitor').val(), $(this).data('page'));
        });
    });
</script>