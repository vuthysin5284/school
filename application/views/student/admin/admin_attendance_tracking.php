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
            <option>... Status ...</option>
            <option>Active</option>
            <option>Inactive</option>
        </select>
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
<div style="padding:5px; border-bottom:1px solid #eee;"></div>
<div style="clear:both"></div>
<br />

<table id="datable_enrolment" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Date</th>
        <th>In</th>
        <th>Out</th>
        <th>Reasons</th>
        <th>By</th>
    </tr>
    </thead>
</table>