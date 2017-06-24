 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create_new_route');?></h4>
</div>
<hr style="margin-top: -10px;"/>

<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($route_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewRoute', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $route_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('route_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="route_name" name="route_name" value="<?php echo $route_detail["route_name"]?>" placeholder="route name"  autofocus />
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('route_fare');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="route_fare" name="route_fare" placeholder="route fare" value="<?php echo $route_detail["route_fare"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('two_way');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="two_way" name="two_way" placeholder="two way" value="<?php echo $route_detail["two_way"]?>" />
            </div>
        </div>

    	<div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('one_way');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="one_way" name="one_way" placeholder="one way" value="<?php echo $route_detail["one_way"]?>" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="description" name="description"  value="<?php echo $route_detail["description"]?>"/>
             </div>
        </div> 
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status" <?php echo $route_detail["status"]==1?'checked':'';?>/>
            	<label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($route_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>

 <script src="<?php echo base_url();?>assets/js/manage_route/manage_route_new.js"></script>