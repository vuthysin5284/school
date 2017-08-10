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

    var url = baseurl+'enrolment/create_new_enrolment';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewEnrolment").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            //$('#modal_ajax').modal('hide');
            //$('#document_render').html(data);
            $("#enrolment_name").val('');
            $("#enrolment_email").val('');
            $("#enrolment_address").val('');
            datable_result.ajax.reload();
        }
    });

    e.preventDefault();
});


$("#btnSubmit").on('click',function(e) {
    //$('#modal_ajax').modal('hide');
    //$('#document_render').html();

    // Requirement
    // load_ajax(123);
    // return false;

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

    var id = 0;
    var url = baseurl+'enrolment/create_new_enrolment';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewEnrolment").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product

            //$('#document_render').html(data);
            
            id = data.enrolment_id;
            //alert(id);
            $.ajax({
                type: "POST",
                url: baseurl + "student/enrolment_detail_info",
                data:{
                    en_id : id
                },
                //dataType:"json",
                //cache: "false",
                success: function (data1) {
                    $('#modal_ajax').modal('hide');
                    $('#document_render').html(data1);
                }
             });
            
        }
    });

    // $.ajax({
    //     type: "POST",
    //     url: baseurl + 'student/enrolment_detail_info',
    //     // data:{
    //     //     en_id : id
    //     // },
    //     //dataType:"json",
    //     //cache: "false",
    //     success: function (data) {
    //         $('#modal_ajax').modal('hide');
    //         $('#document_render').html(data);
    //     }
    // });


    // datable_result.ajax.reload();
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

