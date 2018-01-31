// JavaScript Document
var datable_result;
var _url_path =  baseurl+'ItemSetup/admin_item_fee_new/';
var _url_del  =  baseurl+'ItemSetup/delete/';

$(document).ready(function() {
    datable_result = $('#datable_admin_item').DataTable( {
        "filter"        : true,
        "info"          : true,
        "paging"        : true,
        "ordering"      : true,
        "processing"    : true,
        "serverSide"    : true ,

        "ajax"       : {
            "url"    : baseurl+'ItemSetup/admin_item_fee_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: "<img src='"+baseurl+"assets/images/reload.gif'>",
            loadingRecords: "<img src='"+baseurl+"assets/images/reload.gif'>",
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "id",
                render: function (data, type, row, meta) {
                    var auto_num = meta.row + meta.settings._iDisplayStart + 1;
                    return  auto_num;//"krs<br />"+('00000000' + auto_num).slice(-8);
                },"searchable": false
            },
            { "data" : "description"},
            { "data" : "status",
                "fnCreatedCell" : function (nTd, sData, oData, iRow, iCol) {
                    var yesno = oData.is_delete==0?(oData.status==1?'Active':'Inactive'): '<font color="red">Deleted</font>';
                    $(nTd).html(yesno);
                }
            },
            { "data" : "id",
                "fnCreatedCell" : function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                        '<center>'+
                        '<a href="javascript:void(0);" class="label label-info" onclick="showAjaxModal(\''+_url_path+oData.id+'/edit/\');">' +
                        '<i class="fa fa-pencil-square-o"></i></a>'+
                        //'&nbsp;|&nbsp;<a href="#" class="label label-danger" onclick="on_delete_data(\''+_url_del+oData.id+'\');"><i class="fa fa-trash"></i></a>'+
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