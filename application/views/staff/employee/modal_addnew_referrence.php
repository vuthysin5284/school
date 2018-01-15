
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase('create_new_reference');?></h4>
</div>


<style>
    .red{
        color:red;
    }
</style>

<?php //var_dump($position_detail);?>

<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered', 'id'=>'frmNewAddReference', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" name="pb_hidden_id" />
    <input type="hidden" name="pb_crud_id" />

    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('position_name');?> <span class="red">*</span>
        </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="position_name" name="position_name" placeholder="position name"  />
        </div>
    </div>

    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
        <div class="col-sm-8">
            <input type="text" class="form-control"  name="description" />
        </div>
    </div>

    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-8">
            <input type="checkbox" name="status" id="status">
            <label for="status"><?php echo get_phrase('is active');?></label>
        </div>
    </div>

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnSubmit" class="btn btn-info">
            <!--?php if($position_detail["id"]==''){?>
                < ?php echo get_phrase('save');?>
            < ?php }else {?>
                < ?php echo get_phrase('edit');?>
            < ?php } ? --> test
        </button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/position/position_new.js"></script>
 