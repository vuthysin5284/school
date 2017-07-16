
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#employee_location").val()==''){
        $("#employee_location").css('border','1px solid red');
        return false;
    }
    if($("#main_station").val()==''){
        $("#main_station").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'employee_location/create_new_employee_location';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewEmployeelocation").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

