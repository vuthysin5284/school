<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>banksetup/new_banksetup/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('new_banksetup');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_banksetup" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
    <tr>
        <th>Bank Number</th>
        <th>Bank Name</th>
        <th>Transfer Fee</th>
        <th>Remark</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/payrollsetup/banksetup/banksetup.js"></script>