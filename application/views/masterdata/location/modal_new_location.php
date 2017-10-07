 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create_new_location');?></h4>
</div>


<style>
    .red{
        color:red;
    }
</style>

<?php //var_dump($location_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
                'id'=>'frmNewLocation', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $location_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('location_number');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="location_number" name="location_number" value="<?php echo $location_detail["location_number"]?>" placeholder="location number"  autofocus />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('location_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="building" name="location_name" placeholder="location name" value="<?php echo $location_detail["location_name"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('building');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="building" name="building" placeholder="building" value="<?php echo $location_detail["building"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('floor');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="floor" name="floor" placeholder="floor" value="<?php echo $location_detail["floor"]?>" />
            </div>
        </div>

    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?><span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="description" name="description"  value="<?php echo $location_detail["description"]?>"/>
             </div>
        </div> 
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status" <?php echo $location_detail["status"]==0?'':'checked';?>/>
                <label for="status"><?php echo get_phrase('status');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($location_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/location/location_new.js"></script>
 