
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#session_id").val()==''){
        $("#session_id").css('border','1px solid red');
        return false;
    }
    if($("#classes_id").val()==''){
        $("#classes_id").css('border','1px solid red');
        return false;
    }
	if($("#section_name").val()==0){
        $("#section_name").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'schoolsection/create_new_section';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewSection").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

