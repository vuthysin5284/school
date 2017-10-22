
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#session_name").val()==''){
        $("#session_name").css('border','1px solid red');
        return false;
    }
    if($("#start_date").val()==''){
        $("#start_date").css('border','1px solid red');
        return false;
    }
	if($("#end_date").val()==0){
        $("#end_date").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'schoolsession/create_new_session';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewSession").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

