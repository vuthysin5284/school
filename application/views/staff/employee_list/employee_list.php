<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>employee_list/new_employee_list/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('add_new');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_employee_list" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Employee Number</th>
            <th>Latin Name</th>
            <th>Khmer Name</th>
            <th>Gender</th>
            <th>Position</th>
            <th>Department</th>
            <th>Phone</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/employee_list/employee_list.js"></script>