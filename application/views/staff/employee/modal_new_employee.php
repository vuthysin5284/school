 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create new');?></h4>
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
				'id'=>'frmNewEmployee', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $employee_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

    <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_number');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="employee_number" name="employee_number" placeholder="employee number" />
            </div>
    </div>       
    
    <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('latin_name');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="latin_name" name="latin_name" placeholder="latin name" />
            </div>
    </div>        
    <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Khmer_name');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="khmer_name" name="khmer_name" placeholder="khmer name" />
            </div>
    </div>        
    <div class="form-group">
            <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender');?> <span class="red">*</span>
            </label>
            <div class="col-sm-8">
                <select class="form-control" id="gender" name="gender" >
                    <option value="0">... gender ...</option>
                </select>
            </div>
        </div>
    <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('position');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="position" name="position" placeholder="position" />
            </div>
    </div>         

     <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('department');?> <span class="red">*</span>
            </label>
            <div class="col-sm-8">
                <select class="form-control" id="department" name="department" >
                    <option value="0">... department ...</option>
                    <?php
					
                   
                    ?>
                </select>
            </div>
        </div>
      <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('phone');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" />
            </div>
    </div>   
    <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('joined_date');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="joined_date" name="joined_date" placeholder="joined date" />
            </div>
    </div>    
    <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('hired_date');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="hired_date" name="hired_date" placeholder="hired date" />
            </div>
    </div>       
       <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" placeholder="email" />
            </div>
    </div>       
        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('status');?> <span class="red">*</span>
           </label>
           <div class="col-sm-8">
                <select class="form-control" id="status" name="status" >
                    <option value="0">... status ...</option>
                </select>
            </div>
    </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php echo get_phrase('save');?>
            </button>
            <button type="button" id="btnSaveNew" class="btn btn-info"><?php echo get_phrase('save_new');?></button>
        </div>
        <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/employee/employee_new.js"></script>
 