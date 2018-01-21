<div class="row">

    <div class="col-md-2">
        <select class="form-control">
            <option>... Status ...</option>
            <option>1: Pending</option>
            <option>2: Checking</option>
            <option>3: Passed</option>
            <option>4: Fail</option>
            <option>5:Verified</option>
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
            <?php echo get_phrase('Testing_register');?>
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
            <th style="width: 250px">Khmer Name</th>
            <th style="width: 100px">Date of Birth</th>
            <th style="width: 150px">Session</th>
            <th style="width: 150px">Section</th>
            <th style="width: 150px">Expected Class</th>
            <!--th>Relative Name</th>
            <th>Contact Number</th-->
            <th style="width: 100px">Status</th><!-- using for mark student have been assessment or give score to student after exam -->
            <th style="width: 100px">Action</th>
        </tr>
    </thead>
</table>

<div style="clear:both"></div>
<script src="<?php echo base_url();?>assets/js/testing_record/testing_record.js"></script>
