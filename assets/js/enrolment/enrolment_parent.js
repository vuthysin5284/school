 // on action copy information from parent to resposible base student
function onCopyParent(type){
    if(type==1){
        $("input[name='responsibility_kh']").val($("input[name='father_name_kh']").val());
        $("input[name='responsibility_en']").val($("input[name='father_name_en']").val());
        $("input[name='resp_occupation']").val($("input[name='occupation']").val());
        $("input[name='resp_phone_number']").val($("input[name='phone_number']").val());
    }else{
        $("input[name='responsibility_kh']").val($("input[name='mother_name_kh']").val());
        $("input[name='responsibility_en']").val($("input[name='mother_name_en']").val());
        $("input[name='resp_occupation']").val($("input[name='occupation_m']").val());
        $("input[name='resp_phone_number']").val($("input[name='phone_number_m']").val());
    }
    $("input[name='resp_address']").val($("input[name='address']").val());
    $("input[name='resp_address1']").val($("input[name='address1']").val());
    $("input[name='resp_address2']").val($("input[name='address2']").val());
    $("input[name='resp_address3']").val($("input[name='address3']").val());
    $("input[name='resp_address4']").val($("input[name='address4']").val());
}
