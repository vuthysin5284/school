 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create_new_record');?></h4>
</div>
<hr style="margin-top: -10px;"/>

<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($record_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewTesting', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $record_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('student_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $record_detail["student_name"]?>" placeholder="student name"  autofocus />
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('middle_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="middle name" value="<?php echo $record_detail["middle_name"]?>" />
            </div>
        </div>
               
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender_id');?> <span class="red">*</span></label>
            <div class="col-sm-8">
               <select class="form-control" id="gender_id" name="gender_id">
               		<option value="0">----gender----</option>
  					<?php
						foreach($gender_list as $list){
							$select = ($list->id == $record_detail['gender_id'])?" selected":"";
							echo "<option value='".$list->id."' ".$select.">".$list->gender."</option>";
						}
					?>
    		   </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="nationality" value="<?php echo $record_detail["nationality"]?>" />
            </div>
        </div>
        
         <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date_of_birth');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="date of birth" value="<?php echo $record_detail["date_of_birth"]?>" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="date_of_birth" name="address" placeholder="address" value="<?php echo $record_detail["address"]?>" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('test_id');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="test_id" name="test_id" placeholder="test_id" value="<?php echo $record_detail["test_id"]?>" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status" <?php echo $record_detail["status"]==1?'checked':'';?>/>
            	<label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($record_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
            <button type="button" class="btn btn-info"><?php echo get_phrase('Save & new');?></button>
        </div>
        <?php echo form_close();?>
</div>

 <script src="<?php echo base_url();?>assets/js/testing_record/testing_record_new.js"></script>