<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>manage_route/new_route/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_route');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_route" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Route Name</th>
            <th>Route Fare</th>
            <th>Two Way</th>
            <th>One Way</th>
            <th>Description</th>
            <th>STATUS</th>
            <th>Options</th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/manage_route/manage_route.js"></script>
