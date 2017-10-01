<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewAssignClass', 'enctype' => 'multipart/form-data'));?>


    <input type="hidden" name="assign_class_id" value="<?php echo empty($ass_data["id"])?'':$ass_data["id"]?>"/>

    <div class="form-group">
        <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('Grade');?></label>
        <div class="col-sm-4">
            <select class="form-control" id="grade" name="grade" >
                <option value="0">... Grade ...</option>
                <option value="1"> k-3 </option>
                <option value="2"> K-4 </option>
                <option value="3"> K-5 </option>
                <option value="4"> 1-st </option>
                <option value="5"> 2-nd </option>
                <option value="6"> 3-rd </option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('languages');?></label>
        <div class="col-sm-4">
            <select class="form-control" id="language" name="language" multiple style="height: 220px;">
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
                <option value="6"> 6 </option>
                <option value="7"> 7 </option>
                <option value="8"> 8 </option>
                <option value="9"> 9 </option>
                <option value="10"> 10 </option>
                <option value="11"> 11 </option>
                <option value="12"> 12 </option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('letter');?></label>
        <div class="col-sm-4">
            <select class="form-control" id="letter" name="letter">
                <option value="1"> A </option>
                <option value="2"> B </option>
                <option value="3"> C </option>
                <option value="4"> D </option>
                <option value="5"> E </option>
                <option value="6"> F </option>
                <option value="7"> H </option>
                <option value="8"> I </option>
                <option value="9"> G </option>
                <option value="10"> K </option>
                <option value="11"> L </option>
                <option value="12"> M </option>
            </select>
        </div>
    </div>

    <hr style="margin-top: 10px;"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnAssignClassSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/assign_class.js"></script>