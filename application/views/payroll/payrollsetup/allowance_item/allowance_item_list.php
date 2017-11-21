<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>allowance_item/new_allowance_item/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('allowance_item');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_allowance_item" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th style="width: 150px;">Allowance Number</th>
            <th style="width: 150px;">Period</th>
            <th style="width: 120px;">Allowance name</th>
            <th style="width: 100px;">Status</th>
            <th style="width: 80px;">Status</th>
            <th style="width: 50px;">Actions</th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/payrollsetup/allowance_item/allowance_item.js"></script>