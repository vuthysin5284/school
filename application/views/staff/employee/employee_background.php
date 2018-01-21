<div class="row">
    <div class="col-md-10">
        <table id="datable_employee_educato" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>General Education</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>School</th>
                <th>Major</th>
                <th>Degree</th>
                <th>Status</th>
                <th>Remark</th>
            </tr>
            </thead>
        </table>

    </div>
    <div class="col-md-2">
        <button class="btn btn-info" style="width: 150px; margin-bottom: 10px"
                onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('add_new');?>
        </button>
        <button class="btn btn-success" style="width: 150px; margin-bottom: 10px"
                onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
            <i class="fa fa-pencil"></i>
            <?php echo get_phrase('change');?>
        </button>
        <button class="btn btn-danger" style="width: 150px; margin-bottom: 10px"
                onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
            <i class="fa fa-times"></i>
            <?php echo get_phrase('delete');?>
        </button>
    </div>
</div>

<br />
<br />
<br />

<div class="row">

    <div class="col-md-10">
        <table id="datable_employee_shortcourse" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Short Course</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>School</th>
                <th>Course</th>
                <th>Degree</th>
                <th>Status</th>
                <th>Remark</th>
            </tr>
            </thead>
        </table>

    </div>
    <div class="col-md-2">
        <button class="btn btn-info" style="width: 150px; margin-bottom: 10px"
                onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('add_new');?>
        </button>
        <button class="btn btn-success" style="width: 150px; margin-bottom: 10px"
                onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
            <i class="fa fa-pencil"></i>
            <?php echo get_phrase('change');?>
        </button>
        <button class="btn btn-danger" style="width: 150px; margin-bottom: 10px"
                onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
            <i class="fa fa-times"></i>
            <?php echo get_phrase('delete');?>
        </button>
    </div>

</div>