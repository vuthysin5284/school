<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>schoolsession/new_session/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('new_session');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_session" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Session name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Lock Status</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/school_session/school_session.js"></script>