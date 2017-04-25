<script>
    $(function () {
        $("#data").autocomplete({
            minLength: 2,
            delay: 0,
            source: '<?php echo site_url('data/get_data_search'); ?>',
            select: function (event, ui) {
                $('#data').val(ui.item.nama);
            }
        });
    });
</script>