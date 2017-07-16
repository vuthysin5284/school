
// this is the id of the form
$("#btnSubmit").on('click',function(e) {

    // requirement
    if($("#country_name").val()==''){
        $("#country_name").css('border','1px solid red');
        return false;
    }
    if($("#nationality").val()==''){
        $("#nationality").css('border','1px solid red');
        return false;
	}
	 if($("#short_name").val()==''){
        $("#short_name").css('border','1px solid red');
        return false;
	}

    var url = baseurl+'country/create_new_country';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: $("#frmNewCountry").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            // this table call from pricebook js to modal add product
            datable_result.ajax.reload();
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

