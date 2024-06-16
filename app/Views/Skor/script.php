<script>
    function refresh_grup_skor() {
        $.ajax({
            url: method_url('Skor', 'refresh_grup_skor'),
            data: {},
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.grup-skor').html(data);
            }
        });
    }
    $(document).ready(function() {
        $('.input-skor').on('change', function() {
            const id = $(this).data('id'),
                nilai = $(this).val();
            $.ajax({
                url: method_url('Skor', 'update_nilai_skor'),
                data: {
                    id: id,
                    nilai: nilai,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    refresh_grup_skor();
                }
            });
        });
    });
</script>