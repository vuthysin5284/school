<?php
/**
 * Created by PhpStorm.
 * User: Sin Vuthy
 * Date: 9/7/2017
 * Time: 9:19 PM
 */

?>

<div class="row">
    <div class="col-md-12">
        Student classification score. the user can select active or inactive
    </div>
    <div class="col-md-2">
        <select class="form-control pull-left" style="width: 150px;">
            <option>All</option>
            <option value="1">Active</option>
            <option value="0">InActive</option>
        </select>
    </div>
   <!-- button create new enrollment-->
    <div class="col-md-2 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>lunch_item_fee/new_lunch_item_fee/0/new');">
            <i class="fa fa-graduation-cap"></i>
            <!--?php echo get_phrase('enroll_new');?-->
            New Item
        </button>
    </div> 
</div>
<div style="clear:both"></div>
<br />

<table id="datable_lunch_item"  class="table table-striped table-bordered table-hover" width="100%">
    <thead>
    <tr>
        <th>លរ</th>
        <th>Description</th>
        <th>Status</th>
        <th>Active</th>
    </tr>
    </thead>
</table>


<script src="<?php echo base_url();?>assets/js/master_data/lunch_item_fee.js"></script>

<!--?php
    $this->load->view("student/enrolment/enrolment_detail");
?>


