
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#last_name_kh").val()==''){
        $("#last_name_kh").css('border','1px solid red');
        return false;
    }
	
	var pb_crud_id = $('#pb_crud_id').val();
    //var enrolment_id = $('#enrolment_id').val();
	
	 $.ajax({
        type: "POST",
        url: baseurl+'staff/new_employee_general',
        dataType:"JSON",
        data: $("#frmNewEmployeeGeneral").serialize()+ "&pb_crud_id=" + pb_crud_id,/*+ "&enrolment_id=" + enrolment_id,*/ // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide'); 
        }
    }); 

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

