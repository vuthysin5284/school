
// this is the id of the form
$("#btnDeductionItemSubmit").on('click',function(e) {

    // requirement
    if($("#deduction_number").val()==''){
        $("#deduction_number").css('border','1px solid red');
        return false;
    }
    if($("#deduction_item").val()==''){
        $("#deduction_item").css('border','1px solid red');
        return false;
    }
    if($("#description").val()==''){
        $("#description").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'deduction_item/create_new_deduction_item';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmDeductionItem").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

