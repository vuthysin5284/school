<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>position_status/new_position_status/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('new_position_status');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_position_status" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Position Status Name</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/position_status/position_status.js"></script>