// JavaScript Document
var datable_result;
var _url_path =  baseurl+'enrolment/new_enrolment/';
var _url_edit = baseurl+'enrolment/new_enrolment/';
var _url_admin = baseurl+'enrolment/admin_enrolment/';
var _url_del =  baseurl+'enrolment/delete/';
var _img =  baseurl+'uploads/student_image/1.jpg';

$(document).ready(function() {
    datable_result = $('#datable_enrolment').DataTable( {
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
            "url"    : baseurl+'student/get_enrolment_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: _progImg,
            loadingRecords: _progImg,
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "id",
                render: function (data, type, row, meta) {
                var auto_num = meta.row + meta.settings._iDisplayStart + 1;
                    return  "krs<br />"+('00000000' + auto_num).slice(-8);
                }
            },
            { "data" : "image" ,
                'render': function (data, type, full, meta) {
                    return '<img src="'+_img+'" class="img" />';
                }
            },
            { "data" : "khmer_name" ,
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(oData.khmer_name+'<div>Sex: '+oData.gender_name +'</div>' +
                        '<div>Fee: Paid</div>');
                }
            },
            { "data" : "dob",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(oData.dob+'<div>AGE: '+oData.id+'</div>');
                }
            },
            { "data" : "session_name" ,
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(oData.session_name+'<div>Next paid date: 2018-01-10 </div>');
                }},
            { "data" : "class_name" },
            { "data" : "section_name" },
            //{ "data" : "child_number" },

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