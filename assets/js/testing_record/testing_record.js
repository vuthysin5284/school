// JavaScript Document

var datable_result;
var _url_path =  baseurl+'testing_register/new_record/';
var _url_del =  baseurl+'testing_register/delete/';
var _url_edit = baseurl+'testing_register/new_testing_enrollment/';

$(document).ready(function() {
    datable_result = $('#datable_register').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true ,
        "bLengthChange": false,
        "bPaginate": false,
        dom             : "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        buttons: [
            {extend: 'copy',className: 'btn-sm'},
            {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'print',className: 'btn-sm'}
        ],
        "ajax"       : {
            "url"    : baseurl+'testing_register/record_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: "<img src='"+baseurl+"assets/images/reload.gif'>",
            loadingRecords: "<img src='"+baseurl+"assets/images/reload.gif'>",
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "khmer_name"},
            { "data" : "latin_name" },
            { "data" : "gender" },
			{ "data" : "date_of_birth" },
			{ "data" : "age"},
			{ "data" : "academic_year"},
			{ "data" : "expected_class"},
			{ "data" : "language"},
			{ "data" : "relative_name"},
			{ "data" : "contact_number"},
            { "data": "status",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var yesno = oData.is_delete==0?(oData.status==1?'Pending':'Inactive'): '<font color="red">Deleted</font>';
                    $(nTd).html(yesno);
                }
            },
            { "data" : "id",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html( 
						'<center>'+
							'<a href="javascript:void(0);" class="label label-info" onclick="showAjaxModal(\''+_url_edit+oData.id+'\');"><i class="fa fa-pencil-square-o"></i></a>&nbsp;|&nbsp;'+
							'<a href="#" class="label label-danger" onclick="on_delete_data(\''+_url_del+oData.id+'\');"><i class="fa fa-trash"></i></a>'+
						'</center>');
                }
            }
        ],
        "order": [[0, 'desc']]
    });
} );



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

function edit_testing(url){
	$.ajax({
        type: "POST",
        url: url,
        //dataType:"JSON",
        //data: $("#frmNewEnrolment").serialize(), // serializes the form's elements.
        success: function(data){
            //alert(data);
            
            $('#modal_ajax').modal('hide');
            $('#document_render').html(data);
        }
    });
	
	
}

