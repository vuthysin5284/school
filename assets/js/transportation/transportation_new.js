// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    // requirement
    if($("#route_name").val()==''){
        $("#route_name").css('border','1px solid red');
        return false;
    }
    var url = baseurl+'transportation/create_new_transportation';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewTransportation").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

