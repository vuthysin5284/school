<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewAssignClass', 'enctype' => 'multipart/form-data'));?>


    <input type="text" value="<?php echo $enroll_id?>"/>

    <div class="form-group">
        <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('Grade');?></label>
        <div class="col-sm-4">
            <select class="form-control" id="grade" name="grade" >
                <option value="0">... Grade ...</option>
                <option> k-3 </option>
                <option> K-4 </option>
                <option> K-5 </option>
                <option> 1-st </option>
                <option> 2-nd </option>
                <option> 3-rd </option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('languages');?></label>
        <div class="col-sm-4">
            <select class="form-control" id="language" name="language" multiple style="height: 220px;">
                <option> 1 </option>
                <option> 2 </option>
                <option> 3 </option>
                <option> 4 </option>
                <option> 5 </option>
                <option> 6 </option>
                <option> 7 </option>
                <option> 8 </option>
                <option> 9 </option>
                <option> 10 </option>
                <option> 11 </option>
                <option> 12 </option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('letter');?></label>
        <div class="col-sm-4">
            <select class="form-control" id="letter" name="letter">
                <option> A </option>
                <option> B </option>
                <option> C </option>
                <option> D </option>
                <option> E </option>
                <option> F </option>
                <option> H </option>
                <option> I </option>
                <option> G </option>
                <option> K </option>
                <option> L </option>
                <option> M </option>
            </select>
        </div>
    </div>
    <?php echo form_close();?>
</div>