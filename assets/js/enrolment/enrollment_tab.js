 
$(document).ready(function () {
	
	/* enrol */
	 $("#enrollment li > a").click(function () {

        $("#enrol_render").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='"+
												baseurl+"assets/images/reload.gif' alt='Loading' /> <br> </div>");
        $("#enrollment li").removeClass('active');
        $(this).parent('li').addClass('active');
        $.ajax({
            url: this.href,
            success: function (html) {
                $("#enrol_render").empty().append(html);
                $('.tooltipHere').tooltip('hide');
            }
        });
        return false;
    });

    urls = $('#enrollment li:first-child a').attr("href");
    $("#enrol_render").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='"+
											baseurl+"assets/images/reload.gif' alt='Loading' /> <br>  </div>");
    $.ajax({
        url: urls,
        success: function (html) {
            $("#enrol_render").empty().append(html);
            $('.tooltipHere').tooltip('hide');
 
        }
    }); 
 

}); // end Ready


	
