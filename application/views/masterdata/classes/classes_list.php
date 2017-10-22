<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>classes/new_classes/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('new_class');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_classes" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Session name</th>
            <th>Class Number</th>
            <th>Class Name</th>
            <th>Grade</th>
            <th>Description</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/classes/classes.js"></script>