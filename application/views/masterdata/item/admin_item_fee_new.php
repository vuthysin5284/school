
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo get_phrase($crud.'_admin_item_fee');?></h4>
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

<?php

    //var_dump($item_dl);
?>

<div class="panel-body">
    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewAdminItemFee', 'enctype' => 'multipart/form-data'));?>

    <input type="hidden" value="<?php echo $item_dl['id'];?>" name="pb_hidden_id"/>
    <input type="hidden" name="pb_crud_id" value="<?php echo $crud?>"/>

    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('description');?> <span class="red">*</span></label>
        <div class="col-sm-9">
            <input type="text" value="<?php echo $item_dl['description'];?>" class="form-control" id="description" name="description" />
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('prize');?> <span class="red">*</span></label>
        <div class="col-sm-9">
            <select id="role" name="prize_id" class="form-control">
                <option value="0"> ... select ... </option>
                <?php $sql_pl = "select * from prize_list where status = 1";
                $pl = $this->sys->query($sql_pl)->result_array();
                foreach($pl as $pr){
                    if($pr["id"] == $item_dl['prize_id']){
                        $select = " selected";
                    }else{$select = "";}
                    ?>
                    <option value="<?php echo $pr["id"]?>" <?php echo $select;?> ><?php echo $pr["prize"]?></option>
                <?php } ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('prize_list');?> <span class="red">*</span></label>
        <div class="col-sm-9">
            <select class="form-control" btn btn-info id="prize_list" name="prize_list" value="<?php echo empty($item_dl["prize_list"])?'':$item_dl["prize_list"]?>">
                    <option>... prize_list ...</option>
                    <?php
                        foreach($session_list as $r){
                            $selected = ($r->id==$classes_detail["session_id"])?" selected":"";
                            echo "<option value='".$r->id."' ".$selected.">".$r->session_name."</option>";

                        }
                    ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-9">
            <?php
            $active="";
            $inactive="";
            $status = $item_dl['status'];

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
    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnSubmit" class="btn btn-info">
            <?php if(''==''){?>
                <?php echo get_phrase('save');?>
            <?php }else {?>
                <?php echo get_phrase('edit');?>
            <?php } ?>
        </button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/master_data/admin_item_new_new.js"></script>