<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmTesting', 'enctype' => 'multipart/form-data'));?>
    
        <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('expected_class');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="expected_class" name="expected_class" placeholder="Expected Class" />
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" />
                </div>
            </div>
        
    </div>
    <?php echo form_close();?>
</div>