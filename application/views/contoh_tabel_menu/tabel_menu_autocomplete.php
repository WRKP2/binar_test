<script>
      $( function() { 
      $("#tabel_menu").autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url:'<?php echo site_url('contoh_tabel_menu/get_tabel_menu_search'); ?>',
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
                      $('#tabel_menu').val(ui.item.nama);
      }
    } );
  } );
</script>