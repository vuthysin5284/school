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


