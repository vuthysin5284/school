
// this is the id of the form
$("#btnBankSetupSubmit").on('click',function(e) {

    // requirement
    if($("#bank_number").val()==''){
        $("#bank_number").css('border','1px solid red');
        return false;
    }
    if($("#bank_name").val()==''){
        $("#bank_name").css('border','1px solid red');
        return false;
    }
    if($("#transfer_fee").val()==''){
        $("#transfer_fee").css('border','1px solid red');
        return false;
    }
    if($("#remark").val()==''){
        $("#remark").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'banksetup/create_new_banksetup';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmBanksetup").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

