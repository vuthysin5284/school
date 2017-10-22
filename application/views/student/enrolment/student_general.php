<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewEnrolmentGeneral', 'enctype' => 'multipart/form-data'));?>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('enrollment_iD');?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" style="font-style: italic;text-align: center" readonly placeholder="Auto generate" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('student_name');?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="st_khmer_name" placeholder="khmer name"
                       value="<?php echo empty($general_data["khmer_name"])?'':$general_data["khmer_name"]?>"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="st_middle_name"  placeholder="middle name"
                       value="<?php echo empty($general_data["middle_name"])?'':$general_data["middle_name"]?>"/>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="st_latin_name"  placeholder="latin name"
                       value="<?php echo empty($general_data["latin_name"])?'':$general_data["latin_name"]?>"/>
            </div>
        </div>

        <?php
            $arr_dob =  explode('-',empty($general_data["dob"])?'':$general_data["dob"]);
        ?>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date_of_birth');?></label>
             <div class="col-sm-3">
                 <input type="number" min="1" max="31" id="txtdob_dd" name="txtdob_dd" class="form-control" placeholder="dd" title="dd"
                        value="<?php echo empty($arr_dob[2])?'':$arr_dob[2]?>"/>
             </div>
             <div class="col-sm-3">
                 <input type="number" min="1" max="12" id="txtdob_mm" name="txtdob_mm" class="form-control"  placeholder="mm" title="mm"
                        value="<?php echo empty($arr_dob[1])?'':$arr_dob[1]?>"/>
             </div>
            <div class="col-sm-3">
                <input type="number" min="1980" id="txtdob_yy" name="txtdob_yy" class="form-control" title="yyyy"
                       value="<?php echo empty($arr_dob[0])?'':$arr_dob[0]?>"/>
            </div>
            <!--div class="col-sm-3">
                <input type="text" class="form-control" id="txtAge" name="txtAge" readonly />
            </div-->
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender');?> <span class="red">*</span></label>
            <div class="col-sm-3">
                <select class="form-control" id="gender" name="gender" >
                    <option value="0">... Gender ...</option>
                    <?php
                    foreach($gender_list as $bl){
                        $selected = ($bl->id==$general_data["gender_id"])?" selected":"";
                        echo "<option value='".$bl->id."' ".$selected.">".$bl->gender."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('academic_year');?> <span class="red">*</span></label>
            <div class="col-sm-6">
                <?php
                $cu =  date("Y")-1;
                $c =  date("Y");
                $s = "";
                ?>
                <select class="form-control" id="academic_year" name="academic_year" >
                    <option value="0">... Academic Year ...</option>
                    <?php
                    for($i=0; $i<=2; $i++){
                        if(($cu+$i)==$c){$s="selected";}else{$s="";}
                        echo "<option value='".($cu+$i)." - ".($c+$i)."' $s >&nbsp;".($cu+$i)." - ".($c+$i)."</option> ";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('time_study');?> <span class="red">*</span></label>
            <div class="col-sm-6">
                <select class="form-control" id="time_study" name="time_study" >
                    <option value="0">... Time Study ...</option>
                    <?php
                    foreach($time_study as $ts){
                        $selected = ($ts->id==$general_data["time_study_id"])?" selected":"";
                        echo "<option value='".$ts->id."' ".$selected.">".$ts->times_name."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('children_number');?></label>
            <div class="col-sm-3">
                <select class="form-control" id="children_number" name="children_number" >
                    <option value="0">... Children number ...</option>
                    <?php
                    foreach($child_number as $cn){
                        $selected = ($cn->id==$general_data["children_number"])?" selected":"";
                        echo "<option value='".$cn->id."' ".$selected.">".$cn->number."</option>";

                    }
                    ?>
                </select>
            </div>
            <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('reference');?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" style="font-style: italic;text-align: center" placeholder="parents" />
            </div>
        </div>


        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('former_school');?></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="former_school" placeholder="Former School"
                       value="<?php echo empty($general_data["former_school"])?'':$general_data["former_school"]?>" />
            </div>
            <label for="field-1" class="col-sm-1 control-label" name="year" style="text-align: right"><?php echo get_phrase('year');?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="former_school_year" placeholder="Year"
                       value="<?php echo empty($general_data["year"])?'':$general_data["year"]?>" />
            </div>
        </div>

        <hr />
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="checkbox" id="field-2" name="chIsTestNext"
                <?php echo (empty($general_data["is_waiting_testing"])?'':$general_data["is_waiting_testing"]==1?'checked':'')?> />
                <label for="field-2"><?php echo get_phrase('waiting_test');?></label>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('testing_id');?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="testing_id" placeholder="Testing ID"
                       value="<?php echo empty($general_data["testing_id"])?'':$general_data["testing_id"]?>" />
            </div>
        </div>

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" class="btn btn-info"><?php echo get_phrase('admin_paid');?></button>
        <button type="button" class="btn btn-info"><?php echo get_phrase('transfer');?></button>
        <button type="button" id="btnSubmitNew" class="btn btn-info"><?php echo get_phrase('submit & new');?></button>
        <button type="button" id="btnSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>

    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_general.js"></script>