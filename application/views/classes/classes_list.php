<script src="<?php echo base_url();?>assets/js/classes/classes.js"></script>

<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>classes/new_classes');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_classes');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_classes" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Classes Number</th>
        <th>Classes Name</th>
        <th>Description of Classes</th>
        <th>STATUS</th>
        <th></th>
    </tr>
    </thead>
</table>
