<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewEnrol', 'enctype' => 'multipart/form-data'));?>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('enrollment_iD');?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" style="font-style: italic" readonly placeholder="Auto generate" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('student_name');?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="khmer name" />
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="middle name" />
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="latin name" />
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date_of_birth');?></label>
             <div class="col-sm-3">
                 <input type="number" min="1" max="31" id="txtdob_dd" name="txtdob_dd" class="form-control"  placeholder="dd" title="dd" />
             </div>
             <div class="col-sm-3">
                 <input type="number" min="1" max="12" id="txtdob_mm" name="txtdob_mm" class="form-control"  placeholder="mm" title="mm" />
             </div>
            <div class="col-sm-3">
                <input type="number" min="1980" value="2010" id="txtdob_yy" name="txtdob_yy" class="form-control" title="yyyy" />
            </div>
            <!--div class="col-sm-3">
                <input type="text" class="form-control" id="txtAge" name="txtAge" readonly />
            </div-->
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('gender');?> <span class="red">*</span></label>
            <div class="col-sm-3">
                <select class="form-control" id="gender" name="gender" >
                    <option value="0">... Gender ...</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('academic_year');?> <span class="red">*</span></label>
            <div class="col-sm-6">
                <?php
                $cu =  date("Y")-1;
                $c =  date("Y");
                $s = "";
                ?>
                <select class="form-control" id="academic_year" name="academic_year" >
                    <option value="0">... Academic Year ...</option>
                    <?php
                    for($i=0; $i<=2; $i++){
                        if(($cu+$i)==$c){$s="selected";}else{$s="";}
                        echo "<option value='".($cu+$i)." - ".($c+$i)."' $s >&nbsp;".($cu+$i)." - ".($c+$i)."</option> ";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('time_study');?> <span class="red">*</span></label>
            <div class="col-sm-6">
                <select class="form-control" id="time_study" name="time_study" >
                    <option value="0">... Time Study ...</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('children_number');?></label>
            <div class="col-sm-3">
                <select class="form-control" id="children_number" name="children_number" >
                    <option value="0">... Children number ...</option>
                </select>
            </div>
            <div class="col-sm-3">
                <a href="#">Copy Parent</a>
            </div>
        </div>


        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('former_school');?></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Former School">
            </div>
            <label for="field-1" class="col-sm-1 control-label" style="text-align: right"><?php echo get_phrase('year');?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Year">
            </div>
        </div>

        <hr />
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"></label>
            <div class="col-sm-8">
                <input type="checkbox" id="field-2" name="chIsTestNext"> <label for="field-2"><?php echo get_phrase('waiting_test');?></label>
            </div>
        </div>

        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('testing_id');?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Testing ID" />
            </div>
        </div>
    <?php echo form_close();?>
</div>