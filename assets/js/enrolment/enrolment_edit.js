// this is the id of the form
$("#btnEdit").on('click',function(e) {
    //alert("Save new");

    // Requirement
     if($("#name").val()==''){
         $("#name").css('border','1px solid red');
         return false;
     }

     if($("#email").val()==''){
         $("#email").css('border','1px solid red');
         return false;
     }
    
    if($("#address").val()==''){
        $("#address").css('border','1px solid red');
        return false;
    }


    var url = baseurl+'enrolment/edit_enrolment';
    $.ajax({
        type: "POST",
        url: url,
        //dataType:"JSON",
        data: $("#frmEditEnrolment").serialize(), // serializes the form's elements.
        success: function(data){
            //alert(data.enrolment_id);
            $('#document_render').html(data);
            //datable_result.ajax.reload();
        }
    });

    e.preventDefault();
});
