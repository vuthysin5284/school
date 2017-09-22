<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewResponsible', 'enctype' => 'multipart/form-data'));?>


    <input type="text" value="<?php echo $enroll_id?>"/>

    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('responsibility_name');?></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="responsibility_kh" placeholder="Khmer" />
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="responsibility_en" placeholder="Latin" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="occupation" placeholder="Occupation" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="phone_number" placeholder="Phone number" />
        </div>
    </div>

    <hr />
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
        <div class="col-sm-8">
            <input type="textbox" class="form-control" name="address" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="address1" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="address2" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="address3" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="address4" />
        </div>
    </div>
    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnResponsibleSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_responsible.js"></script>