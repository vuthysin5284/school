
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_payroll_tax');?></h4>
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
        'id'=>'frmPayrollTax', 'enctype' => 'multipart/form-data'));?>


   <input type="hidden" name="payroll_tax_id" value="<?php echo empty($prtax_del["id"])?'':$prtax_del["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud;?>"/>
    <div class="col-sm-9">
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('payroll_tax_number');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="payroll_tax_number" id="payroll_tax_number" value="<?php echo empty($prtax_del["payroll_tax_number"])?'':$prtax_del["payroll_tax_number"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('amount_in_riel_less_than');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="amount_in_riel_less_than" id="amount_in_riel_less_than" value="<?php echo empty($prtax_del["amount_in_riel_less_than"])?'':$prtax_del["amount_in_riel_less_than"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('tax_percentage');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="tax_percentage" id="tax_percentage" value="<?php echo empty($prtax_del["tax_percentage"])?'':$prtax_del["tax_percentage"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('deduction_amount_in_riel');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="deduction_amount_in_riel" id="deduction_amount_in_riel" value="<?php echo empty($prtax_del["deduction_amount_in_riel"])?'':$prtax_del["deduction_amount_in_riel"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label">&nbsp;</label>
            <div class="col-sm-7">  
                <input type="checkbox" name="status" id="status"
                 <?php echo (empty($prtax_del["status"])?0:$prtax_del["status"])==0?'':'checked';?>/>
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
        <button type="button" id="btnPayrollTaxSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>
    <script src="<?php echo base_url();?>assets/js/payrollsetup/payroll_tax/payroll_tax_new.js"></script>