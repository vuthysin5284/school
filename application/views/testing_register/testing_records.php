<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>floor/new_floor/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('new_floor');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_testing_register" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Khmer Name</th>
            <th>Latin Name</th>
            <th>Dob</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/testing_register/testing_register.js"></script>