<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>Leave_type/new_leave_type/0/new');">
            <?php echo get_phrase('new_leave_type');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_leave_type" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Leave Code</th>
            <th>Leave Name</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/leave_type/leave_type.js"></script>

