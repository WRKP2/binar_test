<?php 

$string = "<script>
    $(function () {
        $(\"#".$table_name."\").autocomplete({
            minLength: 2,
            delay: 0,
            source: '<?php echo site_url('".  strtolower($c)."/get_".$table_name."_search'); ?>',
            select: function (event, ui) {
                $('#".$table_name."').val(ui.item.".$autosearchnamakolom.");
            }
        });
    });
</script>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_autocomplete_file);

?>