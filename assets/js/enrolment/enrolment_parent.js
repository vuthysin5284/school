
// on the button click submit create only
$("#btnParentSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    create_new_parent();
});

function create_new_parent(){
    var pb_crud_id = $('#pb_crud_id').val();
    var enrolment_id = $('#enrolment_id').val();
    $.ajax({
        type: "POST",
        url: baseurl+'enrolment/create_enrolment_parent',
        dataType:"JSON",
        data: $("#frmNewParent").serialize()+ "&pb_crud_id=" + pb_crud_id+ "&enrolment_id=" + enrolment_id, // serializes the form's elements.
        success: function(data){
            $('#modal_ajax').modal('hide');
        }
    });


}
