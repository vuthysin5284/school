// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    // requirement
    if($("#student_name").val()==''){
        $("#student_name").css('border','1px solid red');
        return false;
    }
	
    var url = baseurl+'testing_register/create_new_record';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewTesting").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

