<meta name="viewport" content="width=device-width, initial-scale=1">
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
            <!--?php echo get_phrase('enroll_new');?-->
            បញ្ចូលសិស្សថ្មី
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div>
<div style="clear:both"></div>
<br />

<div class="row">
    <div class="col-md-2">
        <select class="form-control" id="sl_running_session">
            <option value="0">Running session</option>
            <?php
            foreach($session_list as $row){
                $selected = ($row->session_name==$this->session->userdata('session_name'))? ' selected':'';
                echo "<option value='".$row->id."' $selected>".$row->session_name."</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control" id="sl_classes">
            <option value="0">... Grade ...</option>
            <?php
            foreach($class_list as $row){
                echo "<option value='".$row->id."'>".$row->classes_name."</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control" id="sl_section">
            <option value="0">... Section ...</option>
            <?php
            foreach($section_list as $row){
                echo "<option value='".$row->id."'>".$row->section_name."</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-1">
        <button class="btn btn-info" id="btnSearchStudent">Search</button>
    </div>

    <!-- button create new enrollment-->
    <div class="col-md-3 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>enrolment/new_enrolment/0/new');">
            <i class="fa fa-graduation-cap"></i>
            <?php echo get_phrase('register');?>
            <!--បញ្ចូលសិស្សថ្មី
        --></button>
        <button class="btn btn-info">
            Import student
        </button>
    </div>
</div>

<div class="seperated_line"></div>
<div style="clear:both"></div>
<br />

<table id="datable_enrolment" class="table table-striped table-bordered table-hover" width="100%">
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