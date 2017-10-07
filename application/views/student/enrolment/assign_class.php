<div class="panel-body"> 

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewAssignClass', 'enctype' => 'multipart/form-data'));?>


    <input type="hidden" name="assign_class_id" value="<?php echo empty($ass_data["id"])?'':$ass_data["id"]?>"/>

    <div class="col-sm-8">
        <div class="form-group">
            <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('Grade');?></label>
            <div class="col-sm-8">
                <select class="form-control" id="grade" name="grade" >
                    <option value="0">... Grade ...</option>
                    <?php
                        foreach($grade_list as $gl){
                            $selected = ($gl->id==$ass_data["grade_id"])?" selected":"";
                            echo "<option value='".$gl->id."' ".$selected."> ".$gl->classes_name."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('subjects');?></label>
            <div class="col-sm-8">
                <select class="form-control" id="subject" name="subject[]" multiple style="height: 220px;">
                    <option value="0">... Subject ...</option>
                    <?php
                        foreach($subject_data as $sd){
                            $selected = in_array($sd->id, explode(",",$ass_data["language"]), true)?'selected':'';
                            echo "<option value='".$sd->id."'  ".$selected."> ".$sd->course_name."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('letter');?></label>
            <div class="col-sm-8">
                <select class="form-control" id="letter" name="letter">
                    <option value="0">... Letter ...</option>
                    <?php
                    foreach($letter_data as $ld){
                        $selected = ($ass_data["letter_id"]==$ld->id)?'selected':'';
                        echo "<option value='".$ld->id."' ".$selected."> ".$ld->description_kh."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        The class is device by admin side setup, while this system start up and the school setup the cofiguration.
        that school is private or public school.
    </div>


    <hr style="margin-top: 10px;clear: both"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnAssignClassSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/assign_class.js"></script>