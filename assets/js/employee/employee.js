// JavaScript Document
var datable_result;
var _url_path =  baseurl+'employee/new_employee/';
var _url_edit = baseurl+'staff/employee_detail_info/';
var _url_del =  baseurl+'employee/delete/';
var _img =  baseurl+'uploads/student_image/1.jpg';

$(document).ready(function() {
    datable_result = $('#datable_employee').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true ,
        "dom"             : "<'row'<'col-sm-3'l><'col-sm-6'B><'col-sm-3'f>>tr<'col-sm-3'i>p",
        buttons: [
            {extend: 'copy',className: 'btn-sm'},
            {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'print',className: 'btn-sm'},
            {
                text: 'Refresh', action: function () {
                    datable_result.draw();
                    //datable_result.ajax.reload();
                }
            }
        ],
        "ajax"       : {
            "url"    : baseurl+'staff/get_employee_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: _progImg,
            loadingRecords: _progImg,
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "image" ,
                'render': function (data, type, full, meta) {
                    return '<img src="'+_img+'" class="img" />';
                }
            },
            { "data" : "first_name_kh" ,
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var _val = oData.first_name_kh+' '+oData.last_name_kh+' - '+oData.latin_first_name+' '+oData.latin_last_name
                        +'<div>'+oData.date_of_birth+'</div:>'
                        +'<div>Code: '+oData.emp_code+'</div:>';
                    $(nTd).html(_val);
                }
            },
			{ "data" : "gender_id" },
			{ "data" : "department",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var _val = oData.department+'<div>Position: '+oData.position_level+'</div:>';
                    $(nTd).html(_val);
                }
            },
			{ "data" : "home_phone" },
			{ "data" : "hired_date" },
			{ "data" : "email_address" },
            { "data": "staff_type"},
           { "data" : "id",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                        '<center>'+                                             
                        '<a href="javascript:void(0);" class="label label-info" onclick="showAjaxModal(\''+_url_edit+oData.id+'/edit/share\');"><i class="fa fa-pencil-square-o"></i></a>&nbsp;|&nbsp;'+
                        '<a href="#" class="label label-danger" onclick="on_delete_data(\''+_url_del+oData.id+'\');"><i class="fa fa-trash"></i></a>'+
                        '</center>');
                }
            }
        ],
        "order": [[0, 'desc']]
    });
} );



//
function edit_employee_data(url){
    $.ajax({
        type: "POST",
        url: url,
        //dataType:"JSON",
        //data: $("#frmNewEnrolment").serialize(), // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#modal_ajax').modal('hide');
            $('#document_render').html(data);
        }
    });
}

//
function on_delete_data(url){
    delete_data(url,remove_row);
}
//
function remove_row(url){
    $.ajax({
        type: "POST",
        url: url,
        success: function(data){
            datable_result.draw();
        }
    });
}



