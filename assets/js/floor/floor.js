// JavaScript Document
var datable_result;
var _url_path =  baseurl+'floor/new_floor/';
var _url_del =  baseurl+'floor/delete/';

$(document).ready(function() {
    datable_result = $('#datable_floor').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true ,

        "ajax"       : {
            "url"    : baseurl+'floor/floor_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: "<img src='"+baseurl+"assets/images/reload.gif'>",
            loadingRecords: "<img src='"+baseurl+"assets/images/reload.gif'>",
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "floor"},
            { "data" : "description" },
            { "data": "status",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var yesno = oData.is_delete==0?(oData.status==1?'Active':'Inactive'): '<font color="red">Deleted</font>';
                    $(nTd).html(yesno);
                }
            },
            { "data" : "id",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html( 
						'<center>'+
							'<a href="javascript:void(0);" onclick="showAjaxModal(\''+_url_path+oData.id+'/edit/share\');"><i class="fa fa-pencil-square-o"></i></a>&nbsp;|&nbsp;'+
							'<a href="#" onclick="on_delete_data(\''+_url_del+oData.id+'\');"><i class="fa fa-trash"></i></a>'+
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

