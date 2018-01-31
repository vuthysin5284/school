// JavaScript Document
var datable_result;
var _url_path =  baseurl+'prizelist/prize_list_new/';
var _url_del  =  baseurl+'prizelist/delete/';

$(document).ready(function() {
    datable_result = $('#datable_prize_list').DataTable( {
        "filter"        : false,
        "info"          : false,
        "paging"        : true,
        "ordering"      : false,
        "processing"    : true,
        "serverSide"    : true ,
        "dom": 'ftipr',

        "ajax"       : {
            "url"    : baseurl+'prizelist/prize_list_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: "<img src='"+baseurl+"assets/images/reload.gif'>",
            loadingRecords: "<img src='"+baseurl+"assets/images/reload.gif'>",
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "id"},
            { "data" : "description"},
            {
                "data": "prize",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    var prize = oData.prize+' USD';
                    $(nTd).html(prize);
                }
            },
            { "data" : "status",
                "fnCreatedCell" : function (nTd, sData, oData, iRow, iCol) {
                    var yesno = oData.status==1?'Active':'Inactive';
                    $(nTd).html(yesno);
                }
            },
            { "data" : "id",
                "fnCreatedCell" : function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                        '<center>'+
                        '<a href="javascript:void(0);" class="label label-info" onclick="showAjaxModal(\''+_url_path+oData.id+'/edit/\');"><i class="fa fa-pencil-square-o"></i></a>'+
                        //'<a href="#" class="label label-danger" onclick="on_delete_data(\''+_url_del+oData.id+'\');"><i class="fa fa-trash"></i></a>'+
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