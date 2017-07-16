 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create_new_main_station');?></h4>
</div>
<hr style="margin-top: -10px;"/>

<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($main_station_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewMainstation', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $main_station_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('main_station');?> <span class="red">*</span>
           </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="main_station" name="main_station" placeholder="main station"  value="<?php echo $main_station_detail["main_station"]?>" />
            </div>
        </div>
       
              <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('section');?> <span class="red">*</span>
            </label>
            <div class="col-sm-8">
                <select class="form-control" id="section_name" name="section_name" >
                    <option value="0">...section ...</option>
                    <?php
					
                    foreach($section_list as $s){
						
                        $selected = ($s->section_name==$main_station_detail["section_name"])?" selected":"";
                        echo "<option value='".$s->section_name."' ".$selected.">".$s->section_name."</option>";

                    }
                    ?>
                </select>
            </div>
        </div>
                
       <div class="form-group">

    <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
            <div class="col-sm-8">  
                <input type="text" class="form-control"  name="description"  value="<?php echo $main_station_detail["description"]?>"/>
             </div>
        </div> 
              
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-8">  
                <input type="checkbox" name="status" id="status"
                <?php echo $main_station_detail["id"]==''?'checked':'';?>
                 <?php echo $main_station_detail["status"]==0?'':'checked';?>/>
            	<label for="status"><?php echo get_phrase('is active');?></label>
            </div>
        </div>        
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($main_station_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/main_station/main_station_new.js"></script>
 