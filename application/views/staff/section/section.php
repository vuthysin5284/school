<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>section/new_section/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_section');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_section" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th>Section Name</th>
            <th>Department Name</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/section/section.js"></script>