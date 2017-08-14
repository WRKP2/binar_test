$('#submit').click(function () {
    // add loading image to div
    $('#loading').html('<img src='.baseURL.'/files/giphy.gif> loading...');
                alert("aaaaaaaaaaaa");

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