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
                <td style="vertical-align: middle;"><?= ucwords(strtolower($row["nama"])) . " (" . (($row["gender"] == "Laki-laki") ? "L" : "P") . ")"; ?></td>
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
<script>
    $(document).ready(function() {
        $(".link-checkin").on('click', function() {
            refresh_checkin($('#keyword-checkin').val(), $(this).data('page'));
        });
        $('.modal-checkin').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: method_url('Checkin', 'get_data_peserta'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#id-checkin').val(data.id);
                    $('#nama-checkin').val(data.nama);
                    $('#label-checkin').html('Checkin <span class="text-success">' + data.nama + '</span> ?');
                    $('#join-checkin').val("1");
                }
            });
        });
    });
</script>