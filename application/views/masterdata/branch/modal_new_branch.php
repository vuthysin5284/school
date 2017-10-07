 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_branch');?></h4>
</div>


<style>
	.red{
		color:red;
	}
</style>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmBranch', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $branch_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('khmer_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="brand_name_kh" name="brand_name_kh"
                       placeholder="khmer name" autofocus value="<?php echo $branch_detail["branch_name_kh"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('latin_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="brand_name" placeholder="latin name" data-validate="required"
                       data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $branch_detail["branch_name"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('short_name');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="prefix" placeholder="short name" data-validate="required"
                       data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $branch_detail["prefix"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone_number');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="phone_number" placeholder="phone number" data-validate="required"
                       data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $branch_detail["phone_number"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?> <span class="red">*</span></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="email" placeholder="email" data-validate="required"
                       data-message-required="<?php echo get_phrase('value_required');?>" value="<?php echo $branch_detail["email"]?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address" value="<?php echo $branch_detail["address"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address1" value="<?php echo $branch_detail["address1"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address2" value="<?php echo $branch_detail["address2"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address3" value="<?php echo $branch_detail["address3"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address4" value="<?php echo $branch_detail["address4"]?>" />
            </div>
        </div>
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status" <?php echo $branch_detail["status"]==0?'':'checked';?>/>
            	<label for="status"><?php echo get_phrase('status');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($branch_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>

        </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/branch/branch_new.js"></script>
 