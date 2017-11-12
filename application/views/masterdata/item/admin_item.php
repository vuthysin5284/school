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
        Student classification score. the user can filter by monthly or by term
    </div>
    <div class="col-md-2">
        <select class="form-control pull-left" style="width: 150px;">
            <option>...Year...</option>
            <option>2017</option>
            <option>2018</option>
        </select>
    </div>
    <div class="col-md-2">
        <select class="form-control pull-left" style="width: 250px;text-align: center">
            <option>...Month...</option>
            <option>Jan</option>
            <option>Feb</option>
        </select>
    </div>

    <!-- button create new enrollment-->
    <div class="col-md-2 pull-right text-right">
        <button class="btn btn-info" onclick="showAjaxModal('<?php echo base_url();?>itemsetup/admin_item_new/0/new');">
            <i class="fa fa-graduation-cap"></i>
            <!--?php echo get_phrase('enroll_new');?-->
            បញ្ចូលសិស្សថ្មី
        </button>
    </div>
</div>
<div style="clear:both"></div>
<br />

<table id="datable_score_student"  class="table table-striped table-bordered table-hover" width="100%">
    <thead>
    <tr>
        <th>លរ<!--លរ--></th>
        <th>មោះ<!-- ឈ្មោះ ភេទ ?php echo get_phrase('student_name')?--></th>
        <th>ភេទ<!--?php echo get_phrase('gender')?--></th>
        <th>Khmer</th>
        <th>Math</th>
        <th>Phisic</th>
        <th>Chimistry</th>
        <th>Biology</th>
        <th>Earth</th>
        <th>History</th>
        <th>Morality</th>
        <th>Language</th>​
        <th>Business</th>​
        <th>Homes</th>​
        <!--th>ICT</th-->​
        <th>Sport</th>​
        <th>Total</th>​
        <th>Average</th>
        <th>Range</th>
    </tr>
    </thead>
</table>


<script src="<?php echo base_url();?>assets/js/master_data/admin_item_fee.js"></script>

<!--?php
    $this->load->view("student/enrolment/enrolment_detail");
?>


