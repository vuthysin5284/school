 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create_new_vehicle');?></h4>
</div>
<hr style="margin-top: -10px;"/>

<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($vehicle_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewVehicle', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $vehicle_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('vehicle_number');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" value="<?php echo $vehicle_detail["vehicle_number"]?>" placeholder="vehicle number"  autofocus />
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('total_seat');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="total_seat" name="total_seat" placeholder="total seat" value="<?php echo $vehicle_detail["total_seat"]?>" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('total_seat_allow');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="total_seat_allow" name="total_seat_allow" placeholder="total seat allow"  value="<?php echo $vehicle_detail["total_seat_allow"]?>"/>
             </div>
        </div> 
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('ownership_id');?> <span class="red">*</span></label>
            <div class="col-sm-8">
               <select class="form-control" id="ownership_id" name="ownership_id">
               		<option value="0">----Ownership Type----</option>
  					<?php
						foreach($ownership_list as $list){
							$select = ($list->ownership_id == $vehicle_detail['ownership_id'])?" selected":"";
							echo "<option value='".$list->ownership_id."' ".$select.">".$list->ownership_type."</option>";
						}
					?>
    		   </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status" <?php echo $vehicle_detail["status"]==1?'checked':'';?>/>
            	<label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($vehicle_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>

 <script src="<?php echo base_url();?>assets/js/manage_vehicle/manage_vehicle_new.js"></script>