 
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
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('session_name');?> <span class="red">*</span>
            </label>
            <div class="col-sm-8">
                <select class="form-control" id="session_id" name="session_id" >
                    <option value="0">... session ...</option>
                    <?php
                        foreach($session_list as $r){
                            $selected = ($r->id==$classes_detail["session_id"])?" selected":"";
                            echo "<option value='".$r->id."' ".$selected.">".$r->session_name."</option>";

                        }
                    ?>
                </select>
            </div>
        </div>


    <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('class_number');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="classes_number" name="classes_number" placeholder="class number"  value="<?php echo $classes_detail["classes_number"]?>" />
            </div>
        </div>
        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('class_name');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="classes_name" name="classes_name" placeholder="class name" value="<?php echo $classes_detail["classes_name"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('class_abbreviation');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="grade_abbreviation" value="<?php echo $classes_detail["grade_abbreviation"]?>"/>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('total_capacity');?></label>
            <div class="col-sm-8">
                <input type="number" class="form-control" name="total_capacity" value="<?php echo $classes_detail["total_capacity"]?>"/>
            </div>
        </div>

        <?php if($crud=="edit"){?>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('total_student');?></label>
            <div class="col-sm-8">
                <input type="number" readonly="true" class="form-control" name="total_student" value="<?php echo $classes_detail["total_student"]?>"/>
            </div>
        </div>
        <?php }?>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
            <div class="col-sm-8">
                <textarea class="form-control" name="description"><?php echo $classes_detail["description"]?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('order_number');?></label>
            <div class="col-sm-8">
                <input type="number" class="form-control" name="order_number" value="<?php echo $classes_detail["order_number"]?>" />
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
 