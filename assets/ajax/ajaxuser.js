/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $(function () {
        $("#q").autocomplete({//id kode sebagai key autocomplete yang akan dibawa ke source url
            minLength: 2,
            delay: 0,
            source: site_url('user/get_all_search'), //nama source kita ambil langsung memangil fungsi get_allkota
            select: function (event, ui) {
                $('#q').val(ui.item.nama);
            }
        });
    });



