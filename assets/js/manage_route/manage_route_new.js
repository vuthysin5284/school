// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    // requirement
    if($("#route_name").val()==''){
        $("#route_name").css('border','1px solid red');
        return false;
    }
	// requirement
    if($("#route_fare").val()==''){
        $("#route_fare").css('border','1px solid red');
        return false;
    }
	// requirement
    if($("#two_way").val()==''){
        $("#two_way").css('border','1px solid red');
        return false;
    }
	// requirement
    if($("#one_way").val()==''){
        $("#one_way").css('border','1px solid red');
        return false;
    }
    var url = baseurl+'manage_route/create_new_route';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewRoute").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

