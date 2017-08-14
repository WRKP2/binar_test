/* global baseURL */
function setpencarianData() {
    $(document).ready(function () {
//         alert("Letak Eror baseURL");

        $("#data").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: baseURL + "index.php/data/get_Data_search",
                    dataType: "json",
                    type: "POST",
                    data: {
                        term: request.term
                    },
                    success: function (ResponData) {
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
            select: function (event, ui) {
                $('#data').val(ui.item.nama);
            }
        });
    });
}

setpencarianData();
