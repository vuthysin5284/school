		 <div class="row">
  			<div class="col-md-7">
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_id');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" style="font-style: italic" readonly placeholder="Employee ID" />
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('khmer_name');?></label>
                 <div class="col-sm-4">
                     <input type="text" class="form-control"  placeholder="last name" />
                 </div>
                 <div class="col-sm-4">
                     <input type="text" class="form-control"  placeholder="first name" />
                 </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_name');?></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="last name" />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="first name" />
                </div>
            </div>

             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('national_card');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="National card" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date_of_birth');?></label>
                <div class="col-sm-2">
                    <input type="number" min="1" max="31" id="txtdob_dd" name="txtdob_dd" class="form-control"  placeholder="dd" title="dd" />
                </div>
                <div class="col-sm-3">
                    <input type="number" min="1" max="12" id="txtdob_mm" name="txtdob_mm" class="form-control"  placeholder="mm" title="mm" />
                </div>
                <div class="col-sm-3">
                    <input type="number" min="1980" value="2010" id="txtdob_yy" name="txtdob_yy" class="form-control" title="yyyy" />
                </div>
            </div>
            
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('place_of_birth');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="place of birth" />
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="gender" name="gender" >
                        <option value="0">... gender ...</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('marrital_status');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="marrital_status" name="marrital_status" >
                        <option value="0">... marrital status ...</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="nationality" name="nationality" >
                        <option value="0">... nationality ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('country');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="country" name="country" >
                        <option value="0">... country ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('hired_date');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control datepicker" placeholder="hired date" />
                </div>
            </div>

            <hr />
            
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('home_phone');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Home Phone" />
                </div>
            </div>
  			<div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('cell_phone');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Cell Phone" />
                </div>
            </div>
   			<div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('extention_num');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Extention Number" />
                </div>
           	 </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email_address');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Email Address" />
                </div>
           	 </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" />
                </div>
            </div>
             
       	 </div>
         
         
         
         
         
         <div class="col-md-5">
         	 <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('pos_class');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="pos_class" name="pos_class" >
                        <option value="0">... pos class ...</option>
                    </select>
                </div>
            </div>
            
           <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('job_level');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="job_level" name="job_level" >
                        <option value="0">... job level ...</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('empl_status');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="empl_status" name="empl_status" >
                        <option value="0">... employee status ...</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('position_level');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="position_level" name="position_level" >
                        <option value="0">... position level ...</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('confirm_date');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="confirm_date" name="confirm_date" >
                        <option value="0">... confirm date ...</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('confirm_status');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="confirm_status" name="confirm_status" >
                        <option value="0">... confirm status ...</option>
                    </select>
                </div>
            </div>

             <hr />

             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('leaving_reason');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="leaving_reason" name="leaving_reason" >
                        <option value="0">... leaving reason ...</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('leaving_date');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="leaving_date" name="leaving_date" >
                        <option value="0">...leaving date ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('department');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="department" name="department" >
                        <option value="0">... department ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('section');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="section" name="section" >
                        <option value="0">... section ...</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('main_section');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="main_section" name="main_section" >
                        <option value="0">... Main Section ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('location');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="location" name="location" >
                        <option value="0">... location ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('sub_location');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                    <select class="form-control" id="sub_location" name="sub_location" >
                        <option value="0">... sub Location ...</option>
                    </select>
                </div>
            </div>

             <hr />

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('line');?> <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select class="form-control" id="line" name="line" >
                        <option value="0">... Line ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                 <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('work_shift');?> <span class="red">*</span></label>
                 <div class="col-sm-8">
                     <select class="form-control" id="work_shift" name="work_shift" >
                         <option value="0">... Work Shift ...</option>
                     </select>
                 </div>
            </div>

             <hr />

             <div class="form-group">
                 <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Comments');?></label>
                 <div class="col-sm-8">
                    <textarea class="form-control"></textarea>
                 </div>
             </div>


         </div>
    </div>
</div>