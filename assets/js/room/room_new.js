
// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    // requirement
    if($("#room_number").val()==''){
        $("#room_number").css('border','1px solid red');
        return false;
    }
    // requirement
    if($("#room_name").val()==''){
        $("#room_name").css('border','1px solid red');
        return false;
    }
    // requirement
    if($("#building_id").val()=='0'){
        $("#building_id").css('border','1px solid red');
        return false;
    }
    // requirement
    if($("#floor_id").val()=='0'){
        $("#floor_id").css('border','1px solid red');
        return false;
    }
   

    var url = baseurl+'room/create_new_room';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewRoom").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

});

