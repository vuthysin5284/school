// JavaScript Document
var datable_result;
var _url_path =  baseurl+'enrolment/new_enrolment/';
var _url_edit = baseurl+'enrolment/new_enrolment/';
var _url_del =  baseurl+'enrolment/delete/';

$(document).ready(function() {
    datable_result = $('#datable_classify_score').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true,

        dom             : "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        buttons: [
            {extend: 'copy',className: 'btn-sm'},
            {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'print',className: 'btn-sm'}
        ],

        "ajax"       : {
            "url"    : baseurl+'staff/get_employee_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: "<img src='"+baseurl+"assets/images/reload.gif'>",
            loadingRecords: "<img src='"+baseurl+"assets/images/reload.gif'>",
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "employee_number"},
            { "data" : "latin_name" },
            { "data" : "gender" },
            { "data" : "position" },
            { "data" : "position" },
            { "data" : "position" },
            { "data" : "position" }
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

