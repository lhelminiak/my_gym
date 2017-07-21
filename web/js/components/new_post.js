$(function(){

    var current_post_type = 0;
    var postActions   = $( '#list_PostActions' );
    var currentAction = $( '#list_PostActions li.active' );

    // Post Type Selectors
    var new_post_select = $('#new_post_select');
    var new_record_select = $('#new_record_select');
    var new_lift_request_select = $('#new_lift_request_select');


    // Divs
    var new_record_input_fields = $('#new_record_input_fields');
    var new_lift_request_fields = $('#new_lift_request_fields');

    // Input fields
    var new_record_lift_select = $('#new_record_lift_select');
    var new_record_weight_input = $('#new_record_weight_input');
    var new_record_reps_input = $('#new_record_reps_input');

    var new_post_content_input = $('#new_post_content_input');

    var new_lift_request_lift_select = $('#new_lift_request_lift_select');
    var new_lift_request_gym_select = $('#new_lift_request_gym_select');
    var new_lift_request_date_time_input = $('#new_lift_request_date_time_input');


    // Buttons
    var new_post_submit_button = $('#new_post_submit_button');

    init();


    if ( currentAction.length === 0 ) {
        postActions.find( 'li:first' ).addClass( 'active' );
    }
    postActions.find( 'li' ).on( 'click', function( e ) {
        e.preventDefault();
        var self = $( this );
        if ( self === currentAction ) {return;}
        // else

        currentAction.removeClass( 'active' );
        self.addClass( 'active' );
        currentAction = self;





        if(self.val() == '1'){
            new_lift_request_fields.hide();
            new_record_input_fields.show();
            current_post_type = 1;
        }
        else if(self.val() == '2') {
            new_record_input_fields.hide();
            new_lift_request_fields.show();
            current_post_type = 2;
        }
        else{
            new_lift_request_fields.hide();
            new_record_input_fields.hide();
            current_post_type = 0;
        }



    });



    new_post_submit_button.on('click', function () {



        var weight = new_record_weight_input.val();
        var reps = new_record_reps_input.val();
        var lift = null;
        var gym = new_lift_request_gym_select.val();




        // Convert LiftTime value to valid DateTime Object
        var time = new_lift_request_date_time_input.val();
        time = moment(time).format("YYYY-MM-DD HH:mm:ss");


        if(current_post_type == 2){
            lift = new_lift_request_lift_select.val();
        }
        else{
            lift = new_record_lift_select.val();
        }




        $.ajax({
            type: 'POST',
            url: '/ajax_new_post',
            dataType: 'json',
            data: {
                type: current_post_type,
                content: new_post_content_input.val(),
                weight: weight,
                reps: reps,
                lift_id: lift,
                gym_id: gym,
                liftTime: time



            },
            error: function (e) {
                console.log(e);

            },
            success: function (response) {
                console.log(response);
                // window.location.reload();



            }
        });




    });




    function init() {
        new_record_input_fields.hide();
        new_lift_request_fields.hide();

        $('#datetimepicker').datetimepicker();



    }
});