
<div class="panel-body">
    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered', 'id'=>'frmEmployeeContact', 'enctype' => 'multipart/form-data'));?>

    <div class="col-md-6">

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('contract_name');?></label>
            <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Khmer name" />
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Latin name" />
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('relationship');?> </label>
            <div class="col-sm-9">
                <select class="form-control" >
                    <option>single</option>
                    <option>taken</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('home_phone');?></label>
            <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Home Phone" />
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('cell_phone');?></label>
            <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Cell Phone" />
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('office_phone');?></label>
            <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Office Phone" />
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('zip_code');?></label>
            <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="zip code" />
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
            <div class="col-sm-9">
                <input type="textbox" class="form-control"  placeholder="Address" />
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('city');?></label>
            <div class="col-sm-9">
                <input type="textbox" class="form-control"  placeholder="city" />
            </div>
        </div>

    </div><!-- col-md-6-->
    <?php echo form_close();?>
</div>