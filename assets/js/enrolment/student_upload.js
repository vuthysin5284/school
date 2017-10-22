
// on the button click submit create only
$("#btnStudentUploadSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    new_upload();
});

function new_upload(){
    var pb_crud_id = $('#pb_crud_id').val();
    var enrolment_id = $('#enrolment_id').val();

    $.ajax({
        type: "POST",
        url: baseurl+'enrolment/new_student_upload',
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        data: $("#frmNewStudentUpload").serialize()+ "&pb_crud_id=" + pb_crud_id+ "&enrolment_id=" + enrolment_id, // serializes the form's elements.
        success: function(data){
            $('#modal_ajax').modal('hide');
        }
    });


}
