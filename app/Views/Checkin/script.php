<script>
    function refresh_checkin(keyword, page) {
        $.ajax({
            url: method_url('Checkin', 'refresh_tabel_checkin'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-checkin').html(data);
            }
        });
    }

    function refresh_grup_checkin() {
        $.ajax({
            url: method_url('Checkin', 'refresh_grup_checkin'),
            data: {},
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.grup-checkin').html(data);
            }
        });
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
        $('#keyword-checkin').on('keyup', function() {
            refresh_checkin($(this).val(), 1);
        });
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
        $('#confirm-checkin').on('click', function() {
            const id = $('#id-checkin').val(),
                nama = $('#nama-checkin').val(),
                kelompok = $('#join-checkin').val();
            $.ajax({
                url: method_url('Checkin', 'input_checkin'),
                data: {
                    id: id,
                    nama: nama,
                    kelompok: kelompok,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    refresh_checkin("", 1);
                    refresh_grup_checkin();
                    $('.judul-checkin').html('Daftar Kelompok');
                    $('.flash').html(data);
                }
            });
        });
    });
</script>