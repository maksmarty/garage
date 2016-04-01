$(document).ready(function() {

    $(".make_arequest").change(function() {

        //Remove option
        $('.parent_model_arequest').html($('<option>').val('0').text('Select Parent Model'));


        if (!$(this).val()) {
            //DO nothing
        } else {

            var make_id = $(this).val();

            //var postArray = {
            //    make_id: make_id
            //};

            action_url = '/showroom/models/' + make_id;

            $.ajax({
                url: action_url,
                type: 'GET',
                //data : postArray,
                dataType: 'JSON',
                //beforeSend: function () {
                //    //Add processing button
                //   // _icon.removeClass().addClass('fa fa-gear fa-1x fa-spin');
                //},
                success: function (response) {

                    if ($.trim(response.status) == 'success') {
                        $.map(response.data,function(val,key) {
                             $('<option>').val(key).text(val).appendTo('.parent_model_arequest');
                        });
                    }
                }
            });

        }


    });


});