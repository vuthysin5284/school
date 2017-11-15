// on the button click submit create and new
$("#btnSubmitNew").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    create_new_testing_general(1);
});
// on the button click submit create only
$("#btnTestingGeneralSubmit").on('click',function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    create_new_testing_general(2);
});


function create_new_testing_general(status){

    var pb_crud_id = $('#pb_crud_id').val();
    var testing_enrol_id = $('#testing_enrol_id').val();

    $.ajax({
        type: "POST",
        url: baseurl+'testing_enrollment/create_new_record',
        dataType:"JSON",
        data: $("#frmTestingGeneral").serialize()+ "&pb_crud_id=" + pb_crud_id+ "&testing_enrol_id=" + testing_enrol_id, // serializes the form's elements.
        success: function(data){
            // close modal add product
            if(status==1){
                $("#frmTestingGeneral").trigger('reset');
            }else if(status==2){
                $('#modal_ajax').modal('hide');
            }
        }
    });

}

