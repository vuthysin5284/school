<div class="panel-body">

    <?php echo form_open(base_url(),array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmRemidialFee', 'enctype' => 'multipart/form-data'));?>


    <div class="col-sm-12">
        <div class="form-group">
            <label for="grade" class="col-sm-1 control-label">ល.រ</label>
            <label for="grade" class="col-sm-1 control-label"></label>
            <label for="grade" class="col-sm-8 control-label">បរិយាយ</label>
            <label for="grade" class="col-sm-2 control-label">តម្លៃ  ( USD )</label>
        </div>
        <hr style="margin-top: 10px;clear: both; margin-bottom: 0px"/>

        <div class="form-group">
            <label for="grade" class="col-sm-1 control-label">1</label>
            <label for="grade" class="col-sm-1 control-label"><input type="checkbox" /></label>
            <label for="grade" class="col-sm-8 control-label">ថ្នាក់ជំនួយផ្លោះថ្នាក់</label>
            <label for="grade" class="col-sm-2 control-label">20</label>
        </div>
        <div class="form-group">
            <label for="grade" class="col-sm-1 control-label">2</label>
            <label for="grade" class="col-sm-1 control-label"><input type="checkbox" /></label>
            <label for="grade" class="col-sm-8 control-label">ថ្នាក់បំប៉នភាសាខ្មែរ </label>
            <label for="grade" class="col-sm-2 control-label">20</label>
        </div>
        <div class="form-group">
            <label for="grade" class="col-sm-1 control-label">3</label>
            <label for="grade" class="col-sm-1 control-label"><input type="checkbox" /></label>
            <label for="grade" class="col-sm-8 control-label">ថ្នាក់បំប៉នភាសាអង់គ្លេស</label>
            <label for="grade" class="col-sm-2 control-label">20</label>
        </div>
    </div>


    <hr style="margin-top: 10px;clear: both"/>
    <div class="form-actions pull-right" style="margin-right:20px;">
        <button type="button"  data-dismiss="modal" class="btn btn-info"><?php echo get_phrase('close');?></button>
        <button type="button" id="btnAssignClassSubmit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
    </div>
    <?php echo form_close();?>
</div>