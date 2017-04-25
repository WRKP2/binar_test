<script>
    $(function () {
        $("#user").autocomplete({
            minLength: 2,
            delay: 0,
            source: '<?php echo site_url('user/get_user_search'); ?>',
            select: function (event, ui) {
                $('#user').val(ui.item.nama);
            }
        });
    });
</script>