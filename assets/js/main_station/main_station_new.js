
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#main_station").val()==''){
        $("#main_station").css('border','1px solid red');
        return false;
    }
    if($("#section_name").val()==''){
        $("#section_name").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'main_station/create_new_main_station';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewMainstation").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

