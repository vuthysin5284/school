
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
        'id'=>'frmNewAdminItemFee', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" value="<?php echo empty($item_dl['id'])?'':$item_dl['id'];?>" name="pb_hidden_id"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

    <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('description');?> <span class="red">*</span></label>
        <div class="col-sm-7">
            <input type="text" value="<?php echo empty($item_dl['description'])?'':$item_dl['description'];?>" class="form-control" id="description" name="description" />
        </div>
    </div>
    

    <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label">&nbsp;</label>
        <div class="col-sm-7">
            <input type="radio" name="status" id="active" checked value="1" />
            <label for="active"><?php echo get_phrase('active');?></label>
            <input type="radio" name="status" id="in_active" value="0"/>
            <label for="in_active"><?php echo get_phrase('in_active');?></label>
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