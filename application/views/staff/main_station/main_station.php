<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>main_station/new_main_station/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_main_station');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_main_station" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Main Station</th>
            <th>Section Name</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/main_station/main_station.js"></script>