<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>manage_vehicle/new_vehicle/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_vehicle');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_vehicle" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Vehicle Number</th>
            <th>Total Seat</th>
            <th>Total Seat Allow</th>
            <th>Ownership Type</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/manage_vehicle/manage_vehicle.js"></script>