/* global baseURL */

$(function() {
   $('#upload_file').submit(function(e) {
//      alert("data.msg");
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'./upload/upload_file/', 
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'json',
         data        : {
            'title'           : $('#title').val()
         },
         success  : function (data, status)
         {
            if(data.status != 'error')
            {
               $('#files').html('<p>Reloading files...</p>');
               refresh_files();
               $('#title').val('');
            }
            alert(data.msg);
         }
      });
      return false;
   });
});

function refresh_files()
{
   $.get('./upload/files/')
   .success(function (data){
      $('#files').html(data);
   });
}

$('.delete_file_link').live('click', function(e) {
   e.preventDefault();
   if (confirm('Are you sure you want to delete this file?'))
   {
      var link = $(this);
      $.ajax({
         url         : './upload/delete_file/' + link.data('file_id'),
         dataType : 'json',
         success     : function (data)
         {
            //files = $(#files);
            files = $(files);
            if (data.status === "success")
            {
               link.parents('li').fadeOut('fast', function() {
                  $(this).remove();
                  if (files.find('li').length == 0)
                  {
                     files.html('<p>No Files Uploaded</p>');
                  }
               });
            }
            else
            {
               alert(data.msg);
            }
         }
      });
   }
});

function setpencarianData() {
    $(document).ready(function () {
        $('#submit').click(function () {
            // add loading image to div
//            alert("Letak Eror baseURL");
            $('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');

            // run ajax request
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "https://api.github.com/users/jveldboom",
                success: function (d) {
                    // replace div's content with returned data
                    // $('#loading').html('<img src="'+d.avatar_url+'"><br>'+d.login);
                    // setTimeout added to show loading
                    setTimeout(function () {
                        $('#loading').html('<img src="' + d.avatar_url + '"><br>' + d.login);
                    }, 2000);
                }
            });
        });
    });
}
setpencarianData();
