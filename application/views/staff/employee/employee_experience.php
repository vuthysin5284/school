
<div class="col-md-10">
    <table id="experience" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Employee</th>
            <th>Position</th>
            <th>Responsible</th>
            <th>Reason Resign</th>
            <th></th>
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