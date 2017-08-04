
// this is the id of the form
$("#btnSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    // requirement
    if($("#course_name").val()==''){
        $("#course_name").css('border','1px solid red');
        return false;
    }

    var url = baseurl+'course/create_new_course';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmCourse").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add course
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add course
            datable_result.ajax.reload();
        }
    });

});

