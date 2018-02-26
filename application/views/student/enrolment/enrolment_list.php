<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="row">
    <div class="col-md-2">
        <select class="form-control" id="sl_running_session">
            <option value="0">Running session</option>
            <?php
            foreach($session_list as $row){
                $selected = ($row->is_lock==1)? ' selected':'';
                echo "<option value='".$row->id."' $selected>".$row->session_name."</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control" id="sl_classes">
            <option value="0">... Grade ...</option>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control" id="sl_section">
            <option value="0">... Section ...</option>
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

<table id="datable_enrolment" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:50px;">No</th>
            <th style="width: 70px;">Image</th>
            <th>Student Name</th>
            <th style="width: 100px;">Dob</th>
            <th>Session</th>
            <th>Section</th>
            <th>Grade/Teacher</th>
            <th>Subject</th>
            <th style="width: 100px;">Actions</th>
        </tr>
    </thead>
</table>
<div style="clear:both"></div>
<script src="<?php echo base_url();?>assets/js/enrolment/enrolment.js"></script>
<br />