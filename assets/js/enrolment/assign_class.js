
// on the button click submit create only
$("#btnAssignClassSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    new_assign_class();
});

function new_assign_class(){
    var pb_crud_id = $('#pb_crud_id').val();
    var enrolment_id = $('#enrolment_id').val();
    $.ajax({
        type: "POST",
        url: baseurl+'enrolment/new_assign_class',
        dataType:"JSON",
        data: $("#frmNewAssignClass").serialize()+ "&pb_crud_id=" + pb_crud_id+ "&enrolment_id=" + enrolment_id, // serializes the form's elements.
        success: function(data){
            $('#modal_ajax').modal('hide');
        }
    });


}
