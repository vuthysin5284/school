 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create_new_employee_location');?></h4>
</div>


<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($employee_location_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewEmployeelocation', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $employee_location_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('employee_location');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="employee_location" name="employee_location" placeholder="employee location"  value="<?php echo $employee_location_detail["employee_location"]?>" />
            </div>
        </div>
       
              <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('main_station');?> <span class="red">*</span>
            </label>
            <div class="col-sm-8">
                <select class="form-control" id="main_station" name="main_station" >
                    <option value="0">...main station ...</option>
                    <?php
					
                    foreach($main_station_list as $s){
						
                        $selected = ($s->main_station==$employee_location_detail["main_station"])?" selected":"";
                        echo "<option value='".$s->main_station."' ".$selected.">".$s->main_station."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>
                
       <div class="form-group">

    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control"  name="description"  value="<?php echo $employee_location_detail["description"]?>"/>
             </div>
        </div> 
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status"
                <?php echo $employee_location_detail["id"]==''?'checked':'';?>
                 <?php echo $employee_location_detail["status"]==0?'':'checked';?>/>
            	<label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($employee_location_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/employee_location/employee_location_new.js"></script>
 