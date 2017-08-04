<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>room/new_room/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('new_room');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_room" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Room Number</th>
            <th>Room Name</th>
            <th>Building</th>
            <th>Floor</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/room/room.js"></script>