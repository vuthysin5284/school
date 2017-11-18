
// this is the id of the form
$("#btnPayrollTaxSubmit").on('click',function(e) {

    // requirement
    if($("#payroll_tax_number").val()==''){
        $("#payroll_tax_number").css('border','1px solid red');
        return false;
    }
    if($("#amount_in_riel_less_than").val()==''){
        $("#amount_in_riel_less_than").css('border','1px solid red');
        return false;
    }
    if($("#tax_percentage").val()==''){
        $("#tax_percentage").css('border','1px solid red');
        return false;
    }
    if($("#deduction_amount_in_riel").val()==''){
        $("#deduction_amount_in_riel").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'payrollsetup/create_new_payroll_tax';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmPayrollTax").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

