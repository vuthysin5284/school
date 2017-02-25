<script type="text/javascript">
	function showAjaxModal(url)
	{
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/images/reload.gif" /></div>');
		
		// LOADING THE AJAX MODAL
		jQuery('#modal_ajax').modal('show', {static: 'true'});
		 
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
</script>

<div class="modal fade" id="modal_ajax" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: <?php echo $page_width;?>%;">
        <div class="modal-content"> 
            <div class="modal-body" style="min-height:200px; overflow:auto;"></div> 
        </div>
    </div>
</div>

 