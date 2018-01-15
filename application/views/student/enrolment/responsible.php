<div class="panel-body">

    <input type="hidden" name="responsible_id" value="<?php echo empty($res_data["id"])?'':$res_data["id"]?>"/>

    <div class="form-group col-md-12">
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
    <div class="form-group col-md-12">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="resp_occupation" placeholder="Occupation"
                   value="<?php echo empty($res_data["f_occupation"])?'':$res_data["f_occupation"]?>"/>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="resp_phone_number" placeholder="Phone number"
                   value="<?php echo empty($res_data["f_number"])?'':$res_data["f_number"]?>"/>
        </div>
    </div>

    <hr />
    <div class="form-group col-md-12">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
        <div class="col-sm-8">
            <input type="textbox" class="form-control" name="resp_address"
                   value="<?php echo empty($res_data["address"])?'':$res_data["address"]?>"/>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="resp_address1"
                   value="<?php echo empty($res_data["address1"])?'':$res_data["address1"]?>"/>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="resp_address2"
                   value="<?php echo empty($res_data["address2"])?'':$res_data["address2"]?>"/>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="resp_address3"
                   value="<?php echo empty($res_data["address3"])?'':$res_data["address3"]?>"/>
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="resp_address4"
                   value="<?php echo empty($res_data["address4"])?'':$res_data["address4"]?>"/>
        </div>
    </div>

</div>

<!--script src="< ?php echo base_url();?>assets/js/enrolment/enrolment_responsible.js"></script-->