<?php 

$string = "<script>
      $( function() { 
      $(\"#".$table_name."\").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url:'<?php echo site_url('".  strtolower($c)."/get_".$table_name."_search'); ?>',
          dataType: \"json\",
          type: \"POST\",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      minLength: 3,
      select: function( event, ui ) {
                      $('#".$table_name."').val(ui.item.nama);
      }
    } );
  } );
</script>";


$hasil_view_autocomplete = createFile($string, $target."views/" . $c_url . "/" . $v_autocomplete_file);

?>