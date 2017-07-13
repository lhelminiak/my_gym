$(function() {


    var post_content_input = $('#post_content_input');
    var new_post_submit_button = $('#new_post_submit_button');

    new_post_submit_button.on('click', function() {

        $.ajax({
            type: 'POST',
            url: '/ajax_new_post',
            dataType: "json",
            data: {
                content: post_content_input.val(),
            },
            error: function (e) {
                console.log(e);

            },
            success: function (response) {
                console.log(response);
                if (response.success == true) {
                    alert("SUCCESS");
                } else {
                    alert("FAILURE");
                }
            }

        });



    });







});