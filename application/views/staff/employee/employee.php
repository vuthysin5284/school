<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="row">
    <div class="col-md-2">
        <select class="form-control">
            <option>... Department ...</option>
            <option>2017</option>
            <option>2018</option>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control">
            <option>... Position ...</option>
            <option>1</option>
            <option>2</option>
        </select>
    </div> 
    <div class="col-md-2">
        <select class="form-control">
            <option>... Status ...</option>
            <option>Show all</option>
            <option>Active</option>
            <option>Terminated</option>
            <option>Resigned</option>
            <option>Dead</option>
        </select>
    </div>
    <div class="col-md-1">
        <button class="btn btn-info">Search</button>
    </div>
    <div class="col-md-2 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>staff/new_employee/0/new');">
            <i class="fa fa-user-plus"></i>
            <?php echo get_phrase('add_new');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<table id="datable_employee" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 70px;">Image</th>
            <th style="width: 250px;">Employee Name</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Phone</th>
            <th style="width: 90px;">Hired Date</th>
            <th>Email</th>
            <th style="width: 80px;">Staff Type</th>
            <th></th>
        </tr>
    </thead>
</table>

<script src="<?php echo base_url();?>assets/js/employee/employee.js"></script>