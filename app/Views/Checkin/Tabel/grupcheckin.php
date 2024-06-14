<?php foreach ($list_kelompok as $row) : ?>
    <div class="card">
        <div class="card-header text-center bg-secondary">
            <h3><?= $row["kelompok"]; ?></h3>
        </div>
        <div class="card-body">
            <div>
                <ol class="mb-0">
                    <?php foreach ($row["list"] as $list) : ?>
                        <li><?= ucwords(strtolower($list["nama"])); ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
<?php endforeach; ?>