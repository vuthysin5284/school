<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>location/new_location/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_location');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_location" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Location Name</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/location/location.js"></script>