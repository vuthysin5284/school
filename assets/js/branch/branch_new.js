
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#branch_name_kh").val()==''){
        $("#branch_name_kh").css('border','1px solid red');
        return false;
    }
    if($("#branch_name").val()==''){
        $("#branch_name").css('border','1px solid red');
        return false;
    }
    if($("#phone_number").val()==''){
        $("#phone_number").css('border','1px solid red');
        return false;
    }
    if($("#prefix").val()==''){
        $("#prefix").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'branch/create_new_branch';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmBranch").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

