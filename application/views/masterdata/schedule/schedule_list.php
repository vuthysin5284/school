
<link href="<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h3 class="panel-title">Events</h3>
            </div>
            <div class="panel-body">
                <div class="events">
                    <div class="calendar-event"><p>Meeting with Ann.</p><a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-remove"></i></a></div>
                    <div class="calendar-event"><p>Go Shopping.</p><a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-remove"></i></a></div>
                    <div class="calendar-event"><p>finish #7 project.</p><a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-remove"></i></a></div>
                    <div class="calendar-event"><p>Meeting With Mike.</p><a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-remove"></i></a></div>
                    <div class="calendar-event"><p>Meeting with Joe.</p><a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-remove"></i></a></div>
                </div>
                <input class="form-control" type="text" placeholder="Add Event">
                <input class="form-control" type="text" placeholder="Teacher">
                <button class="add-event">Add</button>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-white">
            <div class="panel-body">
                <div id="calendar_schedule"></div>
            </div>
        </div>
    </div>
</div><!-- Row -->

<script src="<?php echo base_url();?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/calendar_schedule.js"></script>
