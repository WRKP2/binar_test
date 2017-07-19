<script>
      $( function() { 
      $("#data").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url:'<?php echo site_url('data/get_data_search'); ?>',
          dataType: "json",
          type: "POST",
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
                      $('#data').val(ui.item.nama);
      }
    } );
  } );
</script>