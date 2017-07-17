<script>
      $( function() { 
      $("#groups").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url:'<?php echo site_url('groups/get_groups_search'); ?>',
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
                      $('#groups').val(ui.item.nama);
      }
    } );
  } );
</script>