/* global baseURL */ 
function setpencarianData(){
        $(document).ready(function () {
        $("#data").autocomplete({
        source: function(request, response) {
        $.ajax({

                url: baseURL+"index.php/data/get_Data_search",
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
                $('#data').val(ui.item.nama);
                }
        });
        });
}

setpencarianData();$(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
    return {
    "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
    };
    var t = $("#mytable").dataTable({
            initComplete: function() {
            var api = this.api();
            $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                    if (e.keyCode == 13) {
                    api.search(this.value).draw();
                    }
                    });
            },
            oLanguage: {
            sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "data/json", "type": "POST"},
                    columns: [
                    {
                    "data": "no",
                            "orderable": false
                    }, {"data": "ID"},{"data": "nama"},{"data": "asal"},{"data": "gabung"},
                    {
                    "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                    }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                    }
            });
    });