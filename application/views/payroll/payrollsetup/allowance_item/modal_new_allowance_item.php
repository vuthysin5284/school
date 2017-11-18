
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_allowance_item');?></h4>
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
        'id'=>'frmAllowanceItem', 'enctype' => 'multipart/form-data'));?>


    <input type="hidden" name="allowance_item_id" value="<?php echo empty($alt_del["id"])?'':$alt_del["id"]?>"/> 
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud;?>"/>

    <div class="col-sm-9">
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('allowance_number');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="allowance_number" id="allowance_number" value="<?php echo empty($alt_del["allowance_number"])?'':$alt_del["allowance_number"]?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('period');?></label>
            <div class="col-sm-7">
                <select class="form-control" btn btn-info id="period" name="period" value="<?php echo empty($alt_del["period"])?'':$alt_del["period"]?>">
                    <option>... period ...</option>
                    <option value="Weekly" <?php echo $alt_del["period"] == "Weekly" ? "selected": '';?> >Weekly</option>
                    <option value="Monthly" <?php echo $alt_del["period"] == "Monthly" ? "selected": '';?> >Monthly</option>
                    <option value="Yearly" <?php echo $alt_del["period"] == "Yearly" ? "selected": '';?> >Yearly</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('allowance_name');?></label>
            <div class="col-sm-7">
                <input class="form-control" id="allowance_name" name="allowance_name" value="<?php echo empty($alt_del["allowance_name"])?'':$alt_del["allowance_name"]?>"/>        
            </div>
        </div>
         <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('description');?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="description" id="description" value="<?php echo empty($alt_del["description"])?'':$alt_del["description"]?>">
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-5 control-label">&nbsp;</label>
            <div class="col-sm-7">  
                <input type="checkbox" name="status" id="status"
                 <?php echo (empty($alt_del["status"])?0:$alt_del["status"])==0?'':'checked';?>/>
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
        <button type="button" id="btnAllowanceItemSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>
    <script src="<?php echo base_url();?>assets/js/payrollsetup/allowance_item/allowance_item_new.js"></script>