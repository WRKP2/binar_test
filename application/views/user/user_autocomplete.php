<script>
      $( function() { 
      $("#user").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url:'<?php echo site_url('user/get_user_search'); ?>',
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
                      $('#user').val(ui.item.nama);
      }
    } );
  } );
</script>