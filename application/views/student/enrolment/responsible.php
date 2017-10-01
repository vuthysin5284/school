<div class="panel-body">
    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewResponsible', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="responsible_id" value="<?php echo empty($res_data["id"])?'':$res_data["id"]?>"/>

    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('responsibility_name');?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="responsibility_kh" placeholder="Khmer"
            value="<?php echo empty($res_data["father_name_kh"])?'':$res_data["father_name_kh"]?>"/>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="responsibility_en" placeholder="Latin"
                   value="<?php echo empty($res_data["father_name_en"])?'':$res_data["father_name_en"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="occupation" placeholder="Occupation"
                   value="<?php echo empty($res_data["f_occupation"])?'':$res_data["f_occupation"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="phone_number" placeholder="Phone number"
                   value="<?php echo empty($res_data["f_number"])?'':$res_data["f_number"]?>"/>
        </div>
    </div>

    <hr />
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
        <div class="col-sm-8">
            <input type="textbox" class="form-control" name="address"
                   value="<?php echo empty($res_data["address"])?'':$res_data["address"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="address1"
                   value="<?php echo empty($res_data["address1"])?'':$res_data["address1"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="address2"
                   value="<?php echo empty($res_data["address2"])?'':$res_data["address2"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="address3"
                   value="<?php echo empty($res_data["address3"])?'':$res_data["address3"]?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="address4"
                   value="<?php echo empty($res_data["address4"])?'':$res_data["address4"]?>"/>
        </div>
    </div>
    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnResponsibleSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_responsible.js"></script>