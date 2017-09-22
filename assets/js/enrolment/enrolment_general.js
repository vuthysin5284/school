// on the button click submit create and new
$("#btnSubmitNew").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    create_new_student(1);
});
// on the button click submit create only
$("#btnSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    create_new_student(2);
});

function create_new_student(status){
    var pb_crud_id = $('#pb_crud_id').val();
    var enrolment_id = $('#enrolment_id').val();
    $.ajax({
        type: "POST",
        url: baseurl+'enrolment/create_enrolment_general',
        dataType:"JSON",
        data: $("#frmNewEnrolmentGeneral").serialize()+ "&pb_crud_id=" + pb_crud_id+ "&enrolment_id=" + enrolment_id, // serializes the form's elements.
        success: function(data){
            // close modal add product
            if(status==1){
                $("#frmNewEnrolmentGeneral").reset();
            }else if(status==2){
                $('#modal_ajax').modal('hide');
            }
        }
    });


}
