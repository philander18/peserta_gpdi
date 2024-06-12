<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert" style="padding: 6px 12px; margin-bottom: 8px;">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>