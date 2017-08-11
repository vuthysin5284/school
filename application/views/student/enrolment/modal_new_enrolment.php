 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('new enrolment');?></h4>
</div>
<hr style="margin-top: -10px;"/>

<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($employee_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewEnrolment', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $enrolment_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

    <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('enrolment_name');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="enrolment_name" name="enrolment_name" placeholder="enrolment name" value="<?php echo $enrolment_detail["name"]?>" />
            </div>
    </div>        

    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('enrolment_email');?><span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="enrolment_email" name="enrolment_email" placeholder="enrolment email " value="<?php echo $enrolment_detail["email"]?>"/>
             </div>
    </div> 

    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('enrolment_address');?><span class="red">*</span></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control" id="enrolment_address" name="enrolment_address" placeholder="enrolment adress " value="<?php echo $enrolment_detail["address"]?>"/>
             </div>
    </div>
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status"
                <?php echo $enrolment_detail["id"]==''?'checked':'';?>
                 <?php echo $enrolment_detail["status"]==0?'':'checked';?>/>
            	<label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($enrolment_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
            <button type="button" id="btnSaveNew" class="btn btn-info"><?php echo get_phrase('save_new');?></button>
        </div>
        <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment_new.js"></script>
 