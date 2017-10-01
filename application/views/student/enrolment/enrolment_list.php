<div class="row">
    <div class="col-md-10">
        <a class="btn btn-info" href="<?php echo base_url();?>location/location_list"
           data-url="<?php echo base_url();?>location/location_list">
            <i class="fa fa-exclamation-circle"></i>
            <?php echo get_phrase('fees_management');?>
        </a>
        &nbsp;
        <a class="btn btn-info" href="<?php echo base_url();?>location/location_list"
           data-url="<?php echo base_url();?>location/location_list">
            <i class="fa fa-exclamation-circle"></i>
            <?php echo get_phrase('tasks');?></a>
        &nbsp;
        <a class="btn btn-info" href="<?php echo base_url();?>location/location_list"
           data-url="<?php echo base_url();?>location/location_list">
            <i class="fa fa-exclamation-circle"></i>
            <?php echo get_phrase('reports');?>
        </a>
    </div>

    <!-- button create new enrollment-->
    <div class="col-md-2 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>enrolment/new_enrolment/0/new');">
            <i class="fa fa-graduation-cap"></i>
            <?php echo get_phrase('enroll_new');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div>
<div style="clear:both"></div>
<br />

<table id="datable_enrolment" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Date Of Birth</th>
            <th>Gender</th>
            <th>Academic Year</th>
            <th>Grade</th>
            <th>Time Study</th>
            <th>Children</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/enrolment/enrolment.js"></script>

<!--?php
    $this->load->view("student/enrolment/enrolment_detail");
?>

