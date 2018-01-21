<div class="row">
    <div class="col-md-6 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>leave/new_leave/0/new');">
            <i class="fa fa-plus"></i>
            <?php echo get_phrase('new_request_leave');?>
        </button>
    </div>
</div>
<div style="padding:5px; border-bottom:2px solid #eee;"></div> <!-- end header -->
<div style="clear:both"></div>
<br />

<div class="col-md-9">
    <fieldset>
        <legend>Leave transaction</legend>
            <table id="datable_room"  class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DESCRIPTION</th>
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>DURATION</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
            </table>

    </fieldset>
</div>
<div class="col-md-3">
    <fieldset>
        <legend>Annual Leave (18):</legend>
        Per Year: <br />
        Forward: <br />
        Balance: <br />
        Used: <br />

    </fieldset>

    <fieldset>
        <legend>Personal Leave (30):</legend>
        Per Year: <br />
        Balance: <br />
        Used: <br />

    </fieldset>

    <fieldset>
        <legend>Sick Leave (7):</legend>
        Per Year: <br />
        Balance: <br />
        Used: <br />

    </fieldset>

</div>


<script src="<?php echo base_url();?>assets/js/leave/leave.js"></script>