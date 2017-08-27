
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#").val()==''){
        $("#").css('border','1px solid red');
        return false;
    }
	
	 $.ajax({
        type: "POST",
        url: baseurl+'testing_register/create_new_record',
        dataType:"JSON",
        data: $("#frmTesting").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
			// this table call from pricebook js to modal add product
		   // datable_result.ajax.reload();
		
        }
    });
    /*if($("#description").val()==''){
        $("#description").css('border','1px solid red');
        return false;
    }*/

    var url = baseurl+'testing_register/testing_record_detail_info';
    $.ajax({
        type: "POST",
        url: url,
       // dataType:"JSON",
      //  data: $("#frmNewTesting").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
			$('#document_render').html(data);
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

