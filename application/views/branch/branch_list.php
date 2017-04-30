<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>branch/new_branch');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_branch');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_branch" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Branch Number</th>
        <th>Branch Name</th>
        <th>Description</th>
        <th>STATUS</th>
        <th></th>
    </tr>
    </thead>
</table>

<!-- scriptsrc="<?php echo base_url();?>assets/js/branch/branch.js"></script-->