<nav>
    <div class="logo">
        <img src="<?= base_url(); ?>public/images/together.png" alt="Logo Together" width="120px" class="d-inline">
    </div>
    <ul>
        <li><a href="<?= base_url(); ?>" class="<?= ($halaman == 'home') ? "aktif" : ""; ?>">Participant</a></li>
        <li><a href="<?= base_url(); ?>Checkin" class="<?= ($halaman == 'checkin') ? "aktif" : ""; ?>">Checkin</a></li>
        <li><a href="<?= base_url(); ?>Wish" class="<?= ($halaman == 'wish') ? "aktif" : ""; ?>">Wish</a></li>
        <li><a href="<?= base_url(); ?>Game" class="<?= ($halaman == 'game') ? "aktif" : ""; ?>">Game</a></li>

    </ul>
    <div class="menu-toggles">
        <input type="checkbox">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>