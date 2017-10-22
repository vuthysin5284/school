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
        'id'=>'frmTesting', 'enctype' => 'multipart/form-data'));?>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('testing_code');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" style="font-style: italic;text-align: center" readonly placeholder="Auto generate" />
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('student_name');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="khmer_name" name="khmer_name" placeholder="khmer name" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label">&nbsp;</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="latin_name" name="latin_name" placeholder="latin name" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('gender');?> <span class="red">*</span></label>
                <div class="col-sm-8">
                    <select class="form-control" id="gender_id" name="gender_id" >
                        <option value="0">... gender ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('nationality');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nationality" name="nationality" placeholder="nationality" />
                </div>
            </div>
        </div> <!-- md6 -->


        <div class="col-md-6">

            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('date_of_birth');?> <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="date_of_birth" name="date_of_birth"/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('age');?></label>
                <div class="col-sm-8">
                    <span>30Y 1M 20D</span>
                </div>
            </div>


            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('session');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="academic_year" name="academic_year" >
                        <option value="0">... session ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('expected_class');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <select class="form-control" id="expected_class" name="expected_class" >
                        <option value="0">... expected class ...</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label">&nbsp;
                </label>
                <div class="col-sm-8">
                    <input type="checkbox" /> <?php echo get_phrase('base_testing_result');?>
                </div>
            </div>


        </div><!-- md6 -->


    </div><!-- row -->

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnSubmitNew" class="btn btn-info"><?php echo get_phrase('submit & new');?></button>
        <button type="button" id="btnSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>

    <?php echo form_close();?>
</div><!-- body -->
