<script>
    function refresh_harapan(keyword, page) {
        $.ajax({
            url: method_url('Komentar', 'refresh_harapan'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.kotak-harapan').html(data);
            }
        });
    }

    function refresh_pujian(keyword, page) {
        $.ajax({
            url: method_url('Komentar', 'refresh_pujian'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.kotak-pujian').html(data);
            }
        });
    }

    function refresh_masukan(keyword, page) {
        $.ajax({
            url: method_url('Komentar', 'refresh_masukan'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.kotak-masukan').html(data);
            }
        });
    }

    function tombol_submit_komentar() {
        if ($('#nama-komentar').val() != '' && $('#konten-komentar').val() != '') {
            $('#submit-komentar').prop('disabled', false);
        } else {
            $('#submit-komentar').prop('disabled', true);
        }
    }

    function tampil_flash() {
        $.ajax({
            url: method_url('Home', 'flash'),
            data: {},
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.flash').html(data);
            }
        });
    }
    $(document).ready(function() {
        $('#nama-komentar').on('change', function() {
            tombol_submit_komentar();
        });
        $('#konten-komentar').on('keyup', function() {
            tombol_submit_komentar();
        });
        $('#submit-komentar').on('click', function() {
            const nama = $('#nama-komentar').val(),
                kategori = $('#kategori-komentar').val(),
                komentar = $('#konten-komentar').val(),
                ip = $('#ip-komentar').val();
            $.ajax({
                url: method_url('Komentar', 'input_komentar'),
                data: {
                    nama: nama,
                    kategori: kategori,
                    komentar: komentar,
                    ip: ip,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    refresh_harapan("", 1);
                    refresh_pujian("", 1);
                    refresh_masukan("", 1);
                    $('#nama-komentar').val('');
                    $('#konten-komentar').val('');
                    tombol_submit_komentar();
                    $('.flash').html(data);
                }
            });
        });
        $('#keyword-harapan').on('keyup', function() {
            refresh_harapan($(this).val(), 1);
        });
        $(".link-harapan").on('click', function() {
            refresh_harapan($('#keyword-harapan').val(), $(this).data('page'));
        });
        $('#keyword-pujian').on('keyup', function() {
            refresh_pujian($(this).val(), 1);
        });
        $(".link-pujian").on('click', function() {
            refresh_pujian($('#keyword-pujian').val(), $(this).data('page'));
        });
        $('#keyword-masukan').on('keyup', function() {
            refresh_masukan($(this).val(), 1);
        });
        $(".link-masukan").on('click', function() {
            refresh_masukan($('#keyword-masukan').val(), $(this).data('page'));
        });
    });
</script>