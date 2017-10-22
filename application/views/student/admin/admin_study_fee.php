<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmGenerateStudentFee', 'enctype' => 'multipart/form-data'));?>


    <div class="col-sm-7">
        <div class="form-group">
            <label for="grade" class="col-sm-4 control-label">ការបង់ថ្លៃ</label>
            <div class="col-sm-8">
                <select class="form-control" id="grade" name="grade" >
                    <option value="0">ការបង់ថ្លៃ</option>
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
            <label for="paid_for" class="col-sm-4 control-label">បង់សំរាប់ខែ<!--?php echo get_phrase('subjects');?--></label>
            <div class="col-sm-8">
                <input type="text" class="form-control datepicker" id="paid_for" data-date-format="yyyy-mm-dd">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">ចំនួនទឹកប្រាក់</label>
            <label class="col-sm-2 control-label">999</label>
            <label class="col-sm-4 control-label" style="text-align:right">ទឹកប្រាក់សរុប:</label>
            <label class="col-sm-2 control-label align-left">9999</label>
        </div>
        <div class="form-group">
            <label for="note" class="col-sm-4 control-label">សម្គាល់</label>
            <div class="col-sm-8">
                <textarea id="note" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="force_paid" class="col-sm-4 control-label">បង្ខំឱ្យបង់ប្រាក់</label>
            <div class="col-sm-8">
                <input type="checkbox" id="force_paid"/>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="price" class="col-sm-4 control-label">ថ្លៃ<!--?php echo get_phrase('subjects');?--></label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="price" readonly/>
            </div>
        </div>
        <div class="form-group">
            <label for="discount_per" class="col-sm-4 control-label">បញ្ចុះតម្លៃ</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" id="discount_per" />
            </div> %
        </div>
        <div class="form-group">
            <label for="discount_usd" class="col-sm-4 control-label">បញ្ចុះតម្លៃ</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" id="discount_usd" />
            </div>USD
        </div>
        <div class="form-group">
            <label for="penalize" class="col-sm-4 control-label">ផាក់ពិន័យ</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="penalize" />
            </div>
        </div>
        <div class="form-group">
            <label for="free_for" class="col-sm-4 control-label">ឥតគិតថ្លៃ</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="free_for" />
            </div>
        </div>
    </div>


    <hr style="margin-top: 10px;clear: both"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="reset" class="btn btn-info"><?php echo get_phrase('reset');?></button>
        <button type="button" id="btnAssignClassSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>
<script>
    $('.datepicker').datepicker();
</script>