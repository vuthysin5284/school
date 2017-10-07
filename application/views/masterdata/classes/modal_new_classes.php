 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_class');?></h4>
</div>


<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($classes_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewClasses', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $classes_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('classes_number');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="classes_number" name="classes_number" placeholder="classes number"  value="<?php echo $classes_detail["classes_number"]?>" />
            </div>
        </div>
        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('classes_name');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="classes_name" name="classes_name" placeholder="classes name" value="<?php echo $classes_detail["classes_name"]?>" />
            </div>
        </div>
        
       <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('room');?> <span class="red">*</span>
            </label>
            <div class="col-sm-8">
                <select class="form-control" id="room_id" name="room_id" >
                    <option value="0">... room ...</option>
                    <?php
					
                    foreach($room_list as $r){
						
                        $selected = ($r->room_number==$classes_detail["room_id"])?" selected":"";
                        echo "<option value='".$r->room_number."' ".$selected.">".$r->room_number."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>

    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control"  name="description"  value="<?php echo $classes_detail["description"]?>"/>
             </div>
        </div> 
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status"
                <?php echo $classes_detail["id"]==''?'checked':'';?>
                 <?php echo $classes_detail["status"]==0?'':'checked';?>/>
            	<label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($classes_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/classes/classes_new.js"></script>
 