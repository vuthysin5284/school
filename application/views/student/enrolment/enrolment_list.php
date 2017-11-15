<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="row">
    <div class="col-md-2">
        <select class="form-control">
            <option>... Session ...</option>
            <option>2017</option>
            <option>2018</option>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control">
            <option>... Class ...</option>
            <option>1</option>
            <option>2</option>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control">
            <option>... Section ...</option>
            <option>abc</option>
            <option>tttt</option>
        </select>
    </div>

    <div class="col-md-2">
        <select class="form-control">
            <option>... Status ...</option>
            <option>Active</option>
            <option>Inactive</option>
        </select>
    </div>
    <div class="col-md-1">
        <button class="btn btn-info">Search</button>
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
<div class="seperated_line"></div>
<div style="clear:both"></div>
<br />

<table id="datable_enrolment" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 80px;">Enrol ID</th>
            <th style="width: 70px;">Image</th>
            <th>Student Name</th>
            <th style="width: 100px;">Dob</th>
            <th>Session Name</th>
            <th>Class name</th>
            <th>Section name</th>
            <th style="width: 100px;">Actions</th>
        </tr>
    </thead>
</table>
<div style="clear:both"></div>
<script src="<?php echo base_url();?>assets/js/enrolment/enrolment.js"></script>
<br />