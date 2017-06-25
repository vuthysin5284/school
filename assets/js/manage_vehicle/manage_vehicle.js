// JavaScript Document
// JavaScript Document
var datable_result;
var _url_path =  baseurl+'manage_vehicle/new_vehicle/';
var _url_del =  baseurl+'manage_vehicle/delete/';

$(document).ready(function() {
    datable_result = $('#datable_vehicle').DataTable( {
        "filter"		: true,
        "info"			: true,
        "paging"		: true,
        "ordering"		: true,
        "processing"	: true,
        "serverSide"	: true ,

        "ajax"       : {
            "url"    : baseurl+'manage_vehicle/vehicle_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: "<img src='../manage_vehicle/"+baseurl+"assets/images/reload.gif'>",
            loadingRecords: "<img src='../manage_vehicle/"+baseurl+"assets/images/reload.gif'>",
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "vehicle_number"},
            { "data" : "total_seat"},
            { "data" : "total_seat_allow"},
			{ "data" : "ownership_id" },
            { "data": "status",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    var yesno = oData.is_delete==0?(oData.status==1?'Active': 'Inactive'): '<font color="red">Delete</font>';
                    $(nTd).html(yesno);
                }
            },
            { "data" : "id",
                "fnCreatedCell"	: function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                        '<div class="btn-group">'+
                        '<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                        '<span class="caret"></span></a>'+
                        '<ul class="dropdown-menu dropdown-menu-right" role="menu">'+
                        '<li><a href="javascript:void(0);" onclick="showAjaxModal(\''+_url_path+oData.id+'/edit\');">Edit</a></li>'+
                        '<li><a href="#" onclick="on_delete_data(\''+_url_del+oData.id+'\');">Delete</a></li>'+
                        '</ul>'+
                        '</div>');
                }
            }
        ],
        "order": [[0, 'desc']],
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

