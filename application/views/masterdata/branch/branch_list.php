<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>branch/new_branch/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('new_branch');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_branch" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
    <tr>
        <th>Khmer name</th>
        <th>Latin Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Prefix</th>
        <th>Status</th>
        <th></th>
    </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/branch/branch.js"></script>