<script type="text/javascript">
	function showAjaxModal(url)
	{
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modal_ajax .modal-body').html(_progImg);

		// LOADING THE AJAX MODAL
		//jQuery('#modal_ajax').modal({backdrop:  'static', keyboard: false});//.draggable();
        jQuery('#modal_ajax').modal({backdrop:  'static', keyboard: false});

		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response)
			{
				//jQuery('#modal_ajax .modal-body').html(response);
				jQuery('#modal_ajax .modal-content').html(response);
			}
		});
	}

	// sub modal
    function showAjaxSubmodal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#summodal_ajax .modal-body').html(_progImg);

        // LOADING THE AJAX MODAL
        jQuery('#summodal_ajax').modal({backdrop:  'static', keyboard: false});

        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#summodal_ajax .modal-content').html(response);
            }
        });
    }
</script>

<!-- main modal -->
<div class="modal fade" id="modal_ajax" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: <?php if(isset($page_width)){echo $page_width;}?>%;">
        <div class="modal-content">
            <div class="modal-body" style="min-height:200px; overflow:auto;"></div>
        </div>
    </div>
</div>

<!-- sub modal -->
<div class="modal fade submodal" id="summodal_ajax" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 40%;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14),0 1px 5px 0 rgba(0, 0, 0, 0.12),0 3px 1px -2px rgba(0, 0, 0, 0.2);">
        <div class="modal-content">
            <div class="modal-body" style="min-height:200px; overflow:auto;"></div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function delete_data(url,callback){
        jQuery('#delete_data_modal').modal({backdrop:  'static', keyboard: false});
        $('#delete_link').unbind("click").click(function(e){

            e.stopPropagation();
            callback(url);
            $('#delete_data_modal').modal('hide');

        });
    }
</script>

<!-- (Normal Modal)-->
<div class="modal fade" id="delete_data_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">

            <button type="button" style="margin-right:50px;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <br />
            <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
            <br />
            <br />
            <div class="modal-footer" style="padding-bottom:10px;margin:0px; border-top:0px; text-align:center;">
                <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo get_phrase('no');?></button>
                <a href="#" class="btn btn-danger" id="delete_link"><?php echo get_phrase('yes');?></a>
            </div>
        </div>
    </div>
</div>

