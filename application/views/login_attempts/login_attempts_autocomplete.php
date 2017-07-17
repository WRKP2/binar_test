<script>
      $( function() { 
      $("#login_attempts").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url:'<?php echo site_url('login_attempts/get_login_attempts_search'); ?>',
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
                      $('#login_attempts').val(ui.item.nama);
      }
    } );
  } );
</script>