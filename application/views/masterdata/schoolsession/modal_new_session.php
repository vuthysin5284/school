 
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_class');?></h4>
</div>


<style>
	.red{
		color:red;
	}
</style>

<?php //var_dump($session_detail);?>
 
<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
				'id'=>'frmNewSession', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" value="<?php echo $session_detail["id"]?>"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

        <div class="form-group">
           <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('session_name');?> <span class="red">*</span></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="session_name" name="session_name" placeholder="session name"  value="<?php echo $session_detail["session_name"]?>" />
            </div>
        </div>
        <div class="form-group">
           <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('start_date');?> <span class="red">*</span></label>
            <div class="col-sm-7">
                <input type="text" class="form-control datepicker" id="start_date" name="start_date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $session_detail["start_date"]?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label"><?php echo get_phrase('end_date');?> <span class="red">*</span></label>
            <div class="col-sm-7">
                <input type="text" class="form-control datepicker" id="end_date" name="end_date" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $session_detail["end_date"]?>"/>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-4 control-label">&nbsp;</label>
            <div class="col-sm-7">
                <?php
                $active="";
                $inactive="";
                $status = $session_detail['status'];

                if($status=='1'){
                    $active = ' checked';
                    $inactive='';

                }
                if($status=='0'){
                    $inactive =' checked';
                    $active='';
                }

                ?>

                <input type="radio" name="status" id="active" <?php echo $active;?> value="1" />
                <label for="active"><?php echo get_phrase('active');?></label>
                <input type="radio" name="status" id="in_active" <?php echo $inactive;?> value="0"/>
                <label for="in_active"><?php echo get_phrase('in_active');?></label>
            </div>
        </div>
        <div class="form-group">
        <label for="field-1" class="col-sm-4 control-label">&nbsp;</label>
        <div class="col-sm-7">
            <?php
            $isLocked="";
            $is_lock = $session_detail['is_lock'];

            if($is_lock=='1'){
                $isLocked = ' checked';

            }
            ?>

            <input type="checkbox" name="is_lock" id="is_lock" <?php echo $isLocked;?> value="1" />
            <label for="is_lock"><?php echo get_phrase('is_locked');?></label>
        </div>
        
        <hr style="margin-top: 10px;"/>
        <div class="form-actions pull-right" style="margin-right:20px;">
            <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
            <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
            <button type="button" id="btnSubmit" class="btn btn-info">
                <?php if($session_detail["id"]==''){?>
                    <?php echo get_phrase('save');?>
                <?php }else {?>
                    <?php echo get_phrase('edit');?>
                <?php } ?>
            </button>
        </div>
        <?php echo form_close();?>
</div>

<script>
    $('.datepicker').datepicker();
</script>
<script src="<?php echo base_url();?>assets/js/school_session/session_new.js"></script>
 