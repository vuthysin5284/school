<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 10/21/2017
 * Time: 11:11 PM
 */
?>
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmTestingGeneral', 'enctype' => 'multipart/form-data'));?>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('testing_code');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" style="font-style: italic;text-align: center" readonly placeholder="Auto generate"
                           value="<?php echo empty($general_data["testing_id"])?'':$general_data["testing_id"];?>"/>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('student_name');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="khmer_name" name="khmer_name" placeholder="khmer name"
                           value="<?php echo empty($general_data["khmer_name"])?'':$general_data["khmer_name"];?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label">&nbsp;</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="latin_name" name="latin_name" placeholder="latin name"
                        value="<?php echo empty($general_data["latin_name"])?'':$general_data["latin_name"];?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('gender');?> <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select class="form-control" id="gender_id" name="gender_id" >
                        <option value="0">... gender ...</option>
                        <?php
                            foreach ($gender_list as $g){
                                $selected = ($g->id==$general_data["gender_id"])?" selected":"";
                                echo "<option value='".$g->id."' ".$selected.">".$g->gender."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('nationality');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nationality" name="nationality" placeholder="nationality"
                           value="<?php echo empty($general_data["nationality"])?'':$general_data["nationality"];?>"/>
                </div>
            </div>
        </div> <!-- md6 -->


        <div class="col-md-6">

            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('date_of_birth');?> <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="date_of_birth" name="date_of_birth"
                           value="<?php echo empty($general_data["dob"])?'':$general_data["dob"];?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('age');?></label>
                <div class="col-sm-8">
                    <span><?php echo empty($general_data["nationality"])?'':$general_data["nationality"];?><!--30Y 1M 20D--></span>
                </div>
            </div>


            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('session');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="session_id" name="session_id" >
                        <option value="0">... session ...</option>
                        <?php
                            foreach ($session_list as $s){
                                $selected = ($s->id==$general_data["session_id"])?" selected":"";
                                echo "<option value='".$s->id."' ".$selected.">".$s->session_name."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('expected_class');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="expected_class_id" name="expected_class_id" >
                        <option value="0">... expected class ...</option>
                        <?php
                            foreach ($expected_class_list as $ex){
                                $selected = ($ex->id==$general_data["expected_class_id"])?" selected":"";
                                echo "<option value='".$ex->id."' ".$selected.">".$ex->classes_name."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label">&nbsp;
                </label>
                <div class="col-sm-8">
                    <input type="checkbox" id="is_base_on_result" name="is_base_on_result" <?php echo  (empty($general_data["is_base_on_result"])?'':$general_data["is_base_on_result"]==1)?" checked":""?> />
                    <label for="is_base_on_result"><?php echo get_phrase('base_on_testing_result');?></label>
                </div>
            </div>


        </div><!-- md6 -->


    </div><!-- row -->

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>

        <?php if((empty($general_data["testing_id"])?'':$general_data["testing_id"])==''){?>
        <button type="button" id="btnSubmitNew" class="btn btn-info"><?php echo get_phrase('submit & new');?></button>
        <?php } ?>
        <button type="button" id="btnTestingGeneralSubmit" class="btn btn-info"><?php echo get_phrase('save');?></button>
    </div>

    <?php echo form_close();?>
</div><!-- body -->


<script src="<?php echo base_url();?>assets/js/testing_record/testing_general_new.js"> </script>