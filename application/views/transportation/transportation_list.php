<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>transportation/new_transportation');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_transportation');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />
<table id="datable_transportation" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Transportation Number</th>
            <th>Transportation Name</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/transportation/transportation.js"></script>