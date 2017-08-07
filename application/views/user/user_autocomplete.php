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
          }, error: function (xmlHttpRequest, textStatus, errorThrown) {
                        start = xmlHttpRequest.responseText.search("<title>") + 7;
                        end = xmlHttpRequest.responseText.search("</title>");
                        errorMsg = " ON CARI " + xmlHttpRequest.responseText;
                        if (start > 0 && end > 0)
                            alert("Rangerti " + errorMsg + "  [" + xmlHttpRequest.responseText.substring(start, end) + "]");
                        else
                            alert("Error juga " + errorMsg);
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