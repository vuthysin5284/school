 
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
				'id'=>'frmNewSection', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $section_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('session_name');?> <span class="red">*</span>
        </label>
        <div class="col-sm-8">
            <select class="form-control" id="session_id" name="session_id" >
                <option value="0">... session ...</option>
                <?php
                foreach($session_list as $r){

                    $selected = ($r->id==$section_detail["session_id"])?" selected":"";
                    echo "<option value='".$r->id."' ".$selected.">".$r->session_name."</option>";

                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('class_name');?> <span class="red">*</span>
        </label>
        <div class="col-sm-8">
            <select class="form-control" id="class_id" name="class_id" >
                <option value="0">... class ...</option>
                <?php
                foreach($class_list as $r){

                    $selected = ($r->id==$section_detail["class_id"])?" selected":"";
                    echo "<option value='".$r->id."' ".$selected.">".$r->classes_name."</option>";

                }
                ?>
            </select>
        </div>
    </div>



        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('section_name');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="section_name" value="<?php echo $section_detail["section_name"]?>"/>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('max_strength');?></label>
            <div class="col-sm-8">
                <input type="number" class="form-control" name="max_strength" value="<?php echo $section_detail["max_strength"]?>"/>
            </div>
        </div>


        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status"
                <?php echo $section_detail["id"]==''?'checked':'';?>
                 <?php echo $section_detail["status"]==0?'':'checked';?>/>
            	<label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($section_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/school_section/section_new.js"></script>
 