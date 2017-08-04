
// this is the id of the form
$("#btnSaveNew").on('click',function(e) {
    //alert("Save new");

    // Requirement
     if($("#enrolment_name").val()==''){
         $("#enrolment_name").css('border','1px solid red');
         return false;
     }

     if($("#enrolment_email").val()==''){
         $("#enrolment_email").css('border','1px solid red');
         return false;
     }
    
    if($("#enrolment_address").val()==''){
        $("#enrolment_address").css('border','1px solid red');
        return false;
    }

    e.preventDefault();
});


$("#btnSubmit").on('click',function(e) {
    //$('#modal_ajax').modal('hide');
    //$('#document_render').html();

    // Requirement
     if($("#enrolment_name").val()==''){
         $("#enrolment_name").css('border','1px solid red');
         return false;
     }

     if($("#enrolment_email").val()==''){
         $("#enrolment_email").css('border','1px solid red');
         return false;
     }
    
    if($("#enrolment_address").val()==''){
        $("#enrolment_address").css('border','1px solid red');
        return false;
    }



    $.ajax({
        type: "POST",
        url: baseurl+'student/enrolment_detail_info',
        //dataType:"JSON",
        //data: $("#frmNewEnrolment").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            $('#document_render').html(data);
        }
    });

    

    // var url = baseurl+'enrolment/create_new_enrolment';
    // $.ajax({
    //     type: "POST",
    //     url: baseurl+'student/enrolment_detail',
    //     dataType:"JSON",
    //     data: $("#frmNewEnrolment").serialize(), // serializes the form's elements.
    //     success: function(data){
    //         // close modal add product
    //         $('#modal_ajax').modal('hide');
    //         // this table call from pricebook js to modal add product
    //         datable_result.ajax.reload();
    //     }
    // });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

