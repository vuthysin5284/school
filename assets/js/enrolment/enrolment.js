// JavaScript Document
var datable_result;
var _url_path =  baseurl+'enrolment/new_enrolment/';
var _url_edit = baseurl+'enrolment/new_enrolment/';
var _url_admin = baseurl+'enrolment/admin_enrolment/';
var _url_del =  baseurl+'enrolment/delete/';

$(document).ready(function() {
    datable_result = $('#datable_enrolment').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true ,

        dom             : "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        buttons: [
            {extend: 'copy',className: 'btn-sm'},
            {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'print',className: 'btn-sm'}
        ],
        "ajax"       : {
            "url"    : baseurl+'student/get_enrolment_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            //processing: "<img src='"+baseurl+"assets/images/reload.gif'>",
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

            { "data" : "id",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                        '<center>'+
                        '<a href="javascript:void(0);" class="label label-info" onclick="showAjaxModal(\''+_url_edit+oData.id+'/edit/share\');"><i class="fa fa-pencil-square-o"></i></a>&nbsp;|&nbsp;'+
                        '<a href="#" class="label label-danger" onclick="on_delete_data(\''+_url_del+oData.id+'\');"><i class="fa fa-trash"></i></a>&nbsp;|&nbsp;'+
                        '<a href="#" class="label label-info" onclick="showAjaxModal(\''+_url_admin+oData.id+'/admin/share\');"><i class="fa fa-wrench"></i></a>'+
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

$(document).ready(function() {
    $('#example1').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true ,

        "ajax"       : {
            "url"    : baseurl+'dashboard/data',
            "type"   : 'POST',
            "destroy" : true
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        buttons: [
            {extend: 'copy',className: 'btn-sm'},
            {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'print',className: 'btn-sm'}
        ],
        language: {
            processing: "<img src='<?php echo base_url();?>assets/images/ProgressIcon.gif'>",
            loadingRecords: "<img src='<?php echo base_url();?>assets/images/ProgressIcon.gif'>",
            "url": "<?php echo base_url();?>assets/lang/kh.json"
        },
        "columns"    : [
            { "data" : "id" },
            { "data" : "deal_name" },
            { "data" : "contact" },
            { "data" : "tags" },
            { "data" : "created_date" },
            { "data" : "value" }
        ],
        "order": [[0, 'asc']]
    });
} );