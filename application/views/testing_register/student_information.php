<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmTesting', 'enctype' => 'multipart/form-data'));?>
    
        <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('testing_id');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="testing_id" name="testing_id" placeholder="Auto number" />
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('latin_name');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="latin_name" name="latin_name" placeholder="latin name" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Khmer_name');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="khmer_name" name="khmer_name" placeholder="khmer name" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender_id');?> <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select class="form-control" id="gender_id" name="gender_id" >
                        <option value="0">... gender ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nationality" name="nationality" placeholder="nationality" />
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
                        <input type="text" class="form-control" id="age" name="age" placeholder=""/>
                    </div>
            </div>
            
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('academic_year');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                     <select class="form-control" id="academic_year" name="academic_year" >
                        <option value="0">... academic year ...</option>
                     </select>
                    </div>
            </div>
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('expected_class');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                      <select class="form-control" id="expected_class" name="expected_class" >
                        <option value="0">... expected class ...</option>
                      </select>
                    </div>
            </div>
            
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('language');?> <span class="red">*</span>
                   </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="language" name="language" placeholder="language" />
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
                            <input type="address" class="form-control" id="address" name="address" placeholder="address" />
                        </div>
            </div>

       
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('relative_name');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="relative_name" name="relative_name" placeholder="relative name" />
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('contact_number');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="contact number" />
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('relative');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="relative" name="relative" placeholder="relative" />
                </div>
            </div>
        </div>
        
    </div>
    <?php echo form_close();?>
</div>