
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#job_level_name").val()==''){
        $("#job_level_name").css('border','1px solid red');
        return false;
    }
    /*if($("#description").val()==''){
        $("#description").css('border','1px solid red');
        return false;
    }*/

    var url = baseurl+'job_level/create_new_job_level';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewJoblevel").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

