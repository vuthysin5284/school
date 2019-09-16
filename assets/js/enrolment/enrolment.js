// JavaScript Document
var register_datable_list;
var _url_path =  baseurl+'enrolment/new_enrolment/';
var _url_edit = baseurl+'enrolment/new_enrolment/';
var _url_admin = baseurl+'enrolment/admin_enrolment/';
var _url_del =  baseurl+'enrolment/delete/';
var _url_del =  baseurl+'enrolment/delete/';
var _img =  baseurl+'uploads/student_image/1.jpg';

$(document).ready(function() {
    register_datable_list = $('#datable_enrolment').DataTable( {
        fixedHeader: {
            header: true,
            footer: true
        },
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
                    register_datable_list.draw();
                }
            }
        ],
        "ajax"       : {
            "url"    : baseurl+'student/get_enrolment_data',
            "type"   : 'POST',
            "data"   : function(data) {
                data.running_session = $('#sl_running_session').val();
                data.classes = $('#sl_classes').val();
                data.section = $('#sl_section').val();
            },
            //'success': function(data){
                //if(data.data=='time_out'){
                 //   window.location.href = baseurl+'login';
                //}

            //},
            "destroy" : true
        },
        language: {
            //processing: _progImg,
            loadingRecords: _progImg,
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            /*{ "data" : "id",
                render: function (data, type, row, meta) {
                    var auto_num = meta.row + meta.settings._iDisplayStart + 1;
                    return  auto_num;//"krs<br />"+('00000000' + auto_num).slice(-8);
                },"searchable": false
            },*/
            { "data" : "image" ,
                'render': function (data, type, full, meta) {
                    return '<img src="'+_img+'" class="img" />';
                },
                "searchable": false
            },
            { "data" : "khmer_name" ,
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(oData.khmer_name+' - '+oData.latin_name+'<div>Sex: '+oData.gender_name +'</div>' +
                        '<div>ID: '+oData.enrolment_id+'</div>');
                }
            },
            { "data" : "dob",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(oData.dob+'<div>'+oData.id+' Years</div>');
                },
                "searchable": false
            },
            {
                "data": "session_name",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(oData.session_name + '<div>Next paid: 2018-01-10 </div>');
                },
                "searchable": false
            },
            {
                "data": "section_name",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {

                    var newD = new Date(oData.created_date);

                    $(nTd).html(oData.section_name + '<div>Register: ' + newD.getFullYear() + '-' + newD.getMonth() + '-' + newD.getDate() + '</div>');
                },
                "searchable": false
            },
            {
                "data": "class_name",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(oData.class_name + '<div>' + oData.section_name + '</div>');
                },
                "searchable": false
            },
            { "data" : "language",
                "searchable": false},

            { "data" : "id",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                        '<center>'+
                        //'<a href="javascript:void(0);" title="Edit student" class="btn btn-info" ' +
                        //'onclick="showAjaxModal(\''+_url_edit+oData.id+'/edit/share\');"><i class="fa fa-pencil-square-o"></i></a> | '+
                        //'<a href="#" class="btn btn-info" title="Admin" ' +
                        //'onclick="showAjaxModal(\''+_url_admin+oData.id+'/admin/share\');"><i class="fa fa-wrench"></i></a> | '+
                        '<a href=\''+baseurl+'main/profile/'+oData.id+'\' class="btn btn-info" title="Student Profiles"><i class="fa fa-user"></i></a>'+
                        '</center>');
                },"searchable": false
            }
        ],
        "order": [[0, 'desc']]
    });


    // on the button search
    $('#btnSearchStudent').on('click',function (evt) {
        evt.preventDefault();
        //var running_session = $('#sl_running_session').val();
        //var classes = $('#sl_classes').val();
        //var section = $('#sl_section').val();
        register_datable_list.ajax.reload();
    });
});

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
            register_datable_list.draw();
        }
    });
}


// listener waiting on session change
$("#sl_running_session").on('change',function(e) {

    var url = baseurl+'lookup/getSectionListBySessionId';
    $.ajax({
        type: "POST",
        url: url,
        dataType:"JSON",
        data: {session_id : $(this).find(":selected").val()}, // serializes the form's elements.
        success: function(data){
            // close modal add product
            $('#sl_section').empty().append($('<option>... Section ...</option>'));
            $('#sl_classes').empty().append($('<option>... Grade ...</option>'));
            // session
            $.each(data.session, function (i, item) {
                $('#sl_section').append($('<option>', {
                    value: item.id,
                    text : item.section_name
                }));
            });
            // class
            $.each(data.class, function (i, item) {
                $('#sl_classes').append($('<option>', {
                    value: item.id,
                    text : item.classes_name
                }));
            });
        }
    });

    e.preventDefault();
});


