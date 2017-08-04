
// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    // requirement
    if($("#times_name").val()==''){
        $("#times_name").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'times/create_new_times';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmTimes").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add times
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add times
            datable_result.ajax.reload();
        }
    });

});

