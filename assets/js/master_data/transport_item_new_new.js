// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    // requirement
    if($("#description").val()==''){
        $("#description").css('border','1px solid red');
        return false;
    }
    var url = baseurl+'transport_item_fee/create_new_transport_item_fee';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewTransportItemFee").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

