
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#classes_number").val()==''){
        $("#classes_number").css('border','1px solid red');
        return false;
    }
    if($("#classes_name").val()==''){
        $("#classes_name").css('border','1px solid red');
        return false;
    }
	if($("#room_id").val()==0){
        $("#room_id").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'classes/create_new_classes';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewClasses").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

