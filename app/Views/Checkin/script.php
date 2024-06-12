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

    function tampil_flash() {
        $.ajax({
            url: method_url('Home', 'flash'),
            data: {},
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.flash-update').html(data);
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
    });
</script>