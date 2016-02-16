$(document).ready(function() {

    $("#parent_cat").change(function() {

        var payee_id = $('input[name=payee_id]').val();

        var postArray = {
            payee_id: payee_id
        };

        action_url = '/showroom/models/';

        $.ajax({
            url : action_url,
            type : 'POST',
            data : postArray,
            dataType : 'JSON',
            beforeSend: function() {
                //Add processing button
                _icon.removeClass().addClass('fa fa-gear fa-1x fa-spin');
            },
            success : function(response) {

                if ( $.trim(response.status) == 'success' ) {


                    _icon.removeClass().addClass('glyphicon glyphicon-ok');

                    //_icon.show(slowmilliSecond, function(){
                    //
                    //});

                    setTimeout( function()  {
                        _icon.removeClass().addClass('fa fa-send');
                        location.reload();
                    }, slowmilliSecond);

                }
            }
        });


    });


});