
// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    // requirement
    if($("#schedule_name").val()==''){
        $("#schedule_name").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'schedule/create_new_schedule';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmSchedule").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add schedule
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add schedule
            datable_result.ajax.reload();
        }
    });

});

