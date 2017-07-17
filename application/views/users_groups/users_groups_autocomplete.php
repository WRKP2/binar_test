<script>
      $( function() { 
      $("#users_groups").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url:'<?php echo site_url('users_groups/get_users_groups_search'); ?>',
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
                      $('#users_groups').val(ui.item.nama);
      }
    } );
  } );
</script>