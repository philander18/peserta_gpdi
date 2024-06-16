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