<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>testing_register/new_record/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_record');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_register" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Middle Name</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Test ID</th>
            <th>STATUS</th>
            <th>Options</th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/testing_record/testing_record.js"></script>
