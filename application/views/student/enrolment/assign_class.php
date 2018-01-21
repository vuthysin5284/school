<div class="panel-body"> 


    <input type="hidden" name="assign_class_id" value="<?php echo empty($ass_data["id"])?'':$ass_data["id"]?>"/>

    <div class="col-sm-7">
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('Grade');?></label>
            <div class="col-sm-10">
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
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('subjects');?></label>
            <div class="col-sm-10">
                <select class="form-control" id="subject" name="subject[]" multiple style="height: 220px;">
                    <?php
                        foreach($subject_data as $sd){
                            if(!in_array($sd->id, explode(",",$ass_data["language"]), true)) {
                                echo "<option value='" . $sd->id . "'> " . $sd->course_name . "</option>";
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('letter');?></label>
            <div class="col-sm-10">
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
    <div class="col-sm-5">
        <div class="col-sm-12">&nbsp;</div>
        <div class="col-sm-12">
            <label for="field-1" class="col-sm-12 control-label"><?php echo get_phrase('assigned_subjects');?></label>
            <select class="form-control col-sm-12" id="assign_subject" name="assign_subject[]" multiple style="height: 220px;">
                <?php
                foreach($subject_data as $asd){
                    if(in_array($asd->id, explode(",",$ass_data["language"]), true)) {
                        echo "<option value='" . $asd->id . "' selected>" . $asd->course_name . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>


    <!--hr style="margin-top: 10px;clear: both"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info">< ?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info">< ?php echo get_phrase('reset');?></button>
        <button type="button" id="btnAssignClassSubmit" class="btn btn-info">< ?php echo get_phrase('submit');?></button>
    </div-->
</div>

<!--script src="< ?php echo base_url();?>assets/js/enrolment/assign_class.js"></script-->
<script>
    $("#subject").on("dblclick", function() {
        $('#assign_subject')
            .append($("<option></option>")
                .attr("value",$("#subject :selected").val())
                .text($("#subject :selected").text()));

        $('select#assign_subject>option').prop('selected', true);
        // remove from selected
        $("#subject option[value='"+$("#subject :selected").val()+"']").remove();
    });

    $("#assign_subject").on("dblclick", function() {
        $('#subject')
            .append($("<option></option>")
                .attr("value",$("#assign_subject :selected").val())
                .text($("#assign_subject :selected").text()));

        // remove from selected
        $("#assign_subject option[value='"+$("#assign_subject :selected").val()+"']").remove();
    });
</script>