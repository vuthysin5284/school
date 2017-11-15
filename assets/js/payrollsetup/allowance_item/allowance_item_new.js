
// this is the id of the form
$("#btnAllowanceItemSubmit").on('click',function(e) {

    // requirement
    if($("#allowance_number").val()==''){
        $("#allowance_number").css('border','1px solid red');
        return false;
    }
    if($("#period").val()==''){
        $("#period").css('border','1px solid red');
        return false;
    }
    if($("#allowance_name").val()==''){
        $("#allowance_name").css('border','1px solid red');
        return false;
    }
    if($("#description").val()==''){
        $("#description").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'allowance_item/create_new_allowance_item';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmAllowanceItem").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

