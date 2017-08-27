 
$(document).ready(function () { 
	
	/* student detail */
	 $("#students li > a").click(function () {

        $("#students_render").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='"+
												baseurl+"assets/images/reload.gif' alt='Loading' /> <br> </div>");
        $("#students li").removeClass('active');
        $(this).parent('li').addClass('active');
        $.ajax({
            url: this.href, success: function (html) {
                $("#students_render").empty().append(html);
                $('.tooltipHere').tooltip('hide');
            }
        });
        return false;
    });

    urls = $('#students li:first-child a').attr("href"); 
    $("#student_render").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='"+
											baseurl+"assets/images/reload.gif' alt='Loading' /> <br>  </div>");
    $.ajax({
        url: urls, success: function (html) {
            $("#students_render").empty().append(html);
            $('.tooltipHere').tooltip('hide');
 
        }
    }); 
 

}); // end Ready


	
