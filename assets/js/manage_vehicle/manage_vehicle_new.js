// JavaScript Document
// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    // requirement
    if($("#vehicle_number").val()==''){
        $("#vehicle_number").css('border','1px solid red');
        return false;
    }
    if($("#total_seat").val()==''){
        $("#total_seat").css('border','1px solid red');
        return false;
    }
	if($("#total_seat_allow").val()==''){
        $("#total_seat_allow").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'manage_vehicle/create_new_vehicle';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewVehicle").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

