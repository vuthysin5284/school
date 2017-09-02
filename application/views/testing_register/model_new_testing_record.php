 
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
				'id'=>'frmTesting', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $record_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>
    
        <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('testing_id');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="testing_id" name="testing_id" placeholder="Auto number" value="<?php echo $record_detail["testing_id"]?>"/>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('latin_name');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="latin_name" name="latin_name" placeholder="latin name" value="<?php echo $record_detail["latin_name"]?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Khmer_name');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="khmer_name" name="khmer_name" placeholder="khmer name" value="<?php echo $record_detail["khmer_name"]?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender');?> <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select class="form-control" id="gender" name="gender" >
                        
                        <?php
						foreach($gender_list as $list){
							$select = ($list->id == $record_detail['id'])?" selected":"";
							echo "<option value='".$list->gender."' ".$select.">".$list->gender."</option>";
						}
					?>
					?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nationality" name="nationality" placeholder="nationality" value="<?php echo $record_detail["nationality"]?>" />
                    </div>
            </div>

             <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date_of_birth');?> <span class="red">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"/>
                    </div>
                </div>
                
              <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('age');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="age" name="age"/>
                    </div>
            </div>
            
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('academic_year');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                     <select class="form-control" id="academic_year" name="academic_year" >
                     <?php
						foreach($academic_year_list as $list){
							$select = ($list->id == $record_detail['id'])?" selected":"";
							echo "<option value='".$list->academic_year."' ".$select.">".$list->academic_year."</option>";
						}
					?>
                     </select>
                    </div>
            </div>
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('expected_class');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                      <select class="form-control" id="expected_class" name="expected_class" >
                        <?php
						foreach($expected_class_list as $list){
							$select = ($list->id == $record_detail['id'])?" selected":"";
							echo "<option value='".$list->expected_class."' ".$select.">".$list->expected_class."</option>";
						}
					?>
                      </select>
                    </div>
            </div>
            
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('language');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="language" name="language" placeholder="language" value="<?php echo $record_detail["language"]?>"/>
                    </div>
            </div>
            
            <div class="form-group">
               <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('status');?> <span class="red">*</span></label>
               <div class="col-sm-8">
                    <select class="form-control" id="status" name="status" >
                        <option value="0">... status ...</option>
                    </select>
                </div>
            </div>
        </div>

			
        <div class="col-md-6">   
            <div class="form-group">
                       <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?> <span class="red">*</span>
                       </label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="address" name="address" value="<?php echo $record_detail["address"]?>"></textarea>
                        </div>
            </div>

       
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('relative_name');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="relative_name" name="relative_name" placeholder="relative name" value="<?php echo $record_detail["relative_name"]?>" />
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('contact_number');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="contact number" value="<?php echo $record_detail["contact_number"]?>" />
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('relative');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="relative" name="relative" placeholder="relative" value="<?php echo $record_detail["relative"]?>"/>
                </div>
            </div>
        </div>
        
    </div>

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnSubmit" class="btn btn-info">
            <?php echo get_phrase('save');?>
        </button>
        <button type="button" id="btnSaveNew" class="btn btn-info"><?php echo get_phrase('save_new');?></button>
    </div>
    <?php echo form_close();?>
</div>

 <script src="<?php echo base_url();?>assets/js/testing_record/testing_record_new.js"></script>