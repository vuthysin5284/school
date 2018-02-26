// this is the id of the form
$("#btnSaveNewEnrollment").on('click',function(e) {

    var url = baseurl+'enrolment/create_new_enrolment';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#wizardForm").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            register_datable_list.ajax.reload();
        }
    });

    e.preventDefault();
});


// listener waiting on session change
$("#session_name").on('change',function(e) {

    var url = baseurl+'lookup/getSectionListBySessionId';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: {session_id : $(this).find(":selected").val()}, // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#section').empty().append($('<option>... Section ...</option>'));
            $.each(data.session, function (i, item) {
                $('#section').append($('<option>', {
                    value: item.id,
                    text : item.section_name
                }));
            });
        }
    });

    e.preventDefault();
});

