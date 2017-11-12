<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 10/21/2017
 * Time: 11:11 PM
 */
?>
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered', 'id'=>'frmTestingRelative', 'enctype' => 'multipart/form-data'));?>

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('relative_name');?><span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="relative_name" name="relative_name" placeholder="relative name" required />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('nationality');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nationality" name="nationality" placeholder="nationality" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('citician');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="citician" name="citician" placeholder="citician" />
                </div>
            </div>
        </div> <!-- md6 -->


        <div class="col-md-6">

            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('phone');?> <span class="red">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" name="phone" required/>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('relative');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="relative" name="relative" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('testing_fee');?> <span class="red">*</span>
                </label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="testing_fee" name="testing_fee" placeholder="0.00"/>
                </div>
            </div>
        </div><!-- md6 -->


    </div><!-- row -->

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnSubmit" class="btn btn-info"><?php echo get_phrase('save');?></button>
    </div>

    <?php echo form_close();?>
</div><!-- body -->
