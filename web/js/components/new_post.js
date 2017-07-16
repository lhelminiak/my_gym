$(function(){
    var postActions   = $( '#list_PostActions' );
    var currentAction = $( '#list_PostActions li.active' );

    // Post Type Selectors
    var new_post_select = $('#new_post_select');
    var new_record_select = $('#new_record_select');
    var new_lift_request_select = $('#new_lift_request_select');


    // Divs
    var new_record_input_fields = $('#new_record_input_fields');
    var new_lift_request_fields = $('#new_lift_request_fields');

    //Input fields
    var new_record_lift_select = $('#new_record_lift_select');
    var new_record_weight_input = $('#new_record_weight_input');
    var new_record_reps_input = $('#new_record_reps_input');


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




        // if(self.val() == '0'){
        //     new_record_input_fields.hide();
        // }
        // else if(self.val() == '1'){
        //     new_record_input_fields.show();
        // }
        // else{
        //     new_record_input_fields.hide();
        // }


        if(self.val() == '1'){
            new_lift_request_fields.hide();
            new_record_input_fields.show();
        }
        else if(self.val() == '2') {
            new_record_input_fields.hide();
            new_lift_request_fields.show();
        }
        else{
            new_lift_request_fields.hide();
            new_record_input_fields.hide();
        }



    });




    function init() {
        new_record_input_fields.hide();
        new_lift_request_fields.hide();
        $('#dateTimePicker').datetimepicker();

    }
});