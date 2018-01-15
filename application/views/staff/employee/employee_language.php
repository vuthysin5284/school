<div class="col-md-10">
    <table id="background" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Language</th>
            <th>Speaking</th>
            <th>Listening</th>
            <th>Writing</th>
            <th>Reading</th>
            <th></th>
        </tr>
        </thead>
    </table>

</div>
<div class="col-md-2">
    <button class="btn btn-info" style="width: 150px; margin-bottom: 10px"
            onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
        <i class="fa fa-plus"></i>
        <?php echo get_phrase('add_new');?>
    </button>
    <button class="btn btn-success" style="width: 150px; margin-bottom: 10px"
            onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
        <i class="fa fa-pencil"></i>
        <?php echo get_phrase('change');?>
    </button>
    <button class="btn btn-danger" style="width: 150px; margin-bottom: 10px"
            onclick="showAjaxSubmodal('<?php echo base_url();?>staff/add_new_referrence/0/new');">
        <i class="fa fa-times"></i>
        <?php echo get_phrase('delete');?>
    </button>
</div>