/* global baseURL */ 
function setpencarianUser_app(){
        $(document).ready(function () {
        $("#user_app").autocomplete({
        source: function(request, response) {
        $.ajax({

                url: baseURL+"index.php/user_app/get_User_app_search",
                dataType: "json",
                type: "POST",
                data: {
                term: request.term
                },
                success: function(ResponData) {
                response(ResponData);
                }, error: function (xmlHttpRequest, textStatus, errorThrown) {
        start = xmlHttpRequest.responseText.search("<title>") + 7;
                end = xmlHttpRequest.responseText.search("</title>");
                errorMsg = " ON CARI " + xmlHttpRequest.responseText;
                if (start > 0 && end > 0)
                alert("Letak Eror " + errorMsg + "  [" + xmlHttpRequest.responseText.substring(start, end) + "]");
                else
                alert("Error " + errorMsg);
        }
        });
        },
                minLength: 3,
                select: function(event, ui) {
                $('#user_app').val(ui.item.nama);
                }
        });
        });
}

setpencarianUser_app();