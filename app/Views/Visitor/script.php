<script>
    function refresh_visitor(keyword, page) {
        $.ajax({
            url: method_url('visitor', 'refresh_tabel_visitor'),
            data: {
                keyword: keyword,
                page: page,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-visitor').html(data);
            }
        });
    }

    function tombol_submit_visitor() {
        if ($('#nama-visitor').val() != '' && $('#hp-visitor').val() != '') {
            $('#submit-visitor').prop('disabled', false);
        } else {
            $('#submit-visitor').prop('disabled', true);
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
        $('#keyword-visitor').on('keyup', function() {
            refresh_visitor($(this).val(), 1);
        });
        $(".link-visitor").on('click', function() {
            refresh_visitor($('#keyword-visitor').val(), $(this).data('page'));
        });
        $('#nama-visitor').on('change', function() {
            tombol_submit_visitor();
        });
        $('#hp-visitor').on('change', function() {
            tombol_submit_visitor();
        });
        $('#submit-visitor').on('click', function() {
            const nama = $('#nama-visitor').val(),
                hp = $('#hp-visitor').val(),
                gender = $('#gender-visitor').val(),
                status = $('#status-visitor').val(),
                gereja = $('#gereja-visitor').val();
            $.ajax({
                url: method_url('Visitor', 'input_visitor'),
                data: {
                    nama: nama,
                    hp: hp,
                    gender: gender,
                    status: status,
                    gereja: gereja,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    refresh_visitor("", 1);
                    $('.flash').html(data);
                    $('#nama-visitor').val('');
                    $('#hp-visitor').val('');
                    tombol_submit_visitor();
                }
            });
        });
    });
</script>