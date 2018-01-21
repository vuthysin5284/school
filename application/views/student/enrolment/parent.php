<div class="panel-body">
    <input type="hidden" name="parent_id" value="<?php echo empty($parent_data["id"])?'':$parent_data["id"]?>"/>

        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('father_name_kh');?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="father_name_kh" name="father_name_kh" placeholder="Khmer"
                value="<?php echo empty($parent_data["father_name_kh"])?'':$parent_data["father_name_kh"]?>"/>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control"  name="father_name_en" placeholder="Latin"
                value="<?php echo empty($parent_data["father_name_en"])?'':$parent_data["father_name_en"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="occupation" placeholder="Occupation"
                       value="<?php echo empty($parent_data["f_occupation"])?'':$parent_data["f_occupation"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="phone_number"
                       value="<?php echo empty($parent_data["f_number"])?'':$parent_data["f_number"]?>"/>
            </div>
        </div>


        <div class="form-group col-md-12">
            <hr />
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('mother_name');?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="mother_name_kh" name="mother_name_kh" placeholder="Khmer"
                       value="<?php echo empty($parent_data["mother_name_kh"])?'':$parent_data["mother_name_kh"]?>"/>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="mother_name_en" placeholder="Latin"
                       value="<?php echo empty($parent_data["mother_name_en"])?'':$parent_data["mother_name_en"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="occupation_m" placeholder="Occupation"
                       value="<?php echo empty($parent_data["m_occupation"])?'':$parent_data["m_occupation"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="phone_number_m"
                       value="<?php echo empty($parent_data["m_number"])?'':$parent_data["m_number"]?>"/>
            </div>
        </div>



        <div class="form-group col-md-12">
            <hr />
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address"
                       value="<?php echo empty($parent_data["address"])?'':$parent_data["address"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address1"
                       value="<?php echo empty($parent_data["address1"])?'':$parent_data["address1"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address2"
                       value="<?php echo empty($parent_data["address2"])?'':$parent_data["address2"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address3"
                       value="<?php echo empty($parent_data["address3"])?'':$parent_data["address3"]?>"/>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address4"
                       value="<?php echo empty($parent_data["address4"])?'':$parent_data["address4"]?>"/>
            </div>
        </div>

        <div class="form-group col-md-12">
            <hr />
            <div class="btn-group dropup pull-right">
                <button type="button" class="btn btn-info">Copy to Responsible</button>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li onclick="onCopyParent(1);"><a>Father</a></li>
                    <li onclick="onCopyParent(2);"><a>Mother</a></li>
                </ul>
            </div>

        </div>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_parent.js"></script>