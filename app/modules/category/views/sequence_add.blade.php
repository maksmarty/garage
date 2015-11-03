<?php
    /*
       View Name 	: SEQUENCE_ADD
       Description 	: Add/Edit new sequence .
    */
?>
        

        <!-- NEW WIDGET START -->
      <article class="col-sm-12 col-md-12 col-lg-6">          
	<!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                    <h2 id="form_header">Add Sequence</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        <form class="form-horizontal" name="sequenceForm" id="sequenceForm" method="post" action="" role="form" data-toggle="validator"  novalidate="novalidate">

                            
                            <div class="form-group">
                               <label class="col-sm-2 control-label">Start</label>
                               <div class="col-md-10">
                                   <input class="form-control" placeholder="Enter Start Range" type="text" name="seq_start" id="seq_start" value="" required>
                               </div>
                            </div>
                            
                            <div class="form-group">
                               <label class="col-sm-2 control-label">End</label>
                               <div class="col-md-10">
                                   <input class="form-control" placeholder="Enter End Range" type="text" name="seq_end" id="seq_end" value="" required>
                               </div>
                            </div>
                            
                            <div class="form-actions ">
                                <div class="row">
                                    <div class="col-md-12" id="sequence-action-button">
                                        <input type="hidden" name="sequenceId" id="sequenceId" value="">
                                        <button type="submit" class="btn btn-primary" id="submitButton" name="submitButton">
                                            <i class="fa fa-save"></i>
                                            Submit
                                        </button>
                                        <button type="Reset" class="btn btn-primary" id="resetButton" name="resetButton">
                                            <i class="fa fa-save"></i>
                                            Reset
                                        </button>
                                       
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->
        
        <!-- Modal -->
      

        
        <script type="text/javascript">
            //runAllForms();
            var html;
            $(function() {
                
                $("#message").addClass('hide');
                $("#cancelButton").addClass('hide');
                var action ;
                var message;
                // Validation
                
                $.validator.addMethod("greaterThan",
                    function(value, max, min){
                        return parseInt(value) > parseInt($(min).val());
                    }, "Max must be greater than min"
                );

                $("#sequenceForm").validate({
                    // Rules for form validation
                    rules: {
                        seq_start: {
                            required: true,
                            minlength: 8,
                            maxlength : 8,
                            number: true
                        },
                        seq_end: {
                            required: true,
                            minlength: 8,
                            maxlength : 8,
                            greaterThan: '#seq_start',
                            number: true
                            
                        }
                        
                        
                    },
                    // Messages for form validation
                    messages: {
                        seq_start: {
                            required: '* This is required field!',
                            
                            
                        },
                        seq_end: {
                            required: '* This is required field!',
                           
                            
                        },
                        
                    },
                    
                    highlight: function(element) {
                        $(element).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    errorElement: 'span',
                    errorClass: 'help-block',
                    errorPlacement: function(error, element) {
                        if(element.parent('.input-group').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });
            }).attr('novalidate', 'novalidate')
              .submit(function(e) {
                    var form = $(this);
                    // client-side validation OK.
                    if (!e.isDefaultPrevented()) {
                        
                        // prevent default form submission logic
                        e.preventDefault();
                        
                        // check the operation
                        var sequenceId = $('#sequenceId').val()                       
                        if(sequenceId == ''){
                            $("#form_header").html('Add Sequence');
                            action = 'add';                            
                           
                        }else{
                            $("#form_header").html('Update Sequence');
                            //$("#sequence-action-button").html('<button type="button" class="btn btn-primary" id="cancelButton" name="cancelButton"><i class="fa fa-save"></i>Cancel</button>');
                            action = 'update';
                           
                        }
                        
                        /* ADD/UPDATE*/
                        $("#message").addClass('hide');
                   
                        $.ajax({
                            url: './sequence/data/'+action,
                            type: 'POST',
                            data : $("#sequenceForm" ).serialize(),

                            success: function(response) {

                               
                                if(response.msg == 'success'){    
                                    
                                    // saved successfully.
                                    // check the action ADD OR UPDATE.
                                    // ADD - add new row at the bottom.
                                    // UPDATE - update only that row.
                                    if(action == 'add'){
                                        
                                        // if this is first row then delete the "no data available from" the row.
                                        var no_Row = $('#no-data').html();
                                        if(no_Row)
                                            $('#no-data').html('');
                                       
                                        html = '';
                                        // add the new sequece
                                        
                                        html += '<tr><td>'+response.data.id+'</td>';
                                        html += '<td>'+response.data.start+'</td>';
                                        html += '<td>'+response.data.end+'</td>';
                                        html += '<td>'+response.data.status+'</td>';
                                        
										if(response.data.status == 'in-complete'){
											html += '<td><a href="#" id="sequence_edit_'+response.data.id+'"     onclick="editSequence(\''+response.data.id+'\',\''+response.data.status+'\')"       class="editpage"     title="Edit Sequence">   <i class="fa fa-edit fa-2x"></i></a>&nbsp;';
											html += '<a href="#" id="sequence_delete_'+response.data.id+'"   onclick="deleteSequence(\''+response.data.id+'\',\''+response.data.status+'\')"     class="openModal"    title="Delete Sequence"> <i class="fa fa-trash-o fa-2x"></i></a>&nbsp;';
										}
										if(response.data.status != 'in-complete'){
											html += '<a href="/sequence/sequence-files/'+response.data.id+'" id="sequence_show_'+response.data.id+'"     class="showSequence" title="Show Sequence">   <i class="fa fa-search fa-2x"></i></a> &nbsp;';
										}
                                        if(response.data.status == 'new' || response.data.status == 'interrupt'){
                                            html += '<a href="/sequence/sequence-schedule/'+response.data.id+'" id="sequence_schedule_'+response.data.id+'" class="showSchedule" title="Schedule Sequence"> <i class="fa fa-clock-o fa-2x"></i></a>';
                                        }
                                        html += '</td></tr>';                                                 
                                                
                                        $("#seq_data").append(html);
                                
                                        $('#sequenceForm').trigger("reset");
                                        $('#submitButton').html('Save');
                                        
                                        message = ' New seqence is added successfully. Cron will automatically add files of this sequence in tha database.';
                                        $("#message").show()
                                            .removeClass()
                                            .css( "display","block" )
                                            .addClass("alert alert-success fade in")
                                            .html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Success ! </strong>' + message);
                                       
                                        
                                    }else if(action == 'update'){
                                                                                
                                        // update table list
                                        html = '';
                                        $('#seq_'+response.data.id).html('');
                                        
                                        html += '<td>'+response.data.id+'</td>';
                                        html += '<td>'+response.data.start+'</td>';
                                        html += '<td>'+response.data.end+'</td>';
                                        html += '<td>'+response.data.status+'</td>';
                                        
										if(response.data.status == 'in-complete'){
											html += '<td><a href="#" id="sequence_edit_'+response.data.id+'"     onclick="editSequence(\''+response.data.id+'\',\''+response.data.status+'\')"       class="editpage"     title="Edit Sequence">   <i class="fa fa-edit fa-2x"></i></a>&nbsp;';
											html += '<a href="#" id="sequence_delete_'+response.data.id+'"   onclick="deleteSequence(\''+response.data.id+'\',\''+response.data.status+'\')"     class="openModal"    title="Delete Sequence"> <i class="fa fa-trash-o fa-2x"></i></a> &nbsp;';
										}
										if(response.data.status != 'in-complete'){
											html += '<a href="/sequence/sequence-files/'+response.data.id+'" id="sequence_show_'+response.data.id+'"     class="showSequence" title="Show Sequence">   <i class="fa fa-search fa-2x"></i></a> &nbsp;';
										}
                                        if(response.data.status == 'new' || response.data.status == 'interrupt'){
                                             html += '<a href="/sequence/sequence-schedule/'+response.data.id+'" id="sequence_schedule_'+response.data.id+'" class="showSchedule" title="Schedule Sequence"> <i class="fa fa-clock-o fa-2x"></i></a>';
                                        }
                                        html += '</td>' ;   
                                        $('#seq_'+response.data.id).append(html);
                                
                                        $('#sequenceForm').trigger("reset");
                                        $('#submitButton').html('Save');
                                        $("#form_header").html('Add Sequence');
                                        
                                        message = ' Sequence ID '+response.data.id+' data updated successfully. Cron will automatically add files of this sequences in database.';
                                        $("#message").show()
                                            .removeClass()
                                            .css( "display","block" )
                                            .addClass("alert alert-success fade in")
                                            .html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Updated ! </strong>' + message);

                                    }

                                }else if(response.msg == 'exist'){  
                                    // already exist
                                    message = ' Range already exist in sequence ID '+response.data+'!';
                                    $("#message").show()
                                        .removeClass()
                                        .css( "display","block" )
                                        .addClass("alert alert-warning fade in")
                                        .html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Error ! </strong>' + message);

                                }else{
                                     // error occur during saving data in db table
                                    message = ' Please try again.';
                                    $("#message").show()
                                        .removeClass()
                                        .css( "display","block" )
                                        .addClass("alert alert-warning fade in")
                                        .html('<button data-dismiss="alert" class="close">×</button><i class="fa-fw fa fa-check"></i><strong>Error ! </strong>' + message);
                                }
                            }

                        }); // ajax closed here                 
                    }
               });
               
        </script>
