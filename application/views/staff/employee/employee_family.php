<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('add_new');?>
        </button>
    </div>
</div>
<table id="family" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Family Name</th>
            <th>Relationship</th>
            <th>Date of Birth</th>
            <th>Occupation</th>
            <th>Dependent</th>
          
            <th></th>
        </tr>
    </thead>
</table>