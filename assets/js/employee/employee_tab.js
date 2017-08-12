 
$(document).ready(function () { 
	
	/* employee detail */
	 $("#employee li > a").click(function () {

        $("#employee_render").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='"+
												baseurl+"assets/images/reload.gif' alt='Loading' /> <br> </div>");
        $("#employee li").removeClass('active');
        $(this).parent('li').addClass('active');
        $.ajax({
            url: this.href, success: function (html) {
                $("#employee_render").empty().append(html);
                $('.tooltipHere').tooltip('hide');
            }
        });
        return false;
    });

    urls = $('#employee li:first-child a').attr("href"); 
    $("#employee_render").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='"+
											baseurl+"assets/images/reload.gif' alt='Loading' /> <br>  </div>");
    $.ajax({
        url: urls, success: function (html) {
            $("#employee_render").empty().append(html);
            $('.tooltipHere').tooltip('hide');
 
        }
    }); 
 

}); // end Ready


	
