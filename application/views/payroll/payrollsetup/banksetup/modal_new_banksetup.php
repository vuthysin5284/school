
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_banksetup');?></h4>
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
        'id'=>'frmBanksetup', 'enctype' => 'multipart/form-data'));?>


    <input type="hidden" name="banksetup_id" value="<?php echo empty($bs_del["id"])?'':$bs_del["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud;?>"/>

    <div class="col-sm-8">
        <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('bank_number');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="bank_number" value="<?php echo empty($bs_del["bank_number"])?'':$bs_del["bank_number"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('bank_name');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="bank_name" id="bank_name" value="<?php echo empty($bs_del["bank_name"])?'':$bs_del["bank_name"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('transfer_fee');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="transfer_fee" id="transfer_fee" value="<?php echo empty($bs_del["transfer_fee"])?'':$bs_del["transfer_fee"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('remark');?></label>
            <div class="col-sm-8">
               <input type="text" class="form-control" id="remark" name="remark" value="<?php echo empty($bs_del["remark"])?'':$bs_del["remark"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label">&nbsp;</label>
            <div class="col-sm-7">  
                <input type="checkbox" name="status" id="status"
                 <?php echo (empty($bs_del["status"])?0:$bs_del["status"])==0?'':'checked';?>/>
                <label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>
    </div>


    <div class="col-sm-4">
        This deduction item form is using created for payroll period.
    </div>


    <hr style="margin-top: 10px;clear: both"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnBankSetupSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>
    <script src="<?php echo base_url();?>assets/js/payrollsetup/banksetup/banksetup_new.js"></script>