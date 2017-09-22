<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewParent', 'enctype' => 'multipart/form-data'));?>


    <input type="hidden" name="parent_id" value="<?php echo empty($parent_data["id"])?'':$parent_data["id"]?>"/>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('father_name_kh');?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="father_name_kh" placeholder="Khmer"
                value="<?php echo empty($parent_data["father_name_kh"])?'':$parent_data["father_name_kh"]?>"/>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control"  name="father_name_en" placeholder="Latin"
                value="<?php echo empty($parent_data["father_name_en"])?'':$parent_data["father_name_en"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="occupation" placeholder="Occupation"
                       value="<?php echo empty($parent_data["f_occupation"])?'':$parent_data["f_occupation"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="phone_number"
                       value="<?php echo empty($parent_data["f_number"])?'':$parent_data["f_number"]?>"/>
            </div>
        </div>

        <hr />

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('mother_name');?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="mother_name_kh" placeholder="Khmer"
                       value="<?php echo empty($parent_data["mother_name_kh"])?'':$parent_data["mother_name_kh"]?>"/>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="mother_name_en" placeholder="Latin"
                       value="<?php echo empty($parent_data["mother_name_en"])?'':$parent_data["mother_name_en"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="occupation_m" placeholder="Occupation"
                       value="<?php echo empty($parent_data["m_occupation"])?'':$parent_data["m_occupation"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="phone_number_m"
                       value="<?php echo empty($parent_data["m_number"])?'':$parent_data["m_number"]?>"/>
            </div>
        </div>


        <hr />
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address"
                       value="<?php echo empty($parent_data["address"])?'':$parent_data["address"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address1"
                       value="<?php echo empty($parent_data["address1"])?'':$parent_data["address1"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address2"
                       value="<?php echo empty($parent_data["address2"])?'':$parent_data["address2"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address3"
                       value="<?php echo empty($parent_data["address3"])?'':$parent_data["address3"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address4"
                       value="<?php echo empty($parent_data["address4"])?'':$parent_data["address4"]?>"/>
            </div>
        </div>

        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnParentSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
        </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_parent.js"></script>