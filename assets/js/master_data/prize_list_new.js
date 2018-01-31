// this is the id of the form
$("#btnNewPrizeSubmit").on('click',function(e) {
    // requirement
    if($("#discrioption").val()==''){
        $("#discrioption").css('border','1px solid red');
        return false;
    }
    // requirement
    if($("#prize").val()==''){
        $("#prize").css('border','1px solid red');
        return false;
    }
    var url = baseurl+'prizelist/create_new_prize';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewPrizeList").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

