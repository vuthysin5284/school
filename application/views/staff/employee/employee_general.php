		 <?php
		 
		 	//var_dump($emp_general_info);
		 
         ?>
 <div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewEmployeeGeneral', 'enctype' => 'multipart/form-data'));?>
        
        <input type="hidden" name="hidden_emp_id" value="<?php echo $emp_general_info["id"];?>" />
        
	<div class="row"> 
        <div class="col-md-7">
             <div class="form-group">
               <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_code');?></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" style="font-style: italic; text-align:center" readonly placeholder="Employee ID" 
                    value="<?php echo $emp_general_info["emp_code"];?>"/>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="extension_code" placeholder="extension code" 
                    value="<?php echo $emp_general_info["extention_num"];?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('khmer_name');?></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="last_name_kh" name="last_name_kh" placeholder="គោត្តនាម" 
                    value="<?php echo $emp_general_info["last_name_kh"];?>"/>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="first_name_kh"  placeholder="នាម" 
                    value="<?php echo $emp_general_info["first_name_kh"];?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('latin_name');?></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="latin_last_name" placeholder="last name" 
                    value="<?php echo $emp_general_info["latin_last_name"];?>"/>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="latin_first_name" placeholder="first name" 
                    value="<?php echo $emp_general_info["latin_first_name"];?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('national_card');?></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="national_card" name="national_card" placeholder="national_card" 
                    value="<?php echo $emp_general_info["national_card"];?>"/>
              	</div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="id_expiry_date" placeholder="id_expiry_date" 
                    value="<?php echo $emp_general_info["id_expiry_date"];?>"/>
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
                    <input type="number" min="1980"  id="txtdob_yy" name="txtdob_yy" class="form-control" title="yyyy" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('place_of_birth');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="place_of_birth" 
                    value="<?php echo $emp_general_info["place_of_birth"];?>"/>
              	</div>
            </div>    
            <!-- gender -->
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                <div class="col-sm-8">  
                    <select class="form-control" name="gender" value="<?php echo $emp_general_info["gender_id"];?>" required >
                        <option value="">... gender ...</option>
                        <?php 
							foreach($gender_list as $key){
								$selected = ($key->id==$emp_general_info["gender_id"])?" selected":"";
								echo "<option value='".$key->id."' ".$selected.">".$key->gender."</option>";
							} 
                        ?> 
                    </select> 
              	</div>
            </div>
            
            <!-- marry status -->
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('marrital_status');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="mirrital_status" value="<?php echo $emp_general_info["marrital_status"];?>" >
                         <option value="">... marry status ...</option>
                         <option value="1">single</option>
                        <option value="2">taken</option>
                    </select> 
              	</div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="nationality" value="<?php echo $emp_general_info["nationality"];?>" >
                        <option value="khmer">khmer</option>
                        <option value="english">english</option>
                    </select> 
              	</div>
           </div>
           <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('country');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="country" value="<?php echo $emp_general_info["country"];?>" >
                       <option value="cambodia">Cambodia</option>
                        <option value="thailand">Thailand</option>
                        <option value="lao">Lao</option>
                    </select> 
              	</div>
           </div>     
           <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('hired_date');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" data-date-format="yyyy-mm-dd" id="txthiredate" name="txthiredate"/>
                 
                </div>
           </div>

            <hr />
            
          <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('home_phone');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="home_phone" name="home_phone" placeholder="home_phone" 
                    value="<?php echo $emp_general_info["home_phone"];?>"/>
              	</div>
          </div>   
          <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('cell_phone');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="cell_phone" name="cell_phone" placeholder="cell_phone" 
                    value="<?php echo $emp_general_info["cell_phone"];?>"/>
              	</div>
          </div>  
   		  <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('extention_num');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="extention_num" name="extention_num" placeholder="extention_num" 
                    value="<?php echo $emp_general_info["extention_num"];?>"/>
              	</div>
           </div>  
           <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email_address');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email_address" name="email_address" placeholder="email_address" 
                    value="<?php echo $emp_general_info["email_address"];?>"/>
              	</div>
           </div>  
           <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" name="address" placeholder="address" 
                    value="<?php echo $emp_general_info["address"];?>"/>
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
                    <input type="text" class="form-control" id="remark" name="remark" placeholder="remark" 
                    value="<?php echo $emp_general_info["remark"];?>"/>
              	</div>
            </div> 
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('pos_class');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="pos_class" value="<?php echo $emp_general_info["pos_class"];?>" >
                       <option value="low">low</option>
                        <option value="meduim">meduim</option>
                        <option value="high">high</option>
                    </select> 
              	</div>
             </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('job_level');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="job_level" value="<?php echo $emp_general_info["job_level"];?>" >
                       <option value="low">low</option>
                        <option value="meduim">meduim</option>
                        <option value="high">high</option>
                    </select> 
              	</div>
             </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_status');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="employee_status" value="<?php echo $emp_general_info["employee_status"];?>" >
                       <option value="low_level">low level</option>
                        <option value="meduim_level">meduim level</option>
                        <option value="high_level">high level</option>
                    </select> 
              	</div>
             </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('position_level');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="position_level" value="<?php echo $emp_general_info["position_level"];?>" >
                       <option value="low_level">low level</option>
                        <option value="meduim_level">meduim level</option>
                        <option value="high_level">high level</option>
                        <option value="huge_level">huge level</option>
                    </select> 
              	</div>
             </div>            
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('confirm_date');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" data-date-format="yyyy-mm-dd" id="txtconfirmdate" name="txtconfirmdate"/>
                </div>
             </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('confirm_status');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="confirm_status" value="<?php echo $emp_general_info["confirm_status"];?>" >
                        <option value="yes">yes</option>
                        <option value="no">no</option>
                    </select> 
              	 </div>
             </div>
         <hr />
			 <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('leaving_reason');?></label>
                <div class="col-sm-8">
                    <select class="form-control" name="leaving_reason" value="<?php echo $emp_general_info["leaving_reason"];?>" >
                        <option value="busy">busy</option>
                        <option value="sick">sick</option>
                        <option value="lazy">lazy</option>
                    </select> 
              	 </div>
              </div>
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('leaving_date');?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-date-format="yyyy-mm-dd" id="txtleavingdate" name="txtleavingdate"/>
                  </div>
              </div>
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('department');?></label>
                   <div class="col-sm-8">
                    <select class="form-control" name="department" value="<?php echo $emp_general_info["department"];?>" >
                        <option value="building_a">building A</option>
                        <option value="building_b">building B</option>
                        <option value="building_c">building C</option>
                    </select> 
              	  </div>
               </div>
               <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
                   <div class="col-sm-8">
                    <select class="form-control" name="section" value="<?php echo $emp_general_info["section"];?>" >
                       <option value="job_level">Job Level</option>
                        <option value="possition">Possition</option>
                    </select> 
              	   </div>
             </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('main_section');?></label>
                   <div class="col-sm-8">
                    <select class="form-control" name="main_section" value="<?php echo $emp_general_info["main_section"];?>" >
                       <option value="section1">section 1</option>
                        <option value="section2">section 2</option>
                    </select> 
              	   </div>
             </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('location');?></label>
                   <div class="col-sm-8">
                    <select class="form-control" name="location" value="<?php echo $emp_general_info["location"];?>" >
                       <option value="phnom_penh">Phnom Penh</option>
                        <option value="kampot">Kampot</option>
                        <option value="koh_kong">Koh Kong</option>
                    </select> 
              	    </div>
             </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('sub_location');?></label>
                    <div class="col-sm-8">
                    <select class="form-control" name="sub_location" value="<?php echo $emp_general_info["sub_location"];?>" >
                       <option value="toul_kork">toul Kork</option>
                        <option value="sen_sok">sen sok</option>
                        <option value="tek_tla">tek thla</option>
                    </select> 
              	     </div>
             </div>
      <hr />
      		<div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('line');?></label>
                   <div class="col-sm-8">
                    <select class="form-control" name="line" value="<?php echo $emp_general_info["line"];?>" >
                       <option value="line1">line 1</option>
                        <option value="line2">line 2</option>
                        <option value="line3">line 3</option>
                    </select> 
              	    </div>
             </div>
             <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('work_shift');?></label>
                     <div class="col-sm-8">
                    <select class="form-control" name="work_shift" value="<?php echo $emp_general_info["work_shift"];?>" >
                       <<option value="rank1">rank 1</option>
                        <option value="rank2">rank 2</option>
                        <option value="rank3">rank 3</option>
                    </select> 
              	     </div>
             </div>
     <hr />
			 <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('comments');?></label>
                   <div class="col-sm-8">
                    <input type="text" class="form-control" id="comments" name="comments" 
                    value="<?php echo $emp_general_info["comments"];?>"/>
                   </div>
             </div> 

         </div>
    </div>
</div><!--row -->

		<hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="button" class="btn btn-info"><?php echo get_phrase('transfer');?></button>
            <button type="button" class="btn btn-info"><?php echo get_phrase('terminate');?></button>
            <button type="button" class="btn btn-info"><?php echo get_phrase('Review');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info"><?php echo get_phrase('save');?></button>
        </div>  



    <?php echo form_close();?>
</div><!-- panel-body-->


<script src="<?php echo base_url();?>assets/js/employee/employee_general_new.js"></script>
<script type="text/javascript">
	$(function () {
		$('#txthiredate').datepicker();
		$('#txtconfirmdate').datepicker();
		$('#txtleavingdate').datepicker();
	});
</script>


			