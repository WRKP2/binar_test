<script>
      $( function() { 
      $("#users").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url:'<?php echo site_url('users/get_users_search'); ?>',
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
                      $('#users').val(ui.item.nama);
      }
    } );
  } );
</script>