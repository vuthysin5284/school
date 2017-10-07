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
                    <input type="text" class="form-control"  placeholder="គោត្តនាម" />
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control"  placeholder="នាម" />
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
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender');?> </label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>male</option>
                        <option>female</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('marrital_status');?> </label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>single</option>
                        <option>taken</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?> </label>
             <div class="col-sm-8">
                     <select class="form-control" >
                        <option>khmer</option>
                        <option>foreigner</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('country');?> </label>
             <div class="col-sm-8">
                     <select class="form-control" >
                        <option>Cambodia</option>
                        <option>Thailand</option>
                        <option>Lao</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('hired_date');?></label>
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
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('remark');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" readonly placeholder="Address" />  
                </div>
           	 </div>
         	 <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('pos_class');?> </label>
            <div class="col-sm-8">
                  
                        <select class="form-control" >
                        <option>low</option>
                        <option>meduim</option>
                        <option>high</option>
                    </select>
                </div>
            </div>
            
           <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('job_level');?> <span class="red">*</span></label>
             <div class="col-sm-8">
                    <select class="form-control" >
                        <option>low</option>
                        <option>meduim</option>
                        <option>high</option>
                    </select>

                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('empl_status');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>low level</option>
                        <option>meduim level</option>
                        <option>high level</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('position_level');?> </label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>low level</option>
                        <option>meduim level</option>
                        <option>high level</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('confirm_date');?> </label>
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
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('confirm_status');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>yes</option>
                        <option>no</option>
                    </select>
                </div>
            </div>

             <hr />

             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('leaving_reason');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>busy</option>
                        <option>sick</option>
                        <option>lazy</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('leaving_date');?> </label>
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
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('department');?> </label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>building A</option>
                        <option>building B</option>
                        <option>building C</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('section');?> </label>
           <div class="col-sm-8">
                     <select class="form-control" >
                        <option>Job Level</option>
                        <option>Possition</option>
                        <option>Section</option>
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('main_section');?> </label>
           <div class="col-sm-8">
                     <select class="form-control" >
                        <option>building A</option>
                        <option>building B</option>
                        <option>building C</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('location');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>Phnom Penh</option>
                        <option>Kampot</option>
                        <option>Koh Kong</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('sub_location');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                     <select class="form-control" >
                        <option>toul Kork</option>
                        <option>sen sok</option>
                        <option>tek thla</option>
                    </select>
                </div>
            </div>

             <hr />

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('line');?> </label>
                <div class="col-sm-8">
                     <select class="form-control" >
                        <option>line 1</option>
                        <option>line 2</option>
                        <option>line 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                 <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('work_shift');?> </label>
                 <div class="col-sm-8">
                     <select class="form-control" >
                        <option>rank 1</option>
                        <option>rank 2</option>
                        <option>rank 3</option>
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