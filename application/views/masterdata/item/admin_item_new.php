
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_admin_item_fee');?></h4>
</div>

<style>
    .red{
        color:red;
    }
    .panel-white {
        border-top: 1px solid #FFF!important;
    }
    .mailbox-content {
        min-height: 400px;
    }
</style>

<div class="panel-body">
    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewSession', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" />
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

    <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('session_name');?> <span class="red">*</span></label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="session_name" name="session_name" placeholder="session name" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('start_date');?> <span class="red">*</span></label>
        <div class="col-sm-7">
            <input type="text" class="form-control datepicker" id="start_date" name="start_date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('end_date');?> <span class="red">*</span></label>
        <div class="col-sm-7">
            <input type="text" class="form-control datepicker" id="end_date" name="end_date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" />
        </div>
    </div>

    <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('copy_config_data_from');?></label>
        <div class="col-sm-7">
            <select class="form-control" name="copy_config_data_from">
                <option>1</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label">&nbsp;</label>
        <div class="col-sm-7">
            <input type="radio" name="active" id="active" checked value="1" />
            <label for="active"><?php echo get_phrase('active');?></label>
            <input type="radio" name="active" id="in_active" value="2"/>
            <label for="in_active"><?php echo get_phrase('in_active');?></label>
            <br />
            <input type="radio" name="is_lock" id="freeze" value="1"/>
            <label for="freeze"><?php echo get_phrase('freeze');?></label>
            <input type="radio" name="is_lock" id="open" value="2"/>
            <label for="open"><?php echo get_phrase('open');?></label>
        </div>
    </div>

    <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label">&nbsp;</label>
        <div class="col-sm-7">
            <input type="checkbox" name="status" id="status"
            <label for="status"><?php echo get_phrase('create_other');?></label>
        </div>
    </div>

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnSubmit" class="btn btn-info">
            <?php if(''==''){?>
                <?php echo get_phrase('save');?>
            <?php }else {?>
                <?php echo get_phrase('edit');?>
            <?php } ?>
        </button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/master_data/admin_item_new_new.js"></script>