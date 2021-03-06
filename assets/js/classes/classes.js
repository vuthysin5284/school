// JavaScript Document
var datable_result;
var _url_path =  baseurl+'classes/new_classes/';
var _url_del =  baseurl+'classes/delete/';

$(document).ready(function() {
    datable_result = $('#datable_classes').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true ,
        "bLengthChange" : false,
        "bPaginate"     : false,
        "dom"             : "<'row'<'col-sm-3'l><'col-sm-6'B><'col-sm-3'f>>tr<'col-sm-3'i>p",
        buttons: [
            {extend: 'copy',className: 'btn-sm'},
            {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
            {extend: 'print',className: 'btn-sm'},
            {
                text: 'Refresh', action: function () {
                    datable_result.draw();
                }
            }
        ],

        "ajax"       : {
            "url"    : baseurl+'classes/classes_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: _progImg,
            loadingRecords: _progImg,
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "session_name" },
            { "data" : "classes_number" },
            { "data" : "classes_name",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var value = oData.classes_name+"<br />"+oData.grade_abbreviation;
                    $(nTd).html(value);
                }
            },
            { "data" : "total_capacity",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var value = "Capacity : "+oData.total_capacity+"<br />Total student : "+oData.total_student;
                    $(nTd).html(value);
                }},
            { "data" : "description" },
            { "data": "status",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var yesno = oData.is_delete==0?(oData.status==1?'Active': '<font color="red">Inactive</font>'): '<font color="red">Delete</font>';
                    $(nTd).html(yesno);
                }
            },
            { "data" : "id",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html( 
						'<center>'+
							'<a href="javascript:void(0);" class="label label-info" onclick="showAjaxModal(\''+_url_path+oData.id+'/edit/share\');"><i class="fa fa-pencil-square-o"></i></a>&nbsp;|&nbsp;'+
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

