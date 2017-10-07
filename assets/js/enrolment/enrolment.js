// JavaScript Document
var datable_result;
var _url_path =  baseurl+'enrolment/new_enrolment/';
var _url_edit = baseurl+'enrolment/new_enrolment/';
var _url_del =  baseurl+'enrolment/delete/';

$(document).ready(function() {
    datable_result = $('#datable_enrolment').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true ,
        "dom": 'lBfrtip',
        "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ],
        "ajax"       : {
            "url"    : baseurl+'student/get_enrolment_data',
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
            { "data" : "dob" },
            { "data" : "gender" },
            { "data" : "academic_id" },
            { "data" : "academic_id" },
            { "data" : "times_name" },
            { "data" : "child_number" },
            { "data" : "status",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var yesno = oData.is_delete==0?(oData.status==1?'Active':'Inactive'): '<font color="red">Deleted</font>';
                    $(nTd).html(yesno);
                }
            },
            { "data" : "id",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                        '<center>'+
                        '<a href="javascript:void(0);" class="label label-info" onclick="showAjaxModal(\''+_url_edit+oData.id+'/edit/share\');"><i class="fa fa-pencil-square-o"></i></a>&nbsp;|&nbsp;'+
                        '<a href="#" class="label label-danger" onclick="on_delete_data(\''+_url_del+oData.id+'\');"><i class="fa fa-trash"></i></a>&nbsp;|&nbsp;'+
                        '<a href="#" class="label label-info" onclick="edit_enrolment_data(\''+_url_edit+oData.id+'\');"><i class="fa fa-wrench"></i></a>'+
                        '</center>');
                }
            }
        ],
        "order": [[0, 'desc']]
    });
} );

function edit_enrolment_data(url){
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

