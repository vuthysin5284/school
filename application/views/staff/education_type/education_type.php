<div class="row">
    <div class="col-md-6 pull-right text-right">
   <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>education_type/new_education_type/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('create_new_education_type');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_education_type" class="table table-striped table-bordered table-hover" width="100%">
    <thead>
        <tr>
            <th>Education Type Name</th>
            <th>Description</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/education_type/education_type.js"></script>