
// on the button click submit create only
$("#btnResponsibleSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    create_new_student(2);
});

function create_new_student(status){
    var pb_crud_id = $('#pb_crud_id').val();
    $.ajax({
        type: "POST",
        url: baseurl+'enrolment/create_enrolment_responsible',
        dataType:"JSON",
        data: $("#frmNewResponsible").serialize()+ "&pb_crud_id=" + pb_crud_id, // serializes the form's elements.
        success: function(data){
            //$("#pb_hidden_id").val(data.enrolment_id);
        }
    });


}
