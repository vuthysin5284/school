<?php
    $now = date('d/m/Y');
?>
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewEnrolmentGeneral', 'enctype' => 'multipart/form-data'));?>

        <!--div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('enrollment_iD');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" style="font-style: italic;" readonly placeholder="Auto generate"
                       value="<?php echo empty($general_data["enrolment_id"])?'':$general_data["enrolment_id"]?>"/>
            </div>
        </div-->
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label">ខ្ញុំបាទ / នាងខ្ញុំឈ្មោះ<span class="red">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="st_khmer_name" name="st_khmer_name" placeholder="នាមត្រកូល"
                       value="<?php echo empty($general_data["khmer_name"])?'':$general_data["khmer_name"]?>"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="st_middle_name"  placeholder="នាមខ្លួនកណ្តាល"
                       value="<?php echo empty($general_data["middle_name"])?'':$general_data["middle_name"]?>"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="st_latin_name"  placeholder="នាមខ្លួន"
                       value="<?php echo empty($general_data["latin_name"])?'':$general_data["latin_name"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('latin_name');?><span class="red">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="st_khmer_name" name="st_khmer_name" placeholder="Last Name"
                       value="<?php echo empty($general_data["khmer_name"])?'':$general_data["khmer_name"]?>"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="st_middle_name"  placeholder="Middle Name"
                       value="<?php echo empty($general_data["middle_name"])?'':$general_data["middle_name"]?>"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="st_latin_name"  placeholder="First Name"
                       value="<?php echo empty($general_data["latin_name"])?'':$general_data["latin_name"]?>"/>
            </div>
        </div>

        <?php
            $arr_dob =  explode('-',empty($general_data["dob"])?'':$general_data["dob"]);
        ?>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;">
                ថ្ងៃ/ខែ/ឆ្នាំកំណើត
                <?php echo get_phrase('date_of_birth');?><span class="red">*</span></label>
             <div class="col-sm-4">
                 <input type="number" min="1" max="31" id="txtdob_dd" name="txtdob_dd" class="form-control" placeholder="dd"
                        value="<?php echo empty($arr_dob[2])?'':$arr_dob[2]?>"/>
             </div>
             <div class="col-sm-3">
                 <input type="number" min="1" max="12" id="txtdob_mm" name="txtdob_mm" class="form-control"  placeholder="mm"
                        value="<?php echo empty($arr_dob[1])?'':$arr_dob[1]?>"/>
             </div>
            <div class="col-sm-3">
                <input type="number" min="1980" id="txtdob_yy" name="txtdob_yy" class="form-control" placeholder="yyyy"
                       value="<?php echo empty($arr_dob[0])?'':$arr_dob[0]?>"/>
            </div>
            <!--div class="col-sm-3">
                <input type="text" class="form-control" id="txtAge" name="txtAge" readonly />
            </div-->
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('gender');?> <span class="red">*</span></label>
            <div class="col-sm-4">
                <select class="form-control" id="gender" name="gender" >
                    <option value="">... Gender ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>

        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('citizen');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="citizen" name="citizen" >
                    <option value="">... Citizen ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('nationality');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="nationality" name="nationality" >
                    <option value="">... Nationality ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>


        <div class="form-group col-md-12">
            <hr />
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('academic_year');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="session_name" name="session_name" >
                    <option value="">... Academic Year ...</option>
                    <?php
                    foreach($session_list as $ss){
                        $selected = ($sl->id==$general_data["session_id"])?" selected":"";
                        echo "<option value='".$ss->id."' ".$selected.">".$ss->session_name."</option>";

                    }
                    ?>
                </select>
            </div>


            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('grade');?> <span class="red">*</span></label>
            <div class="col-sm-2">
                <select class="form-control" id="section" name="section" >
                    <option value="">... Grade ...</option>
                </select>
            </div>
            <div class="col-sm-2">
                <select class="form-control" id="section" name="section" >
                    <option value="">ក</option>
                    <option value="">ខ</option>
                </select>
            </div>

        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-3">&nbsp;</div>

            <label for="field-1" class="col-sm-3 control-label" style="text-align: right;"><?php echo get_phrase('time_study');?> <span class="red">*</span></label>
            <div class="col-sm-4">
                <select class="form-control" id="time_study" name="time_study" >
                    <option value="">... Time Study ...</option>
                    <?php
                    foreach($time_study as $ts){
                        $selected = ($ts->id==$general_data["time_study_id"])?" selected":"";
                        echo "<option value='".$ts->id."' ".$selected.">".$ts->times_name."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>


         <div class="form-group col-md-12">
            <hr />  
            <label for="field-1" class="col-sm-2 control-label">១.ទីកន្លែងកំណើត៖</label> 
        </div>

        <div class="form-group col-md-12"> 
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('province_city');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="province_city" name="province_city" >
                    <option value="">... Province/City ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('commune_sangkat');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="commune_sangkatcommune_sangkat" name="commune_sangkat" >
                    <option value="">... Commune/Sangkat ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">            
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('district_khan');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="district_khan" name="district_khan" >
                    <option value="">... District/Khan ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('home_street_village');?></label>
            <div class="col-sm-4">
                <input type="text" id="home_street_village" name="home_street_village"class="form-control" style="font-style: italic;" placeholder="home/street/village" />
            </div>
        </div>

        <div class="form-group col-md-12">
            <hr />  
            <label for="field-1" class="col-sm-2 control-label">២.ទីលំនៅបច្ចុប្បន្ន៖</label> 
        </div>

        <div class="form-group col-md-12"> 
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('province_city');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="current_province_city" name="current_province_city" >
                    <option value="">... Province/City ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('commune_sangkat');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="current_commune_sangkat" name="current_commune_sangkat" >
                    <option value="">... Commune/Sangkat ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">            
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('district_khan');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="current_district_khan" name="current_district_khan" >
                    <option value="">... District/Khan ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('home_street_village');?></label>
            <div class="col-sm-4">
                <input type="text" id="current_home_street_village" name="current_home_street_village" class="form-control" style="font-style: italic;" placeholder="home/street/village" />
            </div>
        </div>

        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label">៣.មុខរបរសព្វថ្ងៃ</label>
            <hr />
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('current_occupation');?></label>
            <div class="col-sm-4">
                <input type="text" id="current_occupation" name="current_occupation" class="form-control" style="font-style: italic;" placeholder="Current Occupation" />
            </div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('where');?></label>
            <div class="col-sm-4">
                <input type="text" id="where" name="where" class="form-control" style="font-style: italic;" placeholder="Where" />
            </div>
        </div> 


        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label">៤.ទូរស័ព្ទទំនាក់ទំនងផ្ទាល់ខ្លួន</label>
            <hr />
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('personal_telephone_number');?></label>
            <div class="col-sm-4">
                <input type="text" id="personal_telephone_number" name="personal_telephone_number" class="form-control" style="font-style: italic;" placeholder="Personal Telephone Number" />
            </div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('parent\'s_name');?></label>
            <div class="col-sm-4">
                <input type="text" id="parent_name" name="parent_name" class="form-control" style="font-style: italic;" placeholder="Parent's Name" />
            </div>
        </div> 


        <div class="form-group col-md-12">
            <hr /> 
        </div>

        <div class="form-group col-md-12"> 
            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('register_date');?></label>
            <div class="col-sm-4"> 
                <input name="register_date" id="register_date" type="text" class="form-control date-picker" value="<?php echo $now;?>" placeholder="register date ..." />
            </div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('teacher');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="teacher_id" name="teacher_id">    
                    <option value="0">... selected ..</option>  
                </select>  
            </div>
        </div> 

        <div class="form-group col-md-12"> 

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('working_date');?></label>
            <div class="col-sm-4">
                <input name="working_date" id="working_date" type="text" class="form-control" value="<?php echo $now;?>" placeholder="Working date..." readonly /></div>

            <label for="field-1" class="col-sm-2 control-label" style="text-align: right;"><?php echo get_phrase('assign_room');?></label>
            <div class="col-sm-4">
                <select class="form-control" id="room_id" name="room_id" class="validate[required]">
                    <option value="0">... room ..</option> 
                </select> 
            </div>
        </div> 




        <div class="form-group col-md-12">
            <hr /> 
        </div>
 
 
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button" id="btn_close" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button> 
        <!--button type="button" id="btnSaveNewEnrollment" class="btn btn-info"><?php echo get_phrase('submit & new');?></button-->
        <button type="button" id="btnSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>

    <?php echo form_close();?>
</div>

<!--script src="<?php echo base_url();?>assets/js/enrolment/enrolment_general.js"></script-->
<script type="text/javascript">
    $(function () {
        $('#register_date').datepicker();
        
    });
</script>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_new.js"></script>
