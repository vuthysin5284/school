 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create_new_location');?></h4>
</div>
<hr style="margin-top: -10px;"/>

<style>
	.red{
		color:red;
	}
</style>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmUser', 'enctype' => 'multipart/form-data'));?>
      
        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('location_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" name="branch_name" placeholder="location name" data-validate="required"
                	data-message-required="<?php echo get_phrase('value_required');?>" autofocus />
            </div>
        </div>  
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description of location');?><span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" name="description" />
             </div>
        </div> 
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status" />
            	<label for="status"><?php echo get_phrase('status');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-group"> 
                <button type="button" class="btn btn-info pull-right" style="margin-right:20px;" data-dismiss="modal">Close</button>  
                <button type="submit" class="btn btn-info pull-right" style="margin-right:5px;" 
                	id="submit-button"><?php echo get_phrase('create');?></button>  
             
        </div>
    <?php echo form_close();?>
</div> 

 