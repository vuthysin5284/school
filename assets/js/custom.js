/*	Table OF Contents
 ==========================
 Carousel
 Ajax Tab
 List view , Grid view  and compact view
 Global Plugins
 Customs Script
 responsive cat-collapse for homepage
 */


$(document).ready(function () {

  

    /*==================================
     Ajax Tab || CATEGORY PAGE
     ====================================*/
	 
	 /* document */
	 $("#document li > a").click(function () {

        $("#document_render").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='"+
												baseurl+"assets/images/reload.gif' alt='Loading' /> <br> </div>");
        $("#document li").removeClass('active');
        $(this).parent('li').addClass('active');
        $.ajax({
            url: this.href, success: function (html) {
                $("#document_render").empty().append(html);
                $('.tooltipHere').tooltip('hide');
            }
        });
        return false;
    });

    urls = $('#document li:first-child a').attr("href"); 
    $("#document_render").empty().append("<div id='loading text-center'> <br> <img class='center-block' src='"+
											baseurl+"assets/images/reload.gif' alt='Loading' /> <br>  </div>");
    $.ajax({
        url: urls, success: function (html) {
            $("#document_render").empty().append(html);
            $('.tooltipHere').tooltip('hide');
 
        }
    });


 

}); // end Ready


	
