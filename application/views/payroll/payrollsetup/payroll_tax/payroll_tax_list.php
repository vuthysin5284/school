<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>payrollsetup/new_payroll_tax/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('new_payroll_tax');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_payroll_tax" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th style="width: 150px;">Payroll Tax Number</th>
            <th style="width: 150px;">Amount In Riel Less Than</th>
            <th style="width: 120px;">Tax Percentage</th>
            <th style="width: 100px;">Deduction Amount In Riel</th>
            <th style="width: 80px;">Status</th>
            <th style="width: 50px;">Actions</th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/payrollsetup/payroll_tax/payroll_tax.js"></script>