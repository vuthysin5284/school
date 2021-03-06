 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_room');?></h4>
</div>


<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($room_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewRoom', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $room_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('room_number');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="room_number" name="room_number" value="<?php echo $room_detail["room_number"]?>" placeholder="room number"  autofocus />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('room_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="building" name="room_name" placeholder="room name" value="<?php echo $room_detail["room_name"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('building');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <select class="form-control" id="building_id" name="building_id" >
                    <option value="0">... building ...</option>
                    <?php
                    foreach($building_list as $bl){
                        $selected = ($bl->id==$room_detail["building_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->building."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('floor');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <select class="form-control" id="floor_id" name="floor_id" >
                    <option value="0">... floor ...</option>
                    <?php
                        foreach($floor_list as $fl){
                            $selected = ($fl->id==$room_detail["floor_id"])?" selected":"";
                            echo "<option value='".$fl->id."' ".$selected.">".$fl->floor."</option>";

                        }
                    ?>
                </select>
            </div>
        </div>

    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
            <div class="col-sm-8">  
                <textarea class="form-control" id="description" name="description"><?php echo $room_detail["description"]?></textarea>
             </div>
        </div> 
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status" <?php echo $room_detail["status"]==0?'':'checked';?>/>
            	<label for="status"><?php echo get_phrase('status');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($room_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>


<script src="<?php echo base_url();?>assets/js/room/room_new.js"></script>