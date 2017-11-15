<div class="row">

    <div class="col-md-2">
        <select class="form-control">
            <option>... Status ...</option>
            <option>Active</option>
            <option>Inactive</option>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control">
            <option>... Payment ...</option>
            <option>Paid</option>
            <option>Not paid</option>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control">
            <option>1</option>
        </select>
    </div>
    <div class="col-md-2 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>testing_enrollment/new_testing_enrollment/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('Testing_enrollment');?>
        </button>
    </div>
</div>
<div class="seperated_line"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_register" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
        	<th>No</th>
            <th>Khmer Name</th>
            <th>Latin Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Age</th>
            <th>Session</th>
            <th>Expected Class</th>
            <!--th>Relative Name</th>
            <th>Contact Number</th-->
            <th>Check</th><!-- using for mark student have been assessment or give score to student after exam -->
            <th>Action</th>
        </tr>
    </thead>
</table>

<div style="clear:both"></div>
<script src="<?php echo base_url();?>assets/js/testing_record/testing_record.js"></script>
