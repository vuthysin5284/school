// JavaScript Document
var datable_result;
var _url_path =  baseurl+'location/new_location/';
var _url_del =  baseurl+'location/delete/';

$(document).ready(function(){
    var country_id = 0;
    var province_id = 0;
    var district_id = 0;
    var commune_id = 0;
    var village_id = 0;

    $('#scountry').click(function(){
        country_id = $('#scountry').val();
        $('#country').val($('#scountry').find(":selected").text());
        $.ajax({
                type: "POST",
                url: baseurl + "location/location_list_province",
                data: {
                    country_id : country_id
                },
                dataType:"json",
                cache: "false",
                success: function (data) {
                    $('#sprovince option').remove();

                    $.each(data, function (i, province) {    
                        $('#sprovince').append($('<option>', { 
                            value: province.province,
                            text : province.name 
                        }));
                    });
                }
        });
        $('#sdistrict option').remove();
        $('#district').val('');
        $('#scommune option').remove();
        $('#commune').val('');
    });

    $('#sprovince').click(function(){
        province_id = $('#sprovince').val();
        $('#province').val($('#sprovince').find(":selected").text());
        $.ajax({
                type: "POST",
                url: baseurl + "location/location_list_district",
                data: {
                    country_id : country_id,
                    province_id : province_id
                },
                dataType:"json",
                cache: "false",
                success: function (data) {

                    $('#sdistrict option').remove();

                    $.each(data, function (i, district) {    
                        $('#sdistrict').append($('<option>', { 
                            value: district.district,
                            text : district.name 
                        }));
                    });
                }
        });
        $('#scommune option').remove();
        $('#commune').val('');
        $('#svillage option').remove();
        $('#village').val('');
    });

    $('#sdistrict').click(function(){
        district_id = $('#sdistrict').val();
        $('#district').val($('#sdistrict').find(":selected").text());
        $.ajax({
                type: "POST",
                url: baseurl + "location/location_list_commune",
                data: {
                    country_id : country_id,
                    province_id : province_id,
                    district_id : district_id
                },
                dataType:"json",
                cache: "false",
                success: function (data) {

                    $('#scommune option').remove();

                    $.each(data, function (i, commune) {    
                        $('#scommune').append($('<option>', { 
                            value: commune.commune,
                            text : commune.name 
                        }));
                    });
                }
        });
        $('#svillage option').remove();
        $('#Village').val('');
    });

    $('#scommune').click(function(){
        commune_id = $('#scommune').val();
        $('#commune').val($('#scommune').find(":selected").text());
        $.ajax({
                type: "POST",
                url: baseurl + "location/location_list_village",
                data: {
                    country_id : country_id,
                    province_id : province_id,
                    district_id : district_id,
                    commune_id : commune_id
                },
                dataType:"json",
                cache: "false",
                success: function (data) {

                    $('#svillage option').remove();

                    $.each(data, function (i, village) {    
                        $('#svillage').append($('<option>', { 
                            value: village.village,
                            text : village.name 
                        }));
                    });
                }
        });
    });

    $('#svillage').click(function(){
        village_id = $('#svillage').val();
        $('#Village').val($('#svillage').find(":selected").text());
    });

    $('#btnadd_country').click(function(event){
        event.preventDefault();
        var new_country = $('#country').val();
        $.ajax({
                type: "POST",
                url: baseurl + "location/new_country",
                data: {
                    new_country : new_country
                },
               dataType:"json",
                cache: "false",
                success: function (data) {
                  // alert(data);

                  if (data.status == 1) {
                     // $('#scountry').append($('<option>', { 
                     //        value: data.country_id,
                     //        text : data.country_name
                     // }));
                     $('#scountry').append('<option value="' + data.country_id + '" selected="selected">' 
                                                + data.country_name + 
                                            '</option>');
                     alert(data.message);
                  }else if(data.status == 2){
                    alert("Existing name");
                  }else{
                    alert("Failed to save");
                  }
                }
        });
    });

    $('#btnadd_province').click(function(event){
        event.preventDefault();
        //alert("Province button");
        var new_province = $('#province').val();
        $.ajax({
                type: "POST",
                url: baseurl + "location/new_province",
                data: {
                    new_province : new_province,
                    country_id : country_id
                },
                dataType:"json",
                cache: "false",
                success: function (data) {
                   //alert(data);

                  if (data.status == 1) {
                     alert(data.message);
                     // $('#sprovince').append($('<option>', { 
                     //                    value: data.province_id,
                     //                    text : data.province_name
                     //                }));
                     $('#sprovince').append('<option value="' + data.province_id + '" selected="selected">' 
                                                + data.province_name + 
                                            '</option>'); 
                     $("#sprovince").selectmenu("refresh");
                  }else if(data.status == 2){
                    alert(data.message)
                  }else{
                    alert(data.message);
                  } 
                }
         }); 
    });

    $('#btnadd_district').click(function(event){
        event.preventDefault();
        //alert("dis button");
        var new_district = $('#district').val();
        $.ajax({
                type: "POST",
                url: baseurl + "location/new_district",
                data: {
                    new_district : new_district,
                    country_id : country_id,
                    province_id : province_id
                },
                dataType:"json",
                cache: "false",
                success: function (data) {
                   //alert(data);

                  if (data.status == 1) {
                     alert(data.message);
                     $('#sdistrict').append('<option value="' + data.district_id + '" selected="selected">' 
                                                + data.district_name + 
                                            '</option>'); 
                     $("#sdistrict").selectmenu("refresh");
                  }else if(data.status == 2){
                    alert(data.message)
                  }else{
                    alert(data.message);
                  } 
                }
         }); 
    });

    $('#btnadd_commune').click(function(event){
        event.preventDefault();
        //alert("This commune");
        var new_commune = $('#commune').val();
        $.ajax({
                type: "POST",
                url: baseurl + "location/new_commune",
                data: {
                    new_commune : new_commune,
                    country_id : country_id,
                    province_id : province_id,
                    district_id : district_id
                },
                dataType:"json",
                cache: "false",
                success: function (data) {
                   //alert(data);

                  if (data.status == 1) {
                     alert(data.message);
                     $('#scommune').append('<option value="' + data.commune_id + '" selected="selected">' 
                                                + data.commune_name + 
                                            '</option>'); 
                     $("#scommune").selectmenu("refresh");
                  }else if(data.status == 2){
                    alert(data.message);
                  }else{
                    alert(data.message);
                  } 
                }
         }); 
    });

    $('#btnadd_village').click(function(event){
        event.preventDefault();
        //alert("This village");
        var new_village = $('#Village').val();
        $.ajax({
                type: "POST",
                url: baseurl + "location/new_village",
                data: {
                    new_village : new_village,
                    country_id : country_id,
                    province_id : province_id,
                    district_id : district_id,
                    commune_id : commune_id
                },
                dataType:"json",
                cache: "false",
                success: function (data) {
                   //alert(data);

                  if (data.status == 1) {
                     alert(data.message);
                     $('#svillage').append('<option value="' + data.village_id + '" selected="selected">' 
                                                + data.village_name + 
                                            '</option>'); 
                     $("#svillage").selectmenu("refresh");
                  }else if(data.status == 2){
                    alert(data.message);
                  }else{
                    alert(data.message);
                  } 
                }
         }); 
    });

    $('#btnupdate_country').click(function(event){
        event.preventDefault();

        //alert(country_id);
        var country_edit_name = $('#country').val();
        //alert(country_edit_name);
        $.ajax({
                type: "POST",
                url: baseurl + "location/update_country",
                data: {
                    country_id : country_id,
                    country_edit_name : country_edit_name
                },
                dataType:"json",
                cache: "false",
                success: function(data){
                   //alert(data.country_id);
                   if (data.status == 1) {
                        alert(data.message);
                        //$('#scountry option:selected').remove();

                        // $('#scountry').append('<option value="' + data.country_id + '" selected="selected">' 
                        //                         + data.country_edit_name + 
                        //                     '</option>'); 
                        $('#scountry option:selected').text(data.country_edit_name);
                        }else if(data.status == 0){
                            alert(data.message);
                        }
                }
         });
    });

    $('#btnupdate_province').click(function(event){
        event.preventDefault();

        //alert(country_id);
        var province_edit_name = $('#province').val();
        //alert(country_edit_name);
        $.ajax({
                type: "POST",
                url: baseurl + "location/update_province",
                data: {
                    country_id : country_id,
                    province_id : province_id,
                    province_edit_name : province_edit_name
                },
                dataType:"json",
                cache: "false",
                success: function(data){
                   //alert(data);
                   if (data.status == 1) {
                        alert(data.message);
                        $('#sprovince option:selected').text(data.province_edit_name);
                   }else if(data.status == 0){
                            alert(data.message);
                   }
                }
         });
    });

    $('#btnupdate_district').click(function(event){
        event.preventDefault();

        //alert(country_id);
        var district_edit_name = $('#district').val();
        //alert(country_edit_name);
        $.ajax({
                type: "POST",
                url: baseurl + "location/update_district",
                data: {
                    country_id : country_id,
                    province_id : province_id,
                    district_id : district_id,
                    district_edit_name : district_edit_name
                },
                dataType:"json",
                cache: "false",
                success: function(data){
                   //alert(data);
                   if (data.status == 1) {
                        alert(data.message);
                        $('#sdistrict option:selected').text(data.district_edit_name);
                   }else if(data.status == 0){
                        alert(data.message);
                   }
                }
         });
    });

    $('#btnupdate_commune').click(function(event){
        event.preventDefault();

        //alert(country_id);
        var commune_edit_name = $('#commune').val();
        //alert(country_edit_name);
        $.ajax({
                type: "POST",
                url: baseurl + "location/update_commune",
                data: {
                    country_id : country_id,
                    province_id : province_id,
                    district_id : district_id,
                    commune_id : commune_id,
                    commune_edit_name : commune_edit_name
                },
                dataType:"json",
                cache: "false",
                success: function(data){
                   //alert(data);
                   if (data.status == 1) {
                        alert(data.message);
                        $('#scommune option:selected').text(data.commune_edit_name);
                   }else if(data.status == 0){
                        alert(data.message);
                   }
                }
         });
    });

    $('#btnupdate_village').click(function(event){
        event.preventDefault();

        //alert(country_id);
        var village_edit_name = $('#Village').val();
        //alert(country_edit_name);
        $.ajax({
                type: "POST",
                url: baseurl + "location/update_village",
                data: {
                    country_id : country_id,
                    province_id : province_id,
                    district_id : district_id,
                    commune_id : commune_id,
                    village_id : village_id,
                    village_edit_name : village_edit_name
                },
                dataType:"json",
                cache: "false",
                success: function(data){
                   //alert(data);
                   if (data.status == 1) {
                        alert(data.message);
                        $('#svillage option:selected').text(data.village_edit_name);
                   }else if(data.status == 0){
                        alert(data.message);
                   }
                }
         });
    });
});


