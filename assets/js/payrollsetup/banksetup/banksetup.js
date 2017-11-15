// JavaScript Document
var datable_result;
var _url_path =  baseurl+'banksetup/new_banksetup/';
var _url_del =  baseurl+'banksetup/delete/';

$(document).ready(function() {
    datable_result = $('#datable_banksetup').DataTable( {
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
            "url"    : baseurl+'banksetup/banksetup_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: "<img src='"+baseurl+"assets/images/reload.gif'>",
            loadingRecords: "<img src='"+baseurl+"assets/images/reload.gif'>",
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "bank_number" },
            { "data" : "bank_name"},
            { "data" : "transfer_fee" },
            { "data" : "remark" },
            { "data" : "status",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var status = (oData.status==1)?'Active':'<font color="red">Inactive</font>';
                    $(nTd).html(status);
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

