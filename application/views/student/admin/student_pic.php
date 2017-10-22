<div class="panel-body"> 

    <?php echo form_open(base_url().'enrolment/new_student_upload',array('class' => 'form-horizontal form-groups-bordered',
        'id'=>'frmNewStudentUpload', 'enctype' => 'multipart/form-data'));?>

    <div class="col-sm-8">

        <div class="controls" style="width:150px;">
            <img id="blah" src="<?php echo $this->Crud_model->get_image_url('student',$this->uri->segment(3, 0));?>" style="height:150px;"/>
        </div>
        <div class="controls">
            <input type="file" name="student_image" id="imgInp" />
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
        <button type="button" id="btnStudentUploadSubmit" disabled class="btn btn-info"><?php echo get_phrase('Upload');?></button>
    </div>
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url();?>assets/js/enrolment/student_upload.js"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('#btnStudentUploadSubmit').removeAttr('disabled');

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });


</script>