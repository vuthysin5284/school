<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmTransportStudentFee', 'enctype' => 'multipart/form-data'));?>


    <div class="col-sm-7">
        <div class="form-group">
            <label for="service" class="col-sm-3 control-label">សេវាកម្មឡាន<!-- សេវាកម្មឡាន --></label>
            <div class="col-sm-9">
                <select class="form-control" id="service" name="service" >
                    <option value="0">ជ្រើសរើស<!--​ ជ្រើសរើស --></option>
                    <option value="0">ថ្លៃឡានដឹកជញ្ជូន ជាខែ </option>
                    <option value="0">ថ្លៃឡានដឹកជញ្ជូន ជាថ្ងៃ</option>
                    <option value="0">មិនប្រើសេវាកម្មឡានដឹកជញ្ជូន </option>
                    ​
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="area" class="col-sm-3 control-label">តំបន់​<!-- តំបន់​--></label>
            <div class="col-sm-9">
                <select class="form-control" id="area" name="area" >
                    <option value="0">ជ្រើសរើស<!--​ ជ្រើសរើស --></option>
                    <option value="0">A</option>​
                    <option value="0">B</option>​
                    <option value="0">C</option>​
                    <option value="0">D</option>​
                    ​
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="route" class="col-sm-3 control-label">ផ្លូវ<!-- ផ្លូវ--></label>
            <div class="col-sm-9">
                <select class="form-control" id="route" name="route" >
                    <option value="0">ជ្រើសរើស<!--​ ជ្រើសរើស --></option>
                    <option value="0">One way</option>​
                    <option value="0">two ways</option>​
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="date_from" class="col-sm-3 control-label">សំរាប់<!-- ដល់(ខែ)-->(ខែ)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="date_from" data-date-format="yyyy-mm" />
            </div>
        </div>
        <div class="form-group">
            <label for="date_to" class="col-sm-3 control-label">ដល់(ខែ)</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="date_to" data-date-format="yyyy-mm" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">បង់ចំនួន</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" />
            </div>
        </div>

    </div>


    <hr style="margin-top: 10px;clear: both"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="button" id="btnAssignClassSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>


<script>
    /*$("#date_from").datepicker( {
        format: "dd-mm-yyyy",
        minViewMode: "days",
        minViewMode: "days"
    });*/
    $("#date_from").datepicker( {
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months"
    });
    $("#date_to").datepicker( {
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months"
    });
</script>
