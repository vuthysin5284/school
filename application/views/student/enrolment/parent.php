<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewParent', 'enctype' => 'multipart/form-data'));?>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('father_name');?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Khmer" />
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Latin" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Occupation" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Phone number" />
            </div>
        </div>

        <hr />

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('mother_name');?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Khmer" />
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="Latin" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('occupation');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Occupation" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Phone number" />
            </div>
        </div>


        <hr />
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
            <div class="col-sm-8">
                <input type="textbox" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="textbox" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="textbox" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="textbox" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="textbox" class="form-control" />
            </div>
        </div>
    <?php echo form_close();?>
</div>