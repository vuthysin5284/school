<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>employee/new_employee/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_employee');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_employee" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Employee Name</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/employee/employee.js"></script>