$(document).ready(function() {
    datable_result = $('#datable_location').DataTable( {
        "filter"        : true,
        "info"          : true,
        "paging"        : true,
        "ordering"      : true,
        "processing"    : true,
        "serverSide"    : true,

        "ajax"       : {
            "url"    : baseurl+'location/location_data',
            "type"   : 'POST',
            "destroy" : true
        },
        language: {
            processing: "<img src='"+baseurl+"assets/images/reload.gif'>",
            loadingRecords: "<img src='"+baseurl+"assets/images/reload.gif'>",
            "url": baseurl+"assets/langs/kh.json"
        },
        "columns"    : [
            { "data" : "location_number" },
            { "data" : "location_name"},
            { "data" : "building"},
            { "data" : "floor"},
            { "data" : "description" },
            { "data": "status",
                "fnCreatedCell" : function (nTd, sData, oData, iRow, iCol) {
                    var yesno = oData.is_delete==0?'Active':'<font color="red">Delete</font>';
                    $(nTd).html(yesno);
                }
            },
            { "data" : "id",
                "fnCreatedCell" : function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).html(
                        '<div class="btn-group">'+
                        '<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">'+
                        '<span class="caret"></span></a>'+
                        '<ul class="dropdown-menu dropdown-menu-right" role="menu">'+
                        '<li><a href="javascript:void(0);" onclick="showAjaxModal(\''+_url_path+oData.id+'/edit/share\');">Edit</a></li>'+
                        '<li><a href="#" onclick="on_delete_data(\''+_url_del+oData.id+'\');">Delete</a></li>'+
                        '</ul>'+
                        '</div>');
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

