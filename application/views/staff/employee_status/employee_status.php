<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>employee_status/new_employee_status/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('add_new');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_employee_status" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Employee Status Name</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/employee_status/employee_status.js"></script>