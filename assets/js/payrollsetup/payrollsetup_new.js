
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#payroll_tax_name_kh").val()==''){
        $("#payroll_tax_name_kh").css('border','1px solid red');
        return false;
    }
    if($("#payroll_tax_name").val()==''){
        $("#payroll_tax_name").css('border','1px solid red');
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

    var url = baseurl+'payrollsetup/create_new_payrollsetup';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmPayrollsetup").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

