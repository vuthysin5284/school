
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_deduction_item');?></h4>
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
        'id'=>'frmDeductionItem', 'enctype' => 'multipart/form-data'));?>


   <input type="hidden" name="deduction_item_id" value="<?php echo empty($dt_del["id"])?'':$dt_del["id"]?>"/> 
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud;?>"/>
    <div class="col-sm-9">
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('deduction_number');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="deduction_number" id="deduction_number" value="<?php echo empty($dt_del["deduction_number"])?'':$dt_del["deduction_number"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('deduction_item');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="deduction_item" id="deduction_item" value="<?php echo empty($dt_del["deduction_item"])?'':$dt_del["deduction_item"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('description');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="description" id="description" value="<?php echo empty($dt_del["description"])?'':$dt_del["description"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label">&nbsp;</label>
            <div class="col-sm-7">  
                <input type="checkbox" name="status" id="status"
                 <?php echo (empty($dt_del["status"])?0:$dt_del["status"])==0?'':'checked';?>/>
                <label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>
    </div>


    <div class="col-sm-3">
        This deduction item form is using created for payroll period.
    </div>


    <hr style="margin-top: 10px;clear: both"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnDeductionItemSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>
    <script src="<?php echo base_url();?>assets/js/payrollsetup/deduction_item/deduction_item_new.js"></script>