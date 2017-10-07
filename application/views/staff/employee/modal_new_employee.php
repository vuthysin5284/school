 
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

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_number');?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="Auto number" />
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
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Khmer_name');?> 
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="khmer_name" name="khmer_name" placeholder="khmer name" />
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                <div class="col-sm-8">
                    <select class="form-control" >
                        <option>male</option>
                        <option>female</option>
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
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('department');?>
                    </label>
                    <div class="col-sm-8">
                    <select class="form-control" >
                        <option>building A</option>
                        <option>building B</option>
                        <option>building C</option>
                       
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
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('joined_date');?>
                   </label>
                     <div class="col-sm-2">
                    <input type="number" min="1" max="31" id="txtdob_dd" name="txtdob_dd" class="form-control"  placeholder="dd" title="dd" />
                </div>
                <div class="col-sm-3">
                    <input type="number" min="1" max="12" id="txtdob_mm" name="txtdob_mm" class="form-control"  placeholder="mm" title="mm" />
                </div>
                <div class="col-sm-3">
                    <input type="number" min="1980" value="2010" id="txtdob_yy" name="txtdob_yy" class="form-control" title="yyyy" />
                </div>
            </div>
            <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('hired_date');?> 
                   </label>
                     <div class="col-sm-2">
                    <input type="number" min="1" max="31" id="txtdob_dd" name="txtdob_dd" class="form-control"  placeholder="dd" title="dd" />
                </div>
                <div class="col-sm-3">
                    <input type="number" min="1" max="12" id="txtdob_mm" name="txtdob_mm" class="form-control"  placeholder="mm" title="mm" />
                </div>
                <div class="col-sm-3">
                    <input type="number" min="1980" value="2010" id="txtdob_yy" name="txtdob_yy" class="form-control" title="yyyy" />
                </div>
            </div>
               <div class="form-group">
                   <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?> 
                   </label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" />
                    </div>
            </div>
            <div class="form-group">
               <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('status');?> </label>
                <div class="col-sm-8">
                    <select class="form-control" >
                        <option>single</option>
                        <option>taken</option>
                    </select>
                </div>
            </div>
        </div>




        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_number');?> <span class="red">*</span>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="employee_number" name="employee_number" placeholder="employee number" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('staff_type');?> 
                </label>
                <div class="col-sm-8">
                    <select class="form-control" >
                        <option>Office</option>
                        <option>Teacher</option>
                        <option>Cashie</option>
                        <option>Security</option>
                    </select>

                </div>
            </div>
        </div>
    </div>

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnSubmit" class="btn btn-info">
            <?php echo get_phrase('save');?>
        </button>
        <button type="button" id="btnSaveNew" class="btn btn-info">
			<?php echo get_phrase('save_new');?>
        </button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/employee/employee_new.js"></script>
